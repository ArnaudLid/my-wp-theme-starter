// Mobile menu toggle
const initMobileMenu = () => {
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (!menuToggle || !mobileMenu) return;

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        menuToggle.classList.toggle('open');
        document.body.classList.toggle('menu-open');
    });
};

document.addEventListener('DOMContentLoaded', initMobileMenu);
