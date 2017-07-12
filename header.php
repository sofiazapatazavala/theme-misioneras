<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(''); ?></title>

	<!-- Estilos -->
      
	<!-- Bootstrap -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>

    <!-- Estilos de WordPress -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body <?php body_class(); ?>>
      <div class="header container-fluid<?php if ( is_front_page() ) { ?> header-portada<?php } else { ?> header-no-portada<?php } ?>">
        <?php if ( is_front_page() ) { ?><div class="row gran-imagen" style="padding-bottom: 1em; background: url(<?php header_image(); ?>); background-repeat: cover; background-position: center;">
          <div class="container-fluid"><?php } ?>
            <div class="row">
              <div class="col-sm-1 col-sm-offset-1">
                <a href="<?php echo home_url(); ?>">
                  <img src="<?php bloginfo('template_directory'); ?>/img/logoPSMC.png" class="center-block img-responsive header-logo">
                </a>
              </div>
            <div class="col-sm-8">
              <nav class="navbar <?php /* if ( is_front_page() ) { ?>navbar-inverse<?php } else { */ ?>navbar-default<?php /* } */ ?> margin-1_5-0" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-PHMC">
                    <span class="sr-only">Mostrar u ocultar navigación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand visible-xs">
                    Menú de navegación
                  </a>
                </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'principal',
                'theme_location'    => 'principal',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbar-PHMC',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
</nav>
            </div>
            <div class="col-sm-1">
                <?php /* <div class="row">
                    <div class="col-xs-2 col-xs-offset-4 col-sm-4 col-sm-offset-2">
                        <a href="#" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/redes_fb_grande.png" class="center-block margin-lg" style="max-width:30px;" /></a>
                    </div>
                </div> */ ?>
            </div>
        </div>

      </div>
            
