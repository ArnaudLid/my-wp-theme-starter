// Import Swiper
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/autoplay';
import 'swiper/css/effect-fade';

// Import components
import './components/menu';
import './components/sliders';

// Init
document.addEventListener('DOMContentLoaded', () => {
    console.log('Theme loaded with Vite!');

    // Example: Init Swiper
    initSwipers();
});

// Swiper initialization
function initSwipers() {
    const swipers = document.querySelectorAll('.swiper');

    swipers.forEach((swiperEl) => {
        new Swiper(swiperEl, {
            modules: [Navigation, Pagination, Autoplay, EffectFade],
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    });
}

// Export pour utilisation globale si nécessaire
export { initSwipers };
