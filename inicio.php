<?php
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['lvl']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin - Tu cita denatal</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/sweetalert2.min.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.min.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">
	<link href="css/jquery-ui.css" rel="stylesheet">
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">


      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">TU CITA <span class="lite">DENTAL</span></a>
            <!--logo end-->


            <div class="top-nav notification-row">
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important" id="cant"></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue" id="cant_not"></p>
                            </li>
                            <li>
                                <a href="#" id="nots">Ver todas las notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" id="user" href="#" data-mail=<?php echo $_SESSION['user'] ?> data-ci=<?php echo $_SESSION['ci'] ?>>
                            <span class="profile-ava">
                                <!-- POR SI LLEVA IMAGEN <img alt="" src="img/avatar1_small.jpg"> -->
                            </span>
                            <span class="username">Bienvenido <?php echo $_SESSION['fullname']; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#" id="profile"><i class="icon_profile"></i> Mi perfil</a>
                            </li>
                            <li>
                                <a href="#" id="mail"><i class="icon_mail_alt"></i> Correo</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Cerrar sesión</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="inicio.php">
                          <i class="icon_house_alt"></i>
                          <span>Inicio</span>
                      </a>
                  </li>
                  <?php if($_SESSION['lvl'] <= 1) {?>
                  <li class="sub-menu">
                      <a href="javascript:;" class="" id="users">
                          <i class="icon_globe"></i>
                          <span>Usuarios</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                  		<?php $_SESSION['lvl'] == 0 ? $all = '_all' : $all = '' ?>
                          <li><a class="" id="doctor<?php echo $all ?>" href="#">Doctores</a></li>
                          <li><a class="" id="paciente<?php echo $all ?>" href="#">Pacientes</a></li>
                          <?php
                          if($_SESSION['lvl'] == 0) {
                          ?>
                          	<li><a class="" id="moderador<?php echo $all ?>" href="#">Moderadores</a></li>
                          <?php
                          }
                          ?>
                      </ul>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="" id="cita">
                          <i class="icon_document_alt"></i>
                          <span>Citas</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="#" id="report">
                          <i class="icon_piechart"></i>
                          <span>Reportes</span>
                      </a>
                  </li>
                  <?php } ?>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      	<section id="main-content">
			<section class="wrapper">
              	<!--overview start-->
			  	<!-- <div class="row">

			  	</div> -->
		  </section>
			<?php include "modal.html"; ?>
      	</section>

      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
	<script src="js/jquery.js"></script>
    <script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/inicio.js"></script>
    <script src="js/dates.js"></script>
    <script src="js/reportes.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/es.js"></script>
    <!-- bootstrap -->
    <script src="bootstrap-assets/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="js/jquery.knob.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/morris.min.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
	<script src="js/gdp-data.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });


  </script>

  </body>
</html>


<?php
}else{
	header('Location:index.php');
}
?>