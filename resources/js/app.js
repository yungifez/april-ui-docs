import './bootstrap';

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
