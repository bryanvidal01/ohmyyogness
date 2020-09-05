<?php
add_action( 'wp_ajax_example', 'example_callback' );
add_action( 'wp_ajax_nopriv_example', 'example_callback' );
function example_callback()
{
    // Security
    checkNonce('exampleNonce');

    $var = isset($_POST['var']) ? filter_var($_POST['var'], FILTER_SANITIZE_STRING) : '';

    if ( !empty($var) ) {

        $response['status'] = 200;

        ob_start();
        ?>

        <!-- HTML -->
        
        <?php
        $response['content'] = ob_get_clean();
        $message = '';

    }else{

        $response['status'] = 300;
        $message = '';
    }

    $response['message'] = $message;

    wp_send_json( $response );
}
