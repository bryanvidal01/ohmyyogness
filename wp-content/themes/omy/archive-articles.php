<?php
/*
Template Name: Archive client
*/

get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="container-intro">
                <div class="title text-uppercase">
                    <h1><?php echo __('Ils sont ravis de la solution Tickando', 'lsd_lang'); ?></h1>
                </div>
                <div class="sub-title blue">
                    <?php echo __('Et bientôt vous aussi ?', 'lsd_lang'); ?>
                </div>
                <div class="marge-top">
                    <a href="<?php echo get_the_permalink(PAGE_CONFIGURATEUR); ?>" class="button blue"><?php echo __('Rejoignez les !', 'lsd_lang'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pushs-clients">
    <?php
    $args = array(
        'post_type' => 'clients'
    );
    $the_query = new WP_Query( $args ); ?>

    <?php if ( $the_query->have_posts() ) : ?>


        <?php
        $i = 0;
        while ( $the_query->have_posts() ) : $the_query->the_post();
        $imageBackground = get_field('post_clients_background');
        $imageBackgroundURL = lsd_get_thumb($imageBackground, 'full');
        $imageClient = get_field('post_clients_client');
        $imageClientURL = lsd_get_thumb($imageClient, 'full');
        $nameClient = get_field('post_clients_name');
        $nameEvent = get_field('post_clients_event_name');
        $temoignageClient = get_field('post_clients_temoignage');
        ?>
            <div class="push-client <?php echo ($i%2 == 1)? 'right':'left'; ?>" style="background-image: url(<?php echo $imageBackgroundURL; ?>);">
                <?php if($i%2 != 1): ?>
                <div class="image-client">
                    <img src="<?php echo $imageClientURL; ?>" alt="">
                </div>
                <?php endif; ?>
                <div class="info-client">
                    <div class="temoignage">
                        <?php echo $temoignageClient; ?>
                    </div>
                    <div class="name-client">
                        <?php echo $nameClient; ?>
                    </div>
                    <div class="name-event">
                        <?php echo $nameEvent; ?>
                    </div>
                </div>
                <?php if($i%2 == 1): ?>
                <div class="image-client">
                    <img src="<?php echo $imageClientURL; ?>" alt="">
                </div>
                <?php endif; ?>
            </div>
        <?php  $i ++; endwhile;?>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php echo __( 'Désolé, aucun client pour le moment', 'lsd_lang'); ?></p>
    <?php endif; ?>

</div>

<?php
get_footer();
