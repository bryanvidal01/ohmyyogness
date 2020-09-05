<?php
function wp_custom_post_type() {
    register_post_type('clients',
        array(
            'labels'      => array(
                'name'          => __('Clients', 'lsd_lang'),
                'singular_name' => __('Client', 'lsd_lang'),
            ),
            'public'      => true,
            'has_archive' => false,
        )
    );
}
add_action('init', 'wp_custom_post_type');
