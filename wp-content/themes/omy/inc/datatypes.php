<?php
function wp_custom_post_type() {
    register_post_type('professeurs',
        array(
            'labels'      => array(
                'name'          => __('Professeurs', 'lsd_lang'),
                'singular_name' => __('Professeur', 'lsd_lang'),
            ),
            'public'      => true,
            'has_archive' => false,
        )
    );

    register_post_type('combinaison',
        array(
            'labels'      => array(
                'name'          => __('Combinaison', 'lsd_lang'),
                'singular_name' => __('Combinaison', 'lsd_lang'),
            ),
            'public'      => true,
            'has_archive' => false,
        )
    );

    register_post_type('recommendations',
        array(
            'labels'      => array(
                'name'          => __('Recommendations', 'lsd_lang'),
                'singular_name' => __('Recommendations', 'lsd_lang'),
            ),
            'public'      => true,
            'has_archive' => false,
            'publicly_queryable'  => 'false'
        )
    );
}

add_action('init', 'wp_custom_post_type');

function wp_register_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Localisation', 'taxonomy general name' ),
        'singular_name'              => _x( 'Localisation', 'taxonomy singular name' ),
        'menu_name'                  => __( 'Localisation' )
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
    );

    register_taxonomy( 'location', 'professeurs', $args );

    $labels = array(
        'name'                       => _x( 'Type de cours', 'taxonomy general name' ),
        'singular_name'              => _x( 'Type de cours', 'taxonomy singular name' ),
        'menu_name'                  => __( 'Type de cours' )
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
    );

    register_taxonomy( 'type_classes', 'professeurs', $args );

    $labels = array(
        'name'                       => _x( 'Style de yoga', 'taxonomy general name' ),
        'singular_name'              => _x( 'Style de yoga', 'taxonomy singular name' ),
        'menu_name'                  => __( 'Style de yoga' )
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
    );

    register_taxonomy( 'yoga_style', 'professeurs', $args );

    $labels = array(
        'name'                       => _x( 'Type de yoga', 'taxonomy general name' ),
        'singular_name'              => _x( 'Type de yoga', 'taxonomy singular name' ),
        'menu_name'                  => __( 'Type de yoga' )
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
    );

    register_taxonomy( 'yoga_type', 'professeurs', $args );

    $labels = array(
        'name'                       => _x( 'Style d’enseignement', 'taxonomy general name' ),
        'singular_name'              => _x( 'Style d’enseignement', 'taxonomy singular name' ),
        'menu_name'                  => __( 'Style d’enseignement' )
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
    );

    register_taxonomy( 'teach_style', 'professeurs', $args );


    $labels = array(
        'name'                       => _x( 'Objectif', 'taxonomy general name' ),
        'singular_name'              => _x( 'Objectif', 'taxonomy singular name' ),
        'menu_name'                  => __( 'Objectif' )
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
    );

    register_taxonomy( 'goal', 'professeurs', $args );

    $labels = array(
        'name'                       => _x( 'Niveau', 'taxonomy general name' ),
        'singular_name'              => _x( 'Niveau', 'taxonomy singular name' ),
        'menu_name'                  => __( 'Niveau' )
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'query_var'             => true,
    );

    register_taxonomy( 'level', 'professeurs', $args );
}

add_action('init', 'wp_register_taxonomy');
