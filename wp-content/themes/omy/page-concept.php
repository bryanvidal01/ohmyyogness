<?php
/*
Template Name: Page concept
*/

get_header();


$page_concept_hero_intro = get_field('page_concept_hero_intro');
$page_concept_hero_background = get_field('page_concept_hero_background');

if($page_concept_hero_background){
    $page_concept_hero_background_URL = lsd_get_thumb($page_concept_hero_background, 'presentationPaysageSize');
}


$page_concept_concept_title = get_field('page_concept_concept_title');
$page_concept_concept_subtitle = get_field('page_concept_concept_subtitle');
$page_concept_concept_text = get_field('page_concept_concept_text');

$page_concept_how_title = get_field('page_concept_how_title');
$page_concept_how_subtitle = get_field('page_concept_how_subtitle');
$page_concept_how_text = get_field('page_concept_how_text');
$page_concept_how_image = get_field('page_concept_how_image');

if($page_concept_how_image){
    $page_concept_how_image_URL = lsd_get_thumb($page_concept_how_image, 'imageStratePartners');
}


$page_concept_steps_title = get_field('page_concept_steps_title');
$page_concept_steps_subtitle = get_field('page_concept_steps_subtitle');
$page_concept_steps_title_1 = get_field('page_concept_steps_title_1');
$page_concept_steps_text_1 = get_field('page_concept_steps_text_1');
$page_concept_steps_title_2 = get_field('page_concept_steps_title_2');
$page_concept_steps_text_2 = get_field('page_concept_steps_text_2');
$page_concept_steps_title_3 = get_field('page_concept_steps_title_3');
$page_concept_steps_text_3 = get_field('page_concept_steps_text_3');
$page_concept_steps_button_label = get_field('page_concept_steps_button_label');



?>

<div class="hero not-homepage">
    <?php if($page_concept_hero_background_URL): ?>
        <img src="<?= $page_concept_hero_background_URL; ?>" alt="" class="background-strate">
    <?php endif; ?>
    <div class="inner-hero white">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto text-center">
                    <h2 class="title big">
                        <?= get_the_title(); ?>
                    </h2>
                    <?php if($page_concept_hero_intro): ?>
                    <div class="description">
                        <?php echo $page_concept_hero_intro; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php if($page_concept_concept_title): ?>
            <div class="title-hand">
                <?= $page_concept_concept_title; ?>
            </div>
            <?php endif; ?>

            <?php if($page_concept_concept_subtitle): ?>
            <div class="title">
                <?= $page_concept_concept_subtitle; ?>
            </div>
            <?php endif; ?>

            <?= $page_concept_concept_text; ?>

        </div>
    </div>
</div>

<div class="container-grey">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php if($page_concept_how_image_URL): ?>
                <img src="<?= $page_concept_how_image_URL; ?>" class="img-strate" alt="">
                <?php endif; ?>
            </div>
            <div class="col-sm-6">
                <?php if($page_concept_how_title): ?>
                <div class="title-hand">
                    <?= $page_concept_how_title; ?>
                </div>
                <?php endif; ?>

                <?php if($page_concept_how_subtitle): ?>
                <div class="title">
                    <?= $page_concept_how_subtitle; ?>
                </div>
                <?php endif; ?>
                <?php if($page_concept_how_text): ?>
                    <?= $page_concept_how_text; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php if($page_concept_steps_title): ?>
            <div class="title-hand">
                <?= $page_concept_steps_title; ?>
            </div>
            <?php endif; ?>
            <?php if($page_concept_steps_subtitle): ?>
            <div class="title">
                <?= $page_concept_steps_subtitle; ?>
            </div>
            <?php endif; ?>
        </div>

        <?php if(($page_concept_steps_title_1) || ($page_concept_steps_text_1)): ?>
        <div class="col-md-4">
            <div class="card-step">
                <div class="number">
                    1
                </div>
                <?php if($page_concept_steps_title_1): ?>
                <div class="title-card">
                    <?= $page_concept_steps_title_1; ?>
                </div>
                <?php endif; ?>

                <?php if($page_concept_steps_text_1): ?>
                <div class="description-card">
                    <?= $page_concept_steps_text_1; ?>
                </div>
                <?php endif; ?>

                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/params.svg" alt="">
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(($page_concept_steps_title_2) || ($page_concept_steps_text_2)): ?>
        <div class="col-md-4">
            <div class="card-step">
                <div class="number">
                    2
                </div>
                <?php if($page_concept_steps_title_2): ?>
                    <div class="title-card">
                        <?= $page_concept_steps_title_2; ?>
                    </div>
                <?php endif; ?>

                <?php if($page_concept_steps_text_2): ?>
                    <div class="description-card">
                        <?= $page_concept_steps_text_2; ?>
                    </div>
                <?php endif; ?>
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="">
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(($page_concept_steps_title_3) || ($page_concept_steps_text_3)): ?>
        <div class="col-md-4">
            <div class="card-step last">
                <div class="number">
                    3
                </div>
                <?php if($page_concept_steps_title_3): ?>
                    <div class="title-card">
                        <?= $page_concept_steps_title_3; ?>
                    </div>
                <?php endif; ?>

                <?php if($page_concept_steps_text_3): ?>
                    <div class="description-card">
                        <?= $page_concept_steps_text_3; ?>
                    </div>
                <?php endif; ?>
                <div class="icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team.svg" alt="">
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="" class="button primary marge-top-sup">Chercher un professeur</a>
        </div>
    </div>
</div>
<?php
    get_footer();
?>
