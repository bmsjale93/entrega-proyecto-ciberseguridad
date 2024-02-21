/********************************************************************************
 * SLIDERS PARA LA WEB
 *******************************************************************************/

/**
 * Inicializa el slider para la sección Hero.
 */
document.addEventListener("DOMContentLoaded", function () {
  var heroSwiper = new Swiper(".hero-slider", {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    effect: "fade",
    fadeEffect: {
      crossFade: true,
    },
    speed: 1000,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false, // Continuar autoplay después de la interacción del usuario
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

/**
 * Inicializa el slider para la sección de Clientes.
 * Configura responsive breakpoints para adaptarse a diferentes anchos de pantalla.
 */
document.addEventListener("DOMContentLoaded", function () {
  var clientsSwiper = new Swiper(".clients-slider", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      480: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });
});

/**
 * Inicializa el slider para la sección de Testimonios.
 */
document.addEventListener("DOMContentLoaded", function () {
  var testimonialsSwiper = new Swiper(".testimonials-slider", {
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      480: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });
});
