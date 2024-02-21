<?php
session_start();
require_once 'assets/database/config.php';

if (!isset($_SESSION['userID'])) {
  header("Location: index.php");
  exit;
}

$userID = $_SESSION['userID'];
require 'assets/database/usuarioInfo.php';
require 'assets/database/detallesCampana.php';
require 'assets/database/usuariosEnRiesgo.php';
require 'assets/database/calcularStatsCampana.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración - Simulador de Phishing</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="assets/css/panel_style.css" rel="stylesheet">
</head>

<body id="userProfilePage">
  <header id="userHeader">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="index.php">4<span>Phish</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="phishing.html">Visualizar Simulación<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="assets/database/logout.php">Cerrar Sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main id="userMain" class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card">
            <div class="card-header">Información Personal</div>
            <div class="card-body">
              <p id="nombreUsuario">Nombre: <?= htmlspecialchars($userInfo['Nombre']); ?></p>
              <p>Email: <?= htmlspecialchars($userInfo['Email']); ?></p>
              <p>Dirección: <span id="direccionUsuario"><?= htmlspecialchars($userInfo['Direccion']); ?></span></p>
              <p>Ciudad: <span id="ciudadUsuario"><?= htmlspecialchars($userInfo['Ciudad']); ?></span></p>
              <p>País: <span id="paisUsuario"><?= htmlspecialchars($userInfo['Pais']); ?></span></p>
              <p>Código Postal: <span id="codigoPostalUsuario"><?= htmlspecialchars($userInfo['CodigoPostal']); ?></span></p>
              <p>Teléfono: <span id="telefonoUsuario"><?= htmlspecialchars($userInfo['Telefono']); ?></span></p>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editarInfoModal">Editar Información</button>
            </div>
          </div>
        </div>
        <div class="col-lg-8 mb-4">
          <div class="card">
            <div class="card-header">Mis Campañas de Phishing</div>
            <div class="card-body">
              <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#crearCampanaModal">Crear Nueva Campaña</button>
              <div class="list-group">
                <?php foreach ($campañas as $campaña) : ?>
                  <a href="#" class="list-group-item list-group-item-action">
                    <h5 class="mb-1"><?= htmlspecialchars($campaña['Nombre']); ?></h5>
                    <p class="mb-1"><?= htmlspecialchars($campaña['Descripción']); ?></p>
                    <small>Inicio: <?= htmlspecialchars($campaña['FechaInicio']); ?> - Fin: <?= htmlspecialchars($campaña['FechaFin']); ?></small>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-header">Usuarios en riesgo de phishing</div>
            <div class="card-body">
              <ul class="list-group">
                <?php foreach ($usuariosEnRiesgo as $usuario) : ?>
                  <li class="list-group-item"><?= htmlspecialchars($usuario['Email']) ?> - Click: <?= htmlspecialchars($usuario['FechaHoraClick']) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card">
            <div class="card-header">Usuarios que han recibido la campaña</div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>Email Destinatario</th>
                    <th>Estado de Entrega</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($detallesEnvios as $detalle) : ?>
                    <tr>
                      <td><?= htmlspecialchars($detalle['EmailDestinatario']) ?></td>
                      <td><?= htmlspecialchars($detalle['Estado']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-4">
          <div class="card">
            <div class="card-header">Estadísticas de la campaña</div>
            <div class="card-body">
              <canvas id="campaignStatsChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small>Portal para Simulación de Phishing © 2024 | Desarrollado por Alejandro Delgado |</small>
    </div>
  </footer>
  <?php include 'crearCampanaModal.php'; ?>
  <?php include 'editInfoModal.php'; ?>
  <?php $conn->close(); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      drawCampaignStatsChart(
        <?= isset($estadisticas['TotalEnvios']) ? $estadisticas['TotalEnvios'] : 0 ?>,
        <?= isset($estadisticas['Entregados']) ? $estadisticas['Entregados'] : 0 ?>,
        <?= isset($estadisticas['Clicks']) ? $estadisticas['Clicks'] : 0 ?>
      );
    });
  </script>

  <script src="assets/js/login_register.js"></script>
  <script src="assets/js/delete_account.js"></script>
  <script src="assets/js/crearCampana.js"></script>
  <script src="assets/js/listarCampanas.js"></script>
  <script src="assets/js/editInfo.js"></script>
  <script src="assets/js/campaignStatsChart.js"></script>
</body>

</html>