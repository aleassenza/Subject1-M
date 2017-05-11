<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Tu cita dental</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <?php require_once('head.php'); ?>
    <!-- Icons Font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="plugins/Lightbox/dist/css/lightbox.css" rel="stylesheet">
    <link href="plugins/Icons/et-line-font/style.css" rel="stylesheet">
    <link href="plugins/animate.css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Preloader
	============================================= -->
    <div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>
    <!-- Header
	============================================= -->
    <section class="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="img/logo/logo1.png" class="img-responsive" alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                    <div class="col-md-3 col-xs-6 nav-wrap">
                        <ul class="nav navbar-nav">
                            <li><a href="#owl-hero" class="page-scroll">Inicio</a></li>
                            <li><a href="#services" class="page-scroll">Servicios</a></li>
                            <li><a href="#portfolio" class="page-scroll">Trabajos</a></li>
                            <!-- <li><a href="#team" class="page-scroll">&iquest;Qui&eacute;nes somos?</a></li> -->
                        </ul>
                    </div>
                    <div class="social-media hidden-sm hidden-xs">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#login"><i>Iniciar Sesion</i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div id="owl-hero" class="owl-carousel owl-theme">
            <div class="item" style="background-image: url(img/tooth/1.jpeg)">
                <div class="caption">
                </div>
            </div>
            <div class="item" style="background-image: url(img/tooth/2.jpeg)">
                <div class="caption">


                </div>
            </div>
            <div class="item" style="background-image: url(img/tooth/3.jpeg)">
                <div class="caption">

                </div>
            </div>
        </div>
    </section>

    <!-- Welcome
	============================================= -->
    <section id="welcome">
        <div class="container">
            <h2>Bienvenido a <span>TuCitaDental</span></h2>
            <hr class="sep">
            <p>Únete a nuestra comunidad y explota tu profesión </p>
            <img class="img-responsive center-block wow fadeInUp" data-wow-delay=".3s" src="img/logo/logo2.png" alt="logo">
        </div>
    </section>

    <!-- Services
	============================================= -->
    <section id="services">
        <div class="container">
            <h2>Servicios</h2>
            <hr class="light-sep">
            <p>A que nos dedicamos</p>
            <div class="services-box">
                <div class="row wow fadeInUp" data-wow-delay=".3s">
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-lightbulb"></span></div>
                        <div class="media-body">
                            <h3>Implantología</h3>
                            <p class="parrafo">Especialidad de la odontología que se encarga del diagnóstico, planificación y ejecución del
                              tratamiento encaminado a la reposición de los dientes perdidos mediante la colocación de implantes.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-mobile"></span></div>
                        <div class="media-body">
                            <h3>General</h3>
                            <p>Se encarga de solucionar los problemas primarios que tienen que
                              ver con la boca, dientes y otras estructuras relacionadas. Representa
                              en la mayoría de los casos el contacto inicial del
                              paciente con el profesional de la odontología.
                            </p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="media-left"><span class="icon-compass"></span></div>
                        <div class="media-body">
                            <h3>Maxilofacial</h3>
                            <p style="margin-bottom: 100px;">Se encarga del diagnóstico y tratamiento médico o quirúrgico de todos
                              aquellos problemas relacionados con las estructura anatómicas de la cara ,
                              la cabeza y el cuello , así como de la patología de la cavidad oral.
                            </p>
                        </div>

                    </div>

                    <div class="row wow fadeInUp" data-wow-delay=".6s">
                        <div class="col-md-4">
                            <div class="media-left"><span class="icon-adjustments"></span></div>
                            <div class="media-body">
                                <h3>Ortodoncia</h3>
                                <p>Parte de la odontología que se ocupa de corregir los defectos y
                                  las irregularidades de posición de los dientes.
                                </p>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="media-left"><span class="icon-tools"></span></div>
                            <div class="media-body">
                                <h3>Endodoncia</h3>
                                <p>Parte de la odontología que estudia las enfermedades de
                                  la pulpa de los dientes y sus técnicas de curación.
                                </p>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="media-left"><span class="icon-wallet"></span></div>
                            <div class="media-body">
                                <h3>Infantil</h3>
                                <p>Especialidad de la odontología que trata el cuidado oral preventivo y terapéutico de niños y
                                  adolescentes. El principal objetivo durante el tratamiento dental es dirigir a niño para que su
                                  actitud sea positiva frente al tratamiento.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio
	============================================= -->
    <section id="portfolio">
        <div class="container-fluid">
            <h2>Nuestros trabajos</h2>
            <hr class="sep">
            <p>Portafolio de nuestros trabajos</p>
            <div class="row">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a style="width:459.656px; height:247.500px;" class="portfolio-box" href="img/portfolio/prueba1.png" data-lightbox="image-1" data-title="Your caption">
                        <img style="width:459.656px; height:247.500px;" src="img/portfolio/prueba1.png" class="img-responsive" alt="1">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a style="width:459.656px; height:247.500px;" href="img/portfolio/prueba2.png" class="portfolio-box" data-lightbox="image-2" data-title="Your caption">
                        <img style="width:459.656px; height:247.500px;" src="img/portfolio/prueba2.png" class="img-responsive" alt="2">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a style="width:459.656px; height:247.500px;" href="img/portfolio/prueba3.png" class="portfolio-box" data-lightbox="image-3" data-title="Your caption">
                        <img style="width:459.656px; height:247.500px;" src="img/portfolio/prueba3.png" class="img-responsive" alt="3">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a style="width:459.656px; height:247.500px;" href="img/portfolio/prueba4.png" class="portfolio-box" data-lightbox="image-4" data-title="Your caption">
                        <img style="width:459.656px; height:247.500px;" src="img/portfolio/prueba4.png" class="img-responsive" alt="4">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="img/portfolio/5.jpg" class="portfolio-box" data-lightbox="image-5" data-title="Your caption">
                        <img src="img/portfolio/5.jpg" class="img-responsive" alt="5">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a href="img/portfolio/6.jpg" class="portfolio-box" data-lightbox="image-6" data-title="Your caption">
                        <img src="img/portfolio/6.jpg" class="img-responsive" alt="6">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">

                                </div>
                                <div class="project-name">

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials
	============================================= -->

    <!-- Footer
	============================================= -->
    <footer>
        <div class="container">
            <h1>Tu cita dental</h1>
            <div class="social">
                <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
            </div>
            <h6>&copy; Derechos reservados UNIMAR 2017 proyecto de pasantías elaborado por Alejandro Maya</h6>
        </div>
    </footer>
    <!-- Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
              </div>
              <div class="modal-body">
                <?php require_once("login.php"); ?>
              </div>
            </div>
          </div>
        </div>

</body>

</html>
