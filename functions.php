<?php

// Walker para Bootstrap 3, disponible en https://github.com/twittem/wp-bootstrap-navwalker/
require_once('wp_bootstrap_navwalker.php');

// Registra el menú e incluye el uso del Walker.
register_nav_menus( array(
    'principal' => __( 'Menú Principal', 'misioneras' ),
) );

// Registra tamaños personalizados para imagen destacada

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

// additional image sizes
// delete the next line if you do not need additional image sizes
add_image_size( '4-columnas', 360, 300, true  );
add_image_size( '6-columnas', 550, 320, true  );
add_image_size( '8-columnas', 740, 370, true  );
add_image_size( '12-columnas', 1170, 400, true  );
add_image_size( 'portada', 390, 260, true  );
add_image_size( 'equipo', 360, 360, true  );

}

// Título para portada

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Portada' ) . ' | ' . get_bloginfo( 'name' );
  }
  return $title;
}

// Registro de barras laterales

// Registra sidebars
if (function_exists('register_sidebar'))
{

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Barra general', 'misioneras'),
        'description' => __('Barra que muestra información en las páginas de noticias.', 'misioneras'),
        'id' => 'sidebar-general',
        'before_widget' => '<div id="%1$s" class="%2$s">', // Definir según integración con Bootstrap
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-light">', // Definir según integración con Bootstrap
        'after_title' => '</h4><hr class="sep-gris-claro">'
    ));
    
// Define Sidebar Widget Area 4
    register_sidebar(array(
        'name' => __('Footer 1 (Portada - Izquierda)', 'misioneras'),
        'description' => __('Barra que muestra widgets en el primer tercio del footer.', 'misioneras'),
        'id' => 'sidebar-footer-1',
        'before_widget' => '<div id="%1$s" class="%2$s">', // Definir según integración con Bootstrap
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-center titulos titulos-delgados">', // Definir según integración con Bootstrap
        'after_title' => '</h4>'
    ));
    
    // Define Sidebar Widget Area 7
    register_sidebar(array(
        'name' => __('Footer 2 (Portada - Derecha)', 'misioneras'),
        'description' => __('Barra que muestra widgets en el segundo tercio del footer.', 'misioneras'),
        'id' => 'sidebar-footer-2',
        'before_widget' => '<div id="%1$s" class="%2$s">', // Definir según integración con Bootstrap
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-center titulos titulos-delgados">', // Definir según integración con Bootstrap
        'after_title' => '</h4>'
    )); 

    // Define Sidebar Widget Area 8
    register_sidebar(array(
        'name' => __('Footer 3', 'misioneras'),
        'description' => __('Barra que muestra widgets en el último tercio del footer.', 'misioneras'),
        'id' => 'sidebar-footer-3',
        'before_widget' => '<div id="%1$s" class="%2$s">', // Definir según integración con Bootstrap
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-center titulos titulos-delgados">', // Definir según integración con Bootstrap
        'after_title' => '</h4>'
    )); 

    // Define Sidebar Widget Area 9
    register_sidebar(array(
        'name' => __('Footer 4', 'misioneras'),
        'description' => __('Barra que muestra widgets en la segunda línea del footer. Pensado para el menú de footer.', 'misioneras'),
        'id' => 'sidebar-footer-4',
        'before_widget' => '<div id="%1$s" class="%2$s">', // Definir según integración con Bootstrap
        'after_widget' => '</div>',
        'before_title' => '<h4 class="text-center titulos titulos-delgados">', // Definir según integración con Bootstrap
        'after_title' => '</h4>'
    ));

}

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'infinite-scroll', array(
    'container' => 'noticias',
    'footer' => false,
	'wrapper' => 'row',
) ); }

// Post type "Equipo"

add_action('init','create_team_taxonomy');
function create_team_taxonomy() {
    register_taxonomy( 'org_provincias', 'phmc_organizacion',
                      array(
                        'label' => 'Provincias',
                        'hierarchical' => true,
                        'rewrite' => array( 'slug' => 'provincia' ),
                      )
                     );
}

add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'phmc_organizacion',
    array(
      'labels' => array(
        'name' => __( 'Organización' ),
        'singular_name' => __( 'Organización' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'organizacion'),
	  'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions'),
      'taxonomies' => array('org_provincias'),
    )
  );
}

if ( function_exists( 'add_theme_support' ) ) { 
$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 1920,
	'height'                 => 1080,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );
}

// Posts por página para Equipo

function iti_custom_posts_per_page($query)
{
    switch ( $query->query_vars['post_type'] )
    {
        case 'phmc_organizacion': // post type
            $query->query_vars['posts_per_page'] = 40;
            break;

        default:
            break;
    }
    return $query;
}

if( !is_admin() )
{
    add_filter( 'pre_get_posts', 'iti_custom_posts_per_page' );
}

// Agrega CMB2

add_action( 'cmb2_admin_init', 'cmb2_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function cmb2_sample_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_NC_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'metabox_hover_image',
        'title'         => __( 'Opciones de Imagen en Movimiento', 'cmb2' ),
        'object_types'  => array( 'phmc_organizacion', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name'    => 'Imagen de Pose',
        'desc'    => 'Indica la imagen que se mostrará al pasar el mouse encima.',
        'id'      => 'NC_hover_image',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
            'add_upload_file_text' => 'Agregar Imagen' // Change upload button text. Default: "Add or Upload File"
    ),
) );

    // Add other metaboxes as needed

}

?>