<?php
/*
Template Name: Page archive blog
*/
get_header();

$resultsProfs = get_teach_after_filter();

$imageIntro = get_field('page_hero_image_background');

if($imageIntro):
    $imageIntroURL = lsd_get_thumb($imageIntro, '1920_1080');
endif;
$titlePage = get_field('page_hero_title');
$introductionPage = get_field('page_hero_introduction');
?>

    <div class="hero not-homepage">
        <?php if(isset($imageIntroURL)): ?>
            <img src="<?= $imageIntroURL; ?>" alt="" class="background-strate">
        <?php endif; ?>
        <div class="inner-hero white">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 mx-auto text-center">
                        <h2 class="title big">
                            <?= $titlePage; ?>
                        </h2>
                        <div class="description">
                            <p><?= $introductionPage; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="title-hand">Découvrez</div>
            <div class="title">Notre blog</div>
        </div>
    </div>

    <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'order_by' => 'date',
            'order' => 'DESC'
        );

        $the_query = new WP_Query($args);

        if($the_query->have_posts()):
    ?>
    <div class="row">

        <?php
        while ( $the_query->have_posts() ):
            $the_query->the_post();
        ?>
        <div class="col-sm-4">
            <?php lsd_get_template_part('bloc', 'bloc', 'article'); ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>

<?php
get_footer();
