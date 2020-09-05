<?php
define('THEME_DIR', get_template_directory() . '/');
define('THEME_URL', get_template_directory_uri() . '/');
define('HOME_URL', get_home_url());
define('AJAX_URL', THEME_URL . 'ajax-min.php');

//Correspondance de page
define('PAGE_PRESENTATION', get_field('params_page_presentation', 'option'));
define('PAGE_PARTENAIRES', get_field('params_page_partenaires', 'option'));
define('PAGE_FAQ', get_field('params_page_faq', 'option'));
define('PAGE_CLIENTS', get_field('params_page_clients', 'option'));
define('PAGE_EVENTS', get_field('params_page_event', 'option'));
define('PAGE_CONTACT', get_field('params_page_contact', 'option'));
define('PAGE_CONFIGURATEUR', get_field('params_page_configurateur', 'option'));




require_once( __DIR__ . '/inc/datatypes.php');
require_once( __DIR__ . '/inc/configuration.php');
require_once( __DIR__ . '/inc/configuration_security.php');


require_once(__DIR__ . '/inc/methods.php');
require_once(__DIR__ . '/inc/ajax-methods.php');


// --------------------------
// Scripts et style
// --------------------------
add_action( 'init', 'scripts_site' );
function scripts_site(){
    if( !is_admin() || !is_user_logged_in() ){


        wp_enqueue_style( 'style_principal', get_template_directory_uri() . '/assets/stylesheets/style.css' );

        $dataToBePassed = array(
            'wp_ajax_url' => AJAX_URL,
            'exampleNonce' => wp_create_nonce('exampleNonce'),
        );
        wp_localize_script('script-js', 'ParamsData', $dataToBePassed );

    }
}

//add_action('template_redirect', 'checkUserConnect'); // à mettre en commentaire pour MEP
function checkUserConnect() {
  $isConnect = is_user_logged_in();

  if(!is_user_logged_in() && $isConnect == false):
    wp_redirect(wp_login_url());
  endif;
}


function lsd_get_thumb($id, $size){
    if(empty($size)){
        $size = 'medium';
    }
    if($id){
        $img = wp_get_attachment_image_src($id, $size);
        $imgUrl = reset($img);

        return $imgUrl;
    }
}


if( !function_exists('redirect_404_to_homepage') ){

    add_action( 'template_redirect', 'redirect_404_to_homepage' );

    function redirect_404_to_homepage(){
        if(is_404()):
            wp_safe_redirect( home_url('/') );
            exit;
        endif;
    }
}


function lsd_get_template_part($folder = '', $slug, $name, $args = '') {
    if ($args):
        set_query_var( 'args', $args );
    endif;

    return get_template_part( 'template-parts/'. $folder . '/' .  $slug .'', $name );
}


register_nav_menu( 'primary', 'Primary Menu' );


// Image Sizes
add_image_size( 'galerieSize', 400, 400, true );
add_image_size( 'imageStratePartners', 800, 800, true );

add_image_size( 'presentationPortraitSize', 1000, 1200, true );
add_image_size( 'presentationPaysageSize', 1920, 1080, true );

