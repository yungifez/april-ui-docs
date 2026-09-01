import './bootstrap';

document.documentElement.classList.add('js');

const initializeAprilMotion = () => {
    const elements = document.querySelectorAll('[data-april-reveal]:not([data-april-motion-ready])');

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
        rootMargin: '0px 0px -8% 0px',
    });

    elements.forEach((element) => observer.observe(element));
};

document.addEventListener('DOMContentLoaded', initializeAprilMotion);
document.addEventListener('livewire:navigated', initializeAprilMotion);
