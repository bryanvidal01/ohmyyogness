<?php
/*
Template Name: Page FAQ
*/

get_header();

$page_faq_image = get_field('page_faq_image');
$page_faq_image_url = lsd_get_thumb($page_faq_image, 'full');
$page_faq_questions_response = get_field('page_faq_questions_response');

$page_faq_title_bottom = get_field('page_faq_title_bottom');
$page_faq_sub_title_bottom = get_field('page_faq_sub_title_bottom');

?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 mx-auto text-center">
            <div class="container-intro">
                <div class="title text-uppercase">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <?php $i = 1; foreach ($page_faq_questions_response as $page_faq_question_response):
            $page_faq_question = $page_faq_question_response['page_faq_question'];
            $page_faq_response = $page_faq_question_response['page_faq_response'];
            ?>
            <div class="item-question-response">
                <div class="title-question">
                    <span class="number"><?php echo $i; ?>. </span><?php echo $page_faq_question; ?>
                </div>
                <div class="response">
                    <?php echo $page_faq_response; ?>
                </div>
            </div>

            <?php $i++; endforeach; ?>
        </div>
        <div class="col-sm-4">
            <div class="image-faq">
                <img src="<?php echo $page_faq_image_url; ?>" alt="">
            </div>
        </div>
    </div>

    <div class="row strate-affiliation marge-top">
        <div class="col-sm-12 text-center">
            <div class="title text-uppercase marge-top">
                <?php echo $page_faq_title_bottom; ?>
            </div>
            <div class="sub-title-general blue">
                <?php echo $page_faq_sub_title_bottom; ?>
            </div>
            <div class="buttons-inline marge-top">
                <a href="<?php echo get_the_permalink(PAGE_CONTACT); ?>" class="button black">
                    <?php echo __('Nous poser une question', 'lsd_lang'); ?>
                </a>
                <a href="<?php echo get_the_permalink(PAGE_PRESENTATION); ?>" class="button blue">
                    <?php echo __('Présentation de Tickando', 'lsd_lang'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
