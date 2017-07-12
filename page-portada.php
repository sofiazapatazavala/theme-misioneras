<?php
/*
Template Name: Portada
*/

get_header(); ?>

<div class="container">
        <?php /* <div class="row gran-imagen" style="background: url(<?php header_image(); ?>); background-repeat: cover; background-position: center;">
            <div class="container-fluid">
                <div class="row" style="background: transparent linear-gradient(to bottom, rgba(46,84,115,0.7), rgba(104,152,178,0.7)) repeat scroll 0% 0%; background-opacity: 0.7; min-height: 100vh;">
                    <?php /* <div class="col-sm-offset-1 col-sm-3">Espacio para la encuesta</div>
                    <div class="col-sm-offset-7 col-sm-4">
                        <h1 class="texto-blanco text-right"></h1>
                        <h5 class="texto-blanco text-right"></h5>
                    </div> 
                </div>
            </div>      
        </div> */ ?>
    <div class="row">
        <div class="col-md-12 separador-portada">
            <h1 class="titular fondo-naranjo a-la-derecha">Pequeñas Hermanas Misioneras de la Caridad</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="fondo-gris-claro" style="padding: 0.5em;">
                <h5 class="text-center">Sobre nosotras</h5>
                <img src="<?php echo wp_get_attachment_url( 259 ); ?>" class="img-responsive">
                <p>Un repaso a los orígenes de nuestra congregación y nuestra obra en Chile.</p>
                <a class="btn btn-primary btn-sm btn-block" href="<?php echo esc_url( get_permalink(20) ); ?>" role="button">Nuestra historia</a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="fondo-gris-claro" style="padding: 0.5em;">
                <h5 class="text-center">Provincia Chilena</h5>
                <img src="<?php echo wp_get_attachment_url( 235 ); ?>" class="img-responsive">
                <p>Las encargadas de llevar adelante el proyecto iniciado por Don Orione.</p>
                <a class="btn btn-primary btn-sm btn-block" href="<?php echo esc_url( get_term_link(5, 'org_provincias') ); ?>" role="button">Revise nuestros cargos</a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="fondo-gris-claro" style="padding: 0.5em;">
                <h5 class="text-center">Don Orione</h5>
                <img src="<?php echo wp_get_attachment_url( 260 ); ?>" class="img-responsive">
                <p>El fundador de nuestra obra. Vida, obra, documentos y material didáctico para niños y niñas.</p>
                <a class="btn btn-primary btn-sm btn-block" href="<?php echo esc_url( get_permalink(28) ); ?>" role="button">Biografía de Don Orione</a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="fondo-gris-claro" style="padding: 0.5em;">
              <h5 class="text-center">Noticias</h5>
              <?php $my_query = new WP_Query( 'post_type=post&posts_per_page=1' );
                while ( $my_query->have_posts() ) : $my_query->the_post();
                $do_not_duplicate[] = $post->ID; ?>
    

                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                    <div align="center"><?php echo get_the_post_thumbnail( $page->ID, 'portada', array( 'class' => 'img-responsive' ) ); ?></div>
                    <?php the_title( sprintf( '<h3 class="text-center"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ) ?>
                    </header>
                    <footer class="entry-footer">
                      <?php edit_post_link( __( 'Editar', 'misioneras' ), '<span class="edit-link btn btn-default btn-block" style="margin-bottom:10px;">', '</span>' ); ?>
                    </footer><!-- .entry-footer -->
                  </article>

              <?php endwhile; ?>
              <a class="btn btn-primary btn-sm btn-block" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" role="button">Ver todas las noticias</a>
            </div>
        </div>
    </div>
</div>
<?php if ( is_front_page() ) { ?></div></div><?php } ?><!-- Cierra la zona con fondo de imagen -->

<?php /*
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2>Noticias</h2>
        </div>
        <div class="col-sm-4">
            <a class="btn btn-primary btn-sm margin-lg pull-right" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" role="button">Revisa todas las noticias</a>
        </div>
    </div>
    <div class="row the-content">
        	<?php $my_query = new WP_Query( 'post_type=post&posts_per_page=3' );
            while ( $my_query->have_posts() ) : $my_query->the_post();
            $do_not_duplicate[] = $post->ID; ?>
    
                <div class="col-sm-4">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <header class="entry-header">
                            <div align="center"><?php echo get_the_post_thumbnail( $page->ID, 'portada', array( 'class' => 'img-responsive' ) ); ?></div>
    
                            <?php the_title( sprintf( '<h3 class="text-center"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ) ?>
    
                            <p><?php the_excerpt(); ?></p>
    
                        </header>

                        <footer class="entry-footer">
                            <?php edit_post_link( __( 'Editar', 'misioneras' ), '<span class="edit-link btn btn-default btn-block" style="margin-bottom:10px;">', '</span>' ); ?>
                        </footer><!-- .entry-footer -->

                    </article></div><!-- #post-## -->
        
        <?php endwhile; ?>
    </div>
</div>
*/ ?>
<?php get_footer(); ?>