$(document).ready(function () {
  // Inicialización basada en valores predeterminados o actuales
  mostrarCamposBasadosEnTipo($("#tipoCampana").val());
  mostrarCamposIngresoCorreos($("#metodoIngresoCorreos").val());

  // Evento change para el tipo de campaña
  $("#tipoCampana").change(function () {
    var tipo = $(this).val();
    mostrarCamposBasadosEnTipo(tipo);
    mostrarCamposIngresoCorreos($("#metodoIngresoCorreos").val());
  });

  // Evento change para el método de ingreso de correos
  $("#metodoIngresoCorreos").change(function () {
    var metodo = $(this).val();
    mostrarCamposIngresoCorreos(metodo);
  });

  // Función para mostrar/ocultar campos basada en el método de ingreso de correos
  function mostrarCamposIngresoCorreos(metodo) {
    if (metodo === "manual") {
      $("#campoCorreosManual")
        .show()
        .find("#correosUnicos")
        .attr("required", true);
      $("#campoArchivoCSV").hide().find("#archivoCSV").removeAttr("required");
    } else if (metodo === "csv") {
      $("#campoArchivoCSV").show().find("#archivoCSV").attr("required", true);
      $("#campoCorreosManual")
        .hide()
        .find("#correosUnicos")
        .removeAttr("required");
    }
  }

  // Función para mostrar/ocultar y requerir campos basada en el tipo de campaña
  function mostrarCamposBasadosEnTipo(tipo) {
    $("#tipoPlantilla").val(tipo);
    if (tipo === "personalizada") {
      $("#campanaPersonalizada").show();
      $("#campanaMaquetado").hide();
      $("#IDPlantilla").val("").removeAttr("required");
      $(
        "#nombreCampana, #descripcionCampana, #asuntoCorreo, #cuerpoCorreo"
      ).attr("required", true);
    } else {
      $("#campanaMaquetado").show();
      $("#campanaPersonalizada").hide();
      $("#IDPlantilla").attr("required", true);
      $("#asuntoCorreo, #cuerpoCorreo").removeAttr("required");
    }
  }

  // Gestión de cambio de plantilla de campaña
  $("#ejemploCampana").change(function () {
    var plantillaId = $(this).val();
    if (plantillaId) {
      $.ajax({
        url:
          "/simulacion-phishing/assets/database/crearCampana.php?action=getPlantillaDetails&IDPlantilla=" +
          plantillaId,
        type: "GET",
        dataType: "json",
        success: function (data) {
          $("#nombreCampana").val(data.Nombre);
          $("#asuntoCorreo").val(data.Asunto);
          $("#cuerpoCorreo").val(data.Cuerpo);
          $("#tipoPlantilla").val("predeterminada");
          $("#IDPlantilla").val(plantillaId);
          mostrarCamposBasadosEnTipo("personalizada");
        },
        error: function (xhr, status, error) {
          alert("Ocurrió un error al cargar los detalles de la plantilla.");
        },
      });
    }
  });

$("#formCrearCampana").on("submit", function (e) {
  e.preventDefault();
  if (validarCamposObligatorios()) {
    var formData = new FormData(this);
    $.ajax({
      url: "/simulacion-phishing/assets/database/crearCampana.php",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.success + " ID de campaña: " + response.idCampana);
          if (response.mensajesDeProceso) {
            response.mensajesDeProceso.forEach(function (mensaje) {
              console.log(mensaje);
            });
          }
          $("#crearCampanaModal").modal("hide");
          location.reload(); 
        } else if (response.error) {
          alert("Error: " + response.error);
        }
      },
      error: function (xhr, status, error) {
        alert("Ocurrió un error al crear la campaña: " + error);
      },
    });
  } else {
    alert("Por favor, complete todos los campos obligatorios.");
  }
});


  // Función para validar campos obligatorios, incluyendo campos dinámicos
  function validarCamposObligatorios() {
    $(".error").remove();
    let esValido = true;
    $("form#formCrearCampana :input[required]:visible").each(function () {
      if (!this.value.trim()) {
        mostrarMensajeDeError(this, "Este campo es obligatorio.");
        esValido = false;
      }
    });
    return esValido;
  }

  // Función para mostrar mensajes de error
  function mostrarMensajeDeError(elemento, mensaje) {
    var $mensajeError = $(
      "<span class='error' style='color: red; display: block;'>" +
        mensaje +
        "</span>"
    );
    $(elemento).after($mensajeError);
  }
});