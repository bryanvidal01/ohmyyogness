<?php
/*
Template Name: Homepage
*/

get_header();

$image_background = get_field('image_background');
if($image_background){
    $image_background_URL = lsd_get_thumb($image_background, '1920_1080');
}

$sub_title_top = get_field('sub_title_top');
$title_top = get_field('title_top');
$description_top = get_field('description_top');
$label_top = get_field('label_top');

// Teacher
$title_teachers = get_field('title_teachers');
$sub_title_teachers = get_field('sub_title_teachers');
$label_button_teachers = get_field('label_button_teachers');

//Blog
$title_blog = get_field('title_blog');
$sub_title_blog = get_field('sub_title_blog');
$label_button_blog = get_field('label_button_blog');
$articles_blog = get_field('articles_blog');

?>

<div class="hero homepage">
    <img src="<?= (isset($image_background_URL))? $image_background_URL : '' ;?>" alt="" class="background-strate">

    <div class="inner-hero white">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto text-center">
                    <?php if($sub_title_top): ?>
                    <div class="sup-title">
                        <?= $sub_title_top; ?>
                    </div>
                    <?php endif; ?>

                    <?php if($title_top): ?>
                    <h2 class="title big">
                        <?= $title_top; ?>
                    </h2>
                    <?php endif; ?>

                    <?php if($description_top): ?>
                    <div class="description">
                        <?= $description_top; ?>
                    </div>
                    <?php endif; ?>
                    <a href="<?= get_permalink(PAGE_PROFESSEURS); ?>" class="button primary"><?= $label_top; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="strate teachers">
                <?php if($title_teachers): ?>
                <h3 class="title-hand">
                    <?= $title_teachers; ?>
                </h3>
                <?php endif; ?>

                <?php if($sub_title_teachers): ?>
                <div class="title">
                    <?= $sub_title_teachers; ?>
                </div>

                <?php endif; ?>
                <?php
                $resultsProfs = get_teach_after_filter();
                ?>


                <?php
                if ( isset( $resultsProfs ) && $resultsProfs->have_posts() ): ?>
                <div class="slider">
                    <?php while ( $resultsProfs->have_posts() ):
                        $resultsProfs->the_post();
                        $postID = get_the_id();
                        ?>
                        <div>
                            <?php lsd_get_template_part('bloc', 'bloc', 'teacher', $postID); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php endif;

                wp_reset_postdata();
                ?>

                <div class="marge-top text-center">
                    <a href="<?= get_permalink(PAGE_PROFESSEURS); ?>" class="button primary">
                        <?php echo $label_button_teachers; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-right">
            <?php if($title_blog): ?>
            <h3 class="title-hand">
                <?= $title_blog; ?>
            </h3>
            <?php endif; ?>
            <?php if($sub_title_blog): ?>
            <div class="title">
                <?= $sub_title_blog; ?>
            </div>
            <?php endif; ?>
        </div>

        <?php
        foreach ($articles_blog as $post):
            setup_postdata( $post );
        ?>
            <div class="col-sm-4">
                <?php lsd_get_template_part('bloc', 'bloc', 'article'); ?>
            </div>
        <?php
        endforeach;
        wp_reset_postdata();
        ?>

        <div class="col-sm-12 text-center marge-top">
            <a href="<?= get_permalink(PAGE_BLOG); ?>" class="button primary">
                <?= $label_button_blog; ?>
            </a>
        </div>
    </div>
</div>

<?php
get_footer();
