import './bootstrap';

window.loadAprilDocsSearch = (() => {
    let searchPromise;

    return () => {
        if (searchPromise) {
            return searchPromise;
        }

        const root = document.querySelector('[data-docs-search-endpoint]');
        const endpoint = root?.dataset.docsSearchEndpoint;

        if (!endpoint) {
            return Promise.resolve();
        }

        searchPromise = fetch(endpoint, {
            headers: { Accept: 'application/json' },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error(`Could not load docs search index (${response.status})`);
                }

                return response.json();
            })
            .then((entries) => {
                const searchByUrl = new Map(
                    entries.map((entry) => [entry.url, entry.search]),
                );

                document.querySelectorAll('[data-doc-search-url]').forEach((item) => {
                    const search = searchByUrl.get(item.dataset.docSearchUrl);

                    if (search) {
                        item.dataset.search = search;
                    }
                });

                // Re-run command filtering if the user started typing while
                // the index was loading. The command component remains generic.
                document.querySelectorAll('[data-slot="command-input"]').forEach((input) => {
                    input.dispatchEvent(new Event('input', { bubbles: true }));
                });
            })
            .catch((error) => {
                searchPromise = undefined;
                console.error(error);
            });

        return searchPromise;
    };
})();

document.documentElement.classList.add('js');

const initializeAprilMotion = () => {
    const elements = [...document.querySelectorAll('[data-april-reveal]:not([data-april-motion-ready])')]
        .filter((element) => !element.closest('section:first-of-type'));

    if (!elements.length) {
        return;
    }

    elements.forEach((element) => element.setAttribute('data-april-motion-ready', 'true'));

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) {
        elements.forEach((element) => element.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries, currentObserver) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            entry.target.classList.add('is-visible');
            currentObserver.unobserve(entry.target);
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -20% 0px',
    });

    elements.forEach((element) => observer.observe(element));
};

const initializeComponentPreviews = () => {
    if (!('ResizeObserver' in window)) {
        return;
    }

    document.querySelectorAll('[data-slot="tabs"]').forEach((tabs) => {
        if (tabs.dataset.componentPreviewReady === 'true') {
            return;
        }

        const preview = tabs.querySelector(':scope > [data-slot="tabs-content"].component-preview');
        const code = tabs.querySelector(':scope > [data-slot="tabs-content"][value="code"]');

        if (!preview || !code) {
            return;
        }

        const syncCodeHeight = () => {
            const height = Math.ceil(preview.getBoundingClientRect().height);

            if (height > 0) {
                code.style.height = `${height}px`;
                code.style.maxHeight = `${height}px`;
            }
        };

        const observer = new ResizeObserver(syncCodeHeight);
        observer.observe(preview);
        tabs.dataset.componentPreviewReady = 'true';
        syncCodeHeight();
    });
};

document.addEventListener('DOMContentLoaded', initializeAprilMotion);
document.addEventListener('livewire:navigated', initializeAprilMotion);
document.addEventListener('DOMContentLoaded', initializeComponentPreviews);
document.addEventListener('livewire:navigated', initializeComponentPreviews);
