$(document).ready(function () {
  $("#editarInfoForm").on("submit", function (e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
      type: "POST",
      url: "/simulacion-phishing/assets/database/editInfo.php",
      data: formData,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert(response.message);
          $("#editarInfoModal").modal("hide");

          // Actualizar la información del usuario en la página
          $("#nombreUsuario").text("Nombre: " + $("#nombre").val());
          $("#direccionUsuario").text($("#direccion").val());
          $("#ciudadUsuario").text($("#ciudad").val());
          $("#paisUsuario").text($("#pais").val());
          $("#codigoPostalUsuario").text($("#codigoPostal").val());
          $("#telefonoUsuario").text($("#telefono").val());
        } else {
          alert("Error al actualizar: " + response.message);
        }
      },
      error: function (xhr, status, error) {
        // Manejar errores de la petición AJAX
        alert("Ha ocurrido un error: " + error);
      },
    });
  });
});
