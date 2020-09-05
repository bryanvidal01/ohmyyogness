<?php
/*
Template Name: Votre évènement
*/

get_header();

$adressMail = get_field('params_mail_address', 'option');
$imageBackground = get_field('image_background');
$imageBackgroundURL = lsd_get_thumb($imageBackground, 'full');
$subTitle = get_field('sub_title_top');
$subTitle2 = get_field('sub_title_top_2');

$aboutUsTitle = get_field('title_who_we_are');
$aboutUsText = get_field('text_who_we_are');
$aboutUsURL = get_field('url_button');
$aboutUsImage = get_field('image_who_we_are');
$aboutUsImageURL = lsd_get_thumb($aboutUsImage, 'full');

$parcoursItems = get_field('item_parcours');

?>
  <div class="header-home" id="slider" data-type="background" data-speed="2" style="background-image: url('<?php echo $imageBackgroundURL; ?>');">

    <div class="content-left">
        <div class="title">
            <?php echo get_the_title(); ?>
        </div>

        <?php if($subTitle): ?>
            <div class="info-eligibility fadeIn">
                <?php echo $subTitle; ?>
            </div>
        <?php endif; ?>

        <?php if($subTitle2): ?>
            <div class="info-eligibility fadeIn">
                <?php echo $subTitle2; ?>
            </div>
        <?php endif; ?>

        <div class="marge-top">
            <a href="<?php echo get_the_permalink(PAGE_CLIENTS); ?>" class="button white"><?php echo __('Témoignages clients', 'lsd_lang'); ?></a>
        </div>
    </div>
  </div>

<div class="strate-about-us" id="tickando-about">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 mx-auto text-center">
        <div class="text-container">
            <?php if($aboutUsTitle): ?>
            <div class="title">
                <?php echo $aboutUsTitle; ?>
            </div>
            <?php endif; ?>

            <?php if($aboutUsText): ?>
                <?php echo $aboutUsText; ?>
            <?php endif; ?>

            <a href="<?php echo get_the_permalink(PAGE_CONFIGURATEUR); ?>" class="blue button"><?php echo __('Tester mon éligibilité', 'lsd_lang'); ?></a>
        </div>
      </div>
    </div>
  </div>
  <div class="image-strate">
    <img src="<?php echo $aboutUsImageURL; ?>" alt="">
  </div>
</div>


<?php
    $question_title = get_field('question_title');
    $question_sub_title = get_field('question_sub_title');
?>

<div class="strate-question-event">
    <div class="container">
        <div class="col-sm-12 text-center">
            <?php if($question_title): ?>
            <div class="title text-uppercase">
                <?php echo $question_title; ?>
            </div>
            <?php endif; ?>

            <?php if($question_sub_title): ?>
                <div class="sub-title-general blue">
                    <?php echo $question_sub_title; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-sm-12">
            <div class="buttons-inline text-center marge-top">
                <a href="<?php echo get_the_permalink(PAGE_CONTACT); ?>" class="button black">
                    <?php echo __('Nous poser une question', 'lsd_lang'); ?>
                </a>
                <a href="<?php echo get_the_permalink(PAGE_FAQ); ?>" class="button blue">
                    <?php echo __('Acceder à la foire aux questions', 'lsd_lang'); ?>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
$imageAboutBackground = get_field('about_background');
$imageAboutBackgroundURL = lsd_get_thumb($imageAboutBackground, 'full');
$titleAboutTop = get_field('about_title');
$subTitleAbout = get_field('about_sub_title');
$contentAbout = get_field('about_text_content');
?>
<div class="strate-how-we-are" style="background-image: url('<?php echo $imageAboutBackgroundURL; ?>')">
    <div class="container-text">
        <div class="title">
            <?php echo $titleAboutTop ?>
        </div>
        <div class="sub-title">
            <?php echo $subTitleAbout; ?>
        </div>
        <div class="content">
            <?php echo $contentAbout; ?>

            <div class="text-center">
                <a href="<?php echo get_the_permalink(PAGE_PARTENAIRES); ?>" class="button blue"><?php echo __('Découvrez nos partenaires', 'lsd_lang'); ?></a>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
