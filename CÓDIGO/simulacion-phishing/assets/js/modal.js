/********************************************************************************
 * VENTANAS EMERGENTES PARA LOGIN Y REGISTRO
 ********************************************************************************/

document.addEventListener("DOMContentLoaded", function () {
  setupModalTriggers();
  setupModalCloseButton();
});

function setupModalTriggers() {
  // Configura los disparadores para el modal de login
  document.querySelectorAll(".login-trigger").forEach((trigger) => {
    trigger.addEventListener("click", (event) => {
      event.preventDefault();
      $("#loginModal").modal("show");
    });
  });

  // Configura los disparadores para el modal de registro
  document.querySelectorAll(".register-trigger").forEach((trigger) => {
    trigger.addEventListener("click", (event) => {
      event.preventDefault();
      $("#registerModal").modal("show");
    });
  });
}

function setupModalCloseButton() {
  // Selecciona el botón Close de la ventana modal y cierra la ventana modal
  const closeButton = document.getElementById("closeModalButton");
  if (closeButton) {
    closeButton.addEventListener("click", () => {
      $("#loginModal").modal("hide");
    });
  }
}
