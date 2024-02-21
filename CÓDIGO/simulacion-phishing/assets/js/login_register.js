/********************************************************************************
 * Scripts para el manejo de formularios de registro e inicio de sesión
 * Incluye validaciones, navegación por pasos y lógica de envío AJAX.
 ********************************************************************************/

$(document).ready(function () {
  // Cargar modales y asignar manejadores de eventos
  loadModals();
});

// Función para cargar modales
function loadModals() {
  $("#login-modal-container").load("loginModal.html", function () {
    initializeLoginForm();
  });

  $("#register-modal-container").load("registerModal.html", function () {
    initializeRegistrationForm();
  });
}

// Inicialización y manejo del formulario de inicio de sesión
function initializeLoginForm() {
  $("#loginFormModal").on("submit", function (e) {
    e.preventDefault();
    submitLoginForm();
  });
}

// Envío del formulario de inicio de sesión
function submitLoginForm() {
  var email = $("#emailModal").val();
  var password = $("#passwordModal").val();

  if (email && password) {
    $.ajax({
      type: "POST",
      url: "/simulacion-phishing/assets/database/login_user.php",
      data: { email: email, password: password },
      dataType: "json",
      success: function (data) {
        if (data.success) {
          updateUIAfterLogin(data.username);
        } else {
          showAlert(data.message);
        }
      },
      error: function (_jqXHR, textStatus, errorThrown) {
        showAlert(
          "Error en la solicitud AJAX: " + textStatus + ", " + errorThrown
        );
      },
    });
  }
}

// Inicialización y manejo del formulario de registro
function initializeRegistrationForm() {
  initializeStepNavigation();
  // Enviar formulario de registro
  $("#registerFormModal").on("submit", function (e) {
    e.preventDefault();
    var formData = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "/simulacion-phishing/assets/database/register_user.php",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          // Cerrar el modal de registro
          $("#registerModal").modal("hide");
          // Actualizar la UI inmediatamente o recargar la página
          updateUIAfterLogin(response.userName);
        } else {
          // Mostrar mensaje de error si no se pudo registrar
          showAlert(response.message);
        }
      },
      error: function (_jqXHR, textStatus, errorThrown) {
        showAlert("Error en la solicitud: " + textStatus + ", " + errorThrown);
      },
    });
  });
}

// Utilidades de Validación
function isEmailValid(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isPasswordValid(password) {
  return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(password);
}

function isPhoneNumberValid(phone) {
  return /^[0-9]{7,}$/.test(phone);
}

// Actualización de UI después del Login
function updateUIAfterLogin(username) {
  $(".login-trigger, .register-trigger").closest("li").hide();
  const welcomeMessage = `<li><a href="usuario.php">Bienvenido, ${username}</a></li>`;
  $("#navbar ul").append(welcomeMessage);
  $("#loginModal").modal("hide");
  $("body").removeClass("modal-open");
  $(".modal-backdrop").remove();
}

// Alerta de Mensajes
function showAlert(message) {
  alert(message);
}

// Validación del Formulario de Registro
function validateRegistrationForm() {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  const phoneRegex = /^[0-9]{7,}$/;

  const name = $("#registerName").val();
  const email = $("#registerEmail").val();
  const password = $("#registerPassword").val();
  const confirmPassword = $("#confirmPassword").val();
  const address = $("#address").val();
  const city = $("#city").val();
  const country = $("#country").val();
  const postalCode = $("#cp").val();
  const phone = $("#phone").val();

  let errorMessage = "";
  if (!name) errorMessage += "Por favor, ingrese su nombre.\n";
  if (!email || !emailRegex.test(email))
    errorMessage += "Por favor, ingrese un correo electrónico válido.\n";
  if (!password || !passwordRegex.test(password))
    errorMessage += "La contraseña debe tener al menos 8 caracteres, incluyendo un número, una letra mayúscula y una letra minúscula.\n";
  if (password !== confirmPassword)
    errorMessage += "Las contraseñas no coinciden.\n";
  if (!address) errorMessage += "Por favor, ingrese su dirección.\n";
  if (!city) errorMessage += "Por favor, ingrese su ciudad.\n";
  if (!country) errorMessage += "Por favor, ingrese su país.\n";
  if (!postalCode) errorMessage += "Por favor, ingrese su código postal.\n";
  if (!phone || !phoneRegex.test(phone))
    errorMessage += "Por favor, ingrese un número de teléfono válido.\n";

  if (errorMessage) {
    showAlert(errorMessage);
    return false;
  }
  return true;
}

// Navegación por Pasos en el Formulario de Registro
function initializeStepNavigation() {
  $("#registerFormModal").find("button").click(function (e) {
    navigateSteps(this, e);
  });
  goToStep(1);
}

function navigateSteps(button, event) {
  var currentStep = $(button).closest('div[id^="step"]').attr("id").replace("step", "");
  var isNext = $(button).text().includes("Siguiente");
  var targetStep = isNext ? parseInt(currentStep) + 1 : parseInt(currentStep) - 1;

  if (validateStep(parseInt(currentStep))) {
    goToStep(targetStep);
  } else {
    event.preventDefault();
  }
}

function validateStep(step) {
  let isValid = true; // Inicialmente asumimos que el paso es válido
  let errorMessage = ""; // Mensaje de error acumulativo

  switch (step) {
    case 1:
      // Validación para el Paso 1: Información Básica
      if ($("#registerName").val().trim() === "") {
        errorMessage += "Por favor, ingrese su nombre.\n";
        isValid = false;
      }
      if (
        !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($("#registerEmail").val().trim())
      ) {
        errorMessage += "Por favor, ingrese un correo electrónico válido.\n";
        isValid = false;
      }
      if (
        !/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(
          $("#registerPassword").val()
        )
      ) {
        errorMessage +=
          "La contraseña debe tener al menos 8 caracteres, incluyendo un número, una letra mayúscula y una letra minúscula.\n";
        isValid = false;
      }
      if ($("#registerPassword").val() !== $("#confirmPassword").val()) {
        errorMessage += "Las contraseñas no coinciden.\n";
        isValid = false;
      }
      if (!/^[0-9]{7,}$/.test($("#phone").val().trim())) {
        errorMessage += "Por favor, ingrese un número de teléfono válido.\n";
        isValid = false;
      }
      break;
    case 2:
      // Validación para el Paso 2: Dirección
      if ($("#address").val().trim() === "") {
        errorMessage += "Por favor, ingrese su dirección.\n";
        isValid = false;
      }
      if ($("#city").val().trim() === "") {
        errorMessage += "Por favor, ingrese su ciudad.\n";
        isValid = false;
      }
      if ($("#country").val().trim() === "") {
        errorMessage += "Por favor, ingrese su país.\n";
        isValid = false;
      }
      if ($("#cp").val().trim() === "") {
        errorMessage += "Por favor, ingrese su código postal.\n";
        isValid = false;
      }
      break;
    case 3:
      // Validación para el Paso 3: Tipo de Usuario
      if ($("#userType").val().trim() === "") {
        errorMessage += "Por favor, seleccione un tipo de usuario.\n";
        isValid = false;
      }
      break;
    default:
      console.error("Paso no reconocido: ", step);
      isValid = false;
  }

  // Mostrar el mensaje de error si el paso no es válido
  if (!isValid) {
    alert(errorMessage);
  }

  return isValid;
}

function goToStep(step) {
  $('[id^="step"]').hide(); // Ocultar todos los pasos
  $("#step" + step).show(); // Mostrar el paso actual
  updateProgressBar(step); // Actualizar la barra de progreso
}

// Actualizar la Barra de Progreso del Formulario
function updateProgressBar(step) {
  const percentage = step === 1 ? 33 : step === 2 ? 66 : 100;
  $("#progressBar").css("width", percentage + "%").attr("aria-valuenow", percentage).text(`Paso ${step} de 3`);
}