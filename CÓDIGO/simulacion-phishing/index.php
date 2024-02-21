<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>4Phish - Preveen a tus empleados de Phishing</title>
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
                    <a href="mailto:contacto@4phish.com">contacto@4phish.com</a>
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
                <h1><a href="index.php">4<span>Phish</span></a></h1>
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
    <section id="hero">

        <div class="hero-content">
            <h2>Bienvenidos a<br>4 <span>Phish</span></h2>
            <div>
                <a href="phishing.html" class="btn-get-started">Simulación de Phishing</a>
                <a href="contacto.php" class="btn-projects">Contáctanos Ahora</a>
            </div>
        </div>

        <div class="hero-slider swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url('assets/img/hero-carousel/fondos-phishing-1.png');"></div>
                <div class="swiper-slide" style="background-image: url('assets/img/hero-carousel/fondos-phishing-2.png');"></div>
                <div class="swiper-slide" style="background-image: url('assets/img/hero-carousel/fondos-phishing-3.png');"></div>
                <div class="swiper-slide" style="background-image: url('assets/img/hero-carousel/fondos-phishing-4.png');"></div>
                <div class="swiper-slide" style="background-image: url('assets/img/hero-carousel/fondos-phishing-5.png');"></div>
            </div>
        </div>

    </section>
    <!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 about-img">
                        <img src="assets/img/phishing.png" alt="">
                    </div>
                    <div class="col-lg-6 content">
                        <h2>¿Quieres aprender sobre el Phishing?</h2>
                        <h3>En 4 Phish, te ofrecemos una plataforma interactiva para simular y comprender las campañas de phishing de forma segura.
                            Aprende cómo protegerte contra las amenazas en línea con nuestras herramientas educativas.
                        </h3>
                        <ul>
                            <li><i class="fa-solid fa-check"></i> Simulaciones basadas en escenarios reales.</li>
                            <li><i class="fa-solid fa-check"></i> Herramientas para identificar y evitar el phishing.</li>
                            <li><i class="fa-solid fa-check"></i> Mejora tus conocimientos y conviértete en un defensor de la seguridad en línea.</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Educación y Simulación</h2>
                    <p>¡Eleva tu conciencia sobre seguridad y aprende a defenderte contra el phishing con nuestras simulaciones interactivas!
                    </p>
                </div>


                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <div class="icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                            <h4 class="title"><a href="phishing.html">Ver una Simulación</a></h4>
                            <p class="description">Navega a través de las distintas ofertas de trabajo disponibles.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <div class="icon"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>
                            <h4 class="title login-trigger"><a href="loginModal">Inicia</br>Sesión</a></h4>
                            <p class="description">Accede a tu cuenta para crear simulaciones de Campañas de Phishing</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <div class="icon"><i class="fa-solid fa-key"></i></div>
                            <h4 class="title register-trigger"><a href="registerModal">Regístrate</br>Ahora</a></h4>
                            <p class="description">¡Crea una cuenta para poder crear simulaciones ahora!</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Nuestros Colaboradores</h2>
                    <p>Conoce a las organizaciones y educadores que se unen a nosotros en la misión de promover la conciencia sobre la seguridad cibernética y el phishing.</p>
                </div>


                <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Team Section ======= -->
        <section id="team">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Nuestro Equipo</h2>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="member">
                            <div class="pic"><img src="assets/img/alex-team.png" alt=""></div>
                            <div class="details">
                                <h4>Alejandro Delgado</h4>
                                <span>Desarrollador Web</span>
                                <p>La vida es eso que pasa mientras revisas el CSS</p>
                                <div class="social">
                                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="member">
                            <div class="pic"><img src="assets/img/Café team.png" alt=""></div>
                            <div class="details">
                                <h4>Café en Grandes Cantidades</h4>
                                <span>CEO</span>
                                <p>Bendita bebida</p>
                                <div class="social">
                                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                                    <a href=""><i class="fa-brands fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </section><!-- End Team Section -->


        <!-- Testimonials Section -->
        <section id="testimonials">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Experiencias de Aprendizaje</h2>
                    <p>Escucha lo que dicen los participantes de nuestras simulaciones y cómo han mejorado su capacidad para identificar y evitar ataques de phishing.</p>
                </div>

                <div class="testimonials-slider swiper">
                    <div class="swiper-wrapper">
                        <!-- Testimonial Item 1 -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    "Antes pensaba que podía detectar fácilmente un intento de phishing. Tras participar en 4 Phish, me di cuenta de lo sofisticados que pueden ser estos ataques. Ahora estoy mucho mejor preparado."
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                                </p>
                                <img src="assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
                                <h3>Jose Delgado</h3>
                                <h4>CEO StartUp</h4>
                            </div>
                        </div>

                        <!-- Testimonial Item 2 -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    "Las herramientas y técnicas aprendidas en 4 Phish me han ayudado a proteger a mi familia y amigos. Compartir este conocimiento ha sido increíblemente gratificante."
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                                </p>
                                <img src="assets/img/testimonial-2.jpg" class="testimonial-img" alt="">
                                <h3>Xin Zhao</h3>
                                <h4>Profesor de Tecnología</h4>
                            </div>
                        </div>

                        <!-- Testimonial Item 3 -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    "Implementamos las simulaciones de 4 Phish en nuestra organización, y el cambio en la cultura de seguridad ha sido notable. Nuestros equipos están más alerta y conscientes de las amenazas de seguridad."
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                                </p>
                                <img src="assets/img/testimonial-3.jpg" class="testimonial-img" alt="">
                                <h3>Sofía Castro</h3>
                                <h4>Directora de Seguridad Informática</h4>
                            </div>
                        </div>

                        <!-- Testimonial Item 4 -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    "Participar en 4 Phish me abrió los ojos a las numerosas formas en que los ciberdelincuentes intentan engañarnos. Ahora, estoy más atento a los posibles riesgos en línea."
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                                </p>
                                <img src="assets/img/testimonial-4.jpg" class="testimonial-img" alt="">
                                <h3>José Martínez</h3>
                                <h4>Consultor de Seguridad</h4>
                            </div>
                        </div>

                        <!-- Testimonial Item 5 -->
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                                    "4 Phish me enseñó a mirar más allá de los correos electrónicos aparentemente inofensivos y a cuestionar la autenticidad de los enlaces y las solicitudes de información personal."
                                    <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                                </p>
                                <img src="assets/img/testimonial-5.jpg" class="testimonial-img" alt="">
                                <h3>Henry Lopez</h3>
                                <h4>Analista de Seguridad</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- End Testimonials Section -->
    </main><!-- End #main -->

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
    <script src="assets/js/slider.js"></script>

</body>

</html>