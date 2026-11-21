import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('heroSlider', (total) => ({ // منطق السلايدر
    current: 0,                          // رقم السلايد الحالي
    total,                               // عدد السلايدات
    paused: false,                       // بيقف لما الماوس يكون فوقه
    reduced: window.matchMedia('(prefers-reduced-motion: reduce)').matches, // إعداد تقليل الحركة
    next() { this.current = (this.current + 1) % this.total; },
    prev() { this.current = (this.current - 1 + this.total) % this.total; },
}));

Alpine.start(); // لازم بعد تعريف الـ components

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    },
    { threshold: 0.15 }
);
const countObserver = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            countObserver.unobserve(el);

            const target = parseFloat(el.dataset.countTo);
            const suffix = el.dataset.suffix ?? '';
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return; // الرقم النهائي موجود أصلاً

            const duration = 1600;
            const start = performance.now();
            const tick = (now) => {
                const p = Math.min((now - start) / duration, 1);
                el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3))) + suffix; // easing
                if (p < 1) requestAnimationFrame(tick);
            };
            requestAnimationFrame(tick);
        });
    },
    { threshold: 0.6 }
);

document.querySelectorAll('[data-count-to]').forEach((el) => countObserver.observe(el));
document.querySelectorAll('.reveal').forEach((el) => observer.observe(el));
