<?php
define('THEME_DIR', get_template_directory() . '/');
define('THEME_URL', get_template_directory_uri() . '/');
define('HOME_URL', get_home_url());
define('AJAX_URL', THEME_URL . 'ajax-min.php');

//Correspondance de page


define('PAGE_PROFESSEURS', get_field('params_page_professeur', 'option'));
define('PAGE_COMPTE', get_field('params_page_compte', 'option'));
define('PAGE_BLOG', get_field('params_page_blog', 'option'));
define('PAGE_ABOUT', get_field('params_page_presentation', 'option'));
define('PAGE_LEGALS', get_field('params_page_legals', 'option'));




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



// Image Sizes
add_image_size( 'galerieSize', 400, 400, true );
add_image_size( 'imageStratePartners', 800, 800, true );

add_image_size( 'imagePushBlog', 400, 500, true );
add_image_size( 'presentationPortraitSize', 1000, 1200, true );
add_image_size( '800_1000', 800, 1000, true );
add_image_size( '1000_600', 1000, 600, true );
add_image_size( '1000_600', 1000, 600, true );
add_image_size( '800_500', 800, 500, true );
add_image_size( 'presentationPaysageSize', 1920, 1080, true );




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


function remove_menu_items() {
    global $menu;
    $restricted = array(__('Recommendations'), __('WooCommerce'), __('Produits'), __('Marketing'), __('Statistiques'), __('Médias'));
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);

        if (in_array($value[0] != NULL?$value[0]:"" , $restricted)){
            unset($menu[key($menu)]);}
    }
}
add_action('admin_menu', 'remove_menu_items');




