<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portal de Búsqueda de Empleo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon-worknow.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i class="fa fa-envelope d-flex align-items-center">
                    <a href="mailto:contacto@worknow.com">contacto@worknow.com</a>
                </i>
                <i class="fa fa-phone d-flex align-items-center ms-4">
                    <span>+34 612 612 612</span>
                </i>
            </div>
            <div class="social-links d-flex align-items-center">
                <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
    </section>
    <!-- End Top Bar -->

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">
            <div id="logo">
                <h1><a href="index.php">Work<span>Now</span></a></h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active" href="index.php">Inicio</a></li>
                    <li><a class="nav-link" href="phishing.html">Visualizar Simulación</a></li>
                    <li><a class="nav-link" href="contacto.php">Contacto</a></li>
                    <?php if (isset($_SESSION['userID'])) : ?>
                        <!-- Si el usuario ha iniciado sesión, mostrar su nombre y la opción de cerrar sesión -->
                        <li><a class="nav-link" href="usuario.php">Bienvenido, <?php echo htmlspecialchars($_SESSION['nombreUsuario']); ?></a></li>
                        <li><a class="nav-link" href="assets/database/logout.php">Cerrar Sesión</a></li>
                    <?php else : ?>
                        <!-- Si el usuario no ha iniciado sesión, mostrar opciones de inicio de sesión y registro -->
                        <li><a class="nav-link login-trigger" href="#loginModal">Iniciar Sesión</a></li>
                        <li><a class="nav-link register-trigger" href="#registerModal">Registrarse</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div>
                <!-- Menú (oculto por defecto) -->
                <nav id="navbar-mobile" class="navbar-mobile">
                    <ul>
                        <li><a class="nav-link active" href="index.php">Inicio</a></li>
                        <li><a class="nav-link" href="phishing.html">Visualizar Simulación</a></li>
                        <li><a class="nav-link" href="contacto.php">Contacto</a></li>
                        <?php if (isset($_SESSION['userID'])) : ?>
                            <!-- Si el usuario ha iniciado sesión, mostrar su nombre y la opción de cerrar sesión -->
                            <li><a class="nav-link" href="usuario.php">Bienvenido, <?php echo htmlspecialchars($_SESSION['nombreUsuario']); ?></a></li>
                            <li><a class="nav-link" href="assets/database/logout.php">Cerrar Sesión</a></li>
                        <?php else : ?>
                            <!-- Si el usuario no ha iniciado sesión, mostrar opciones de inicio de sesión y registro -->
                            <li><a class="nav-link login-trigger" href="#loginModal">Iniciar Sesión</a></li>
                            <li><a class="nav-link register-trigger" href="#registerModal">Registrarse</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <i class="fa fa-bars mobile-nav-toggle"></i>
        </div>
    </header>

    <!-- ======= Hero Section ======= -->
    <section id="hero-ofertas">
        <div class="hero-content">
            <div class="text-ofertas">
                <h2>¿Tienes alguna duda?</h2>
                <p>Estamos aquí para resolverlas.</p>
            </div>
        </div>
    </section>

    <!-- ======= Contact Section ======= -->
    <section id="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Contacto</h2>
                <p>Bienvenido/a a nuestra sección de contacto. Valoramos tu interés y estamos aquí para atenderte de la mejor manera posible. Si tienes consultas, comentarios o necesitas asistencia, no dudes en ponerte en contacto con nuestro equipo experto. Estamos comprometidos a responder a tus inquietudes de manera eficiente.</p>
            </div>

            <div class="row contact-info">
                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Direccion</h3>
                        <address>C. Tajo, s/n, 28670 Villaviciosa de Odón, Madrid</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="bi bi-phone"></i>
                        <h3>Telefono</h3>
                        <p><a href="tel:+155895548855">+34 612 612 612</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:info@example.com">contacto@4phish.com</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mb-4">
            <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=C.%20Tajo,%20s/n,%2028670%20Villaviciosa%20de%20Od%C3%B3n,%20Madrid+(Your%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/sport-gps/">hiking gps</a></iframe>
        </div>

        <div class="container">
            <div class="form">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" required>
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Tu Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Observaciones" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Mensaje" required></textarea>
                    </div>

                    <div class="my-3">
                        <div class="loading">Cargando</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Tu mensaje a sido enviado. Gracias!</div>
                    </div>
                    <section id="hero-btn">
                        <div class="hero-content-btn">
                            <a href="aplicar.html" class="btn-projects scrollto">Enviar mensaje</a>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </section><!-- End Contact Section -->
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>Portal para Simulación de Phishing © 2024 | Desarrollado por Alejandro Delgado |</small>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Contenedores para las Ventanas Emergentes -->
    <div id="login-modal-container"></div>
    <div id="register-modal-container"></div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="assets/js/menu-responsive.js"></script>
    <script src="assets/js/modal.js"></script>
    <script src="assets/js/login_register.js"></script>
</body>

</html>