<?php
/*
Template Name: Page présentation
*/

get_header();

$page_presentation_text_intro = get_field('page_presentation_text_intro');
$page_presentation_image_intro = get_field('page_presentation_image_intro');
$page_presentation_image_intro_url = lsd_get_thumb($page_presentation_image_intro, 'full');
$page_presentation_big_title = get_field('page_presentation_big_title');
$page_presentation_sub_description = get_field('page_presentation_sub_description');

//Image Full
$page_presentation_full_background = get_field('page_presentation_full_background');
$page_presentation_full_background_url = lsd_get_thumb($page_presentation_full_background, 'full');
$page_presentation_full_text = get_field('page_presentation_full_text');

// Chiffre clés
$page_presentation_number_title = get_field('page_presentation_number_title');
$page_presentation_number_1 = get_field('page_presentation_number_1');
$page_presentation_label_1 = get_field('page_presentation_label_1');
$page_presentation_number_2 = get_field('page_presentation_number_2');
$page_presentation_label_2 = get_field('page_presentation_label_2');
$page_presentation_number_3 = get_field('page_presentation_number_3');
$page_presentation_label_3 = get_field('page_presentation_label_3');
$page_presentation_text_end = get_field('page_presentation_text_end');
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="container-intro">
                <div class="title text-uppercase">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row intro-presentation">
        <div class="col-sm-6 text-right">
            <?php echo $page_presentation_text_intro; ?>
        </div>
        <div class="col-sm-6">
            <div class="img-presentation">
                <img src="<?php echo $page_presentation_image_intro_url; ?>" alt="">
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <div class="big-title-blue">
                <?php echo $page_presentation_big_title; ?>
            </div>
        </div>
        <div class="col-sm-6">
            <?php echo $page_presentation_sub_description; ?>
        </div>
        <div class="col-sm-12 text-center">
            <a href="<?php echo get_the_permalink(PAGE_CONTACT); ?>" class="button blue marge-top">
                <?php echo __('Discutez avec nous', 'lsd_lang'); ?>
            </a>
        </div>
    </div>
</div>

<div class="strate-image-full" style="background-image: url(<?php echo $page_presentation_full_background_url; ?>); ">
    <div class="text-container">
        <?php echo $page_presentation_full_text; ?>
    </div>
</div>

<div class="container">
    <div class="row strate-key-number">
        <div class="col-sm-12 text-center">
            <div class="title marge-top">
                <?php echo $page_presentation_number_title; ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="key-number">
                <div class="number">
                    <?php echo $page_presentation_number_1; ?>
                </div>
                <div class="label">
                    <?php echo $page_presentation_label_1; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="key-number star">
                <div class="number">
                    <?php echo $page_presentation_number_2; ?>
                </div>
                <div class="label">
                    <?php echo $page_presentation_label_2; ?>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="key-number">
                <div class="number">
                    <?php echo $page_presentation_number_3; ?>
                </div>
                <div class="label">
                    <?php echo $page_presentation_label_3; ?>
                </div>
            </div>
        </div>

        <div class="col-sm-12 text-center">
            <?php echo $page_presentation_text_end; ?>
        </div>

        <div class="col-sm-12 text-center">
            <a href="<?php echo get_the_permalink(PAGE_PARTENAIRES); ?>" class="button black marge-top">
                <?php echo __('Découvrez tous nos partenaires', 'lsd_lang'); ?>
            </a>
        </div>
    </div>
</div>

<?php
get_footer();
