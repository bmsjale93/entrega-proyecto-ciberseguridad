/********************************************************************************
 * MENU RESPONSIVE
 ********************************************************************************/

document.addEventListener("DOMContentLoaded", function () {
  setupMobileNavigation();
});

/**
 * Configura la navegación móvil, incluyendo el toggle del menú y ajustes de visibilidad basados en el tamaño de la ventana.
 */
function setupMobileNavigation() {
  const navToggle = document.querySelector(".mobile-nav-toggle");
  const navbarMobile = document.querySelector(".navbar-mobile");
  const navbar = document.querySelector(".navbar");

  /**
   * Cambia la visibilidad del menú móvil y ajusta las clases del botón de toggle.
   */
  function toggleMenu() {
    const isVisible = navbarMobile.style.display === "block";
    navbarMobile.style.display = isVisible ? "none" : "block";
    navToggle.classList.toggle("fa-times", !isVisible);
    navToggle.classList.toggle("fa-bars", isVisible);
  }

  navToggle.addEventListener("click", toggleMenu);

  /**
   * Ajusta la visibilidad del menú móvil y del menú principal en función del tamaño de la ventana.
   */
  function adjustMenuVisibility() {
    if (window.innerWidth > 991) {
      navbarMobile.style.display = "none";
      navbar.style.display = "block";
    } else {
      navbar.style.display = "none";
    }
  }

  window.addEventListener("resize", adjustMenuVisibility);

  // Asegura que el menú se ajuste correctamente al cargar la página.
  adjustMenuVisibility();
}
