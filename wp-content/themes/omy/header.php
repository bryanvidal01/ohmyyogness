
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173944003-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-173944003-1');
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/assets/images/icon.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">

    <script  src='<?php echo get_template_directory_uri();?>/assets/js/jquery.js'></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.js"></script>
    <script  src='<?php echo get_template_directory_uri();?>/assets/js/app.js'></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="<?php echo apply_filters( 'wpml_home_url', get_option( 'home' ) ); ?>" class="logo">
                    <h1>
                        Oh My Yogness!
                    </h1>
                </a>
            </div>
            <div class="col-sm-9 text-right">
                <div class="navigation">
                    <?php echo wp_nav_menu(); ?>
                </div>
                <a href="#" class="account-link">
                    <?php lsd_get_template_part('icons', 'icon', 'user'); ?>
                    Mon compte
                </a>
            </div>
        </div>
    </div>
</header>


