<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();

$image = get_field('post_article_image');
if($image){
    $imageURL = lsd_get_thumb($image, 'presentationPaysageSize');
}
$textDescription = get_field('post_article_description');
$professeurInterview = get_field('post_article_prof');

?>
<div class="hero not-homepage">
    <img src="<?php echo $imageURL; ?>" alt="" class="background-strate">

    <div class="inner-hero white">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto text-center">
                    <h2 class="title big">
                        <?php echo get_the_title(); ?>
                    </h2>
                    <?php if($textDescription): ?>
                    <div class="description">
                        <p><?php echo $textDescription; ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($professeurInterview): ?>
                        <p>Interview de <strong><?= get_field('posttype_prof_full_name', $professeurInterview); ?></strong> du <strong><?= get_the_date('d/m/Y'); ?></strong></p>
                    <a href="<?= get_the_permalink($professeurInterview); ?>" class="button primary">
                        Découvrir ce professeur
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(have_rows('post_strates')): ?>
    <div class="container container-strates">
        <?php while ( have_rows('post_strates') ) : the_row(); ?>


            <?php if (get_row_layout() == 'strate_text_one_image'):
                $titleStrateTextOneImageBigTitle = get_sub_field('strate_text_one_image_big_title');
                $titleStrateTextOneImageTitle = get_sub_field('strate_text_one_image_title');
                $textStrateTextOneImageTitle = get_sub_field('strate_text_one_image_text');
                $imageStrateTextOneImageTitle = get_sub_field('strate_text_one_image_image_1');
                if($imageStrateTextOneImageTitle):
                    $imageURLStrateTextOneImageTitle = lsd_get_thumb($imageStrateTextOneImageTitle, 'imageStratePartners');
                endif;
                $positionStrateTextOneImageTitle = get_sub_field('strate_text_one_image_position');

                ?>

                <div class="row strate-image-text strate">
                    <?php if(isset($imageURLStrateTextOneImageTitle) && $positionStrateTextOneImageTitle == 'right'): ?>
                        <div class="col-sm-6">
                            <img src="<?php echo $imageURLStrateTextOneImageTitle; ?>" alt="">
                        </div>
                    <?php endif; ?>
                    <div class="col-sm-6">
                        <div class="text-content">
                            <?php if($titleStrateTextOneImageBigTitle): ?>
                                <div class="title-hand">
                                    <?php echo $titleStrateTextOneImageBigTitle; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($titleStrateTextOneImageTitle): ?>
                                <div class="title"><?php echo $titleStrateTextOneImageTitle; ?></div>
                            <?php endif; ?>

                            <?php echo ($textStrateTextOneImageTitle)? $textStrateTextOneImageTitle : ''; ?>
                        </div>
                    </div>
                    <?php if(isset($imageURLStrateTextOneImageTitle) && $positionStrateTextOneImageTitle == 'left'): ?>
                        <div class="col-sm-6">
                            <img src="<?php echo $imageURLStrateTextOneImageTitle; ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>

            <?php elseif (get_row_layout() == 'strate_question'):
                $strate_question_sup_title_question = get_sub_field('strate_question_sup_title_question');
                $strate_question_question = get_sub_field('strate_question_question');
                $strate_question_response = get_sub_field('strate_question_response');
                $strate_question_order_right = get_sub_field('strate_question_order_right');
                ?>
                <div class="row strate">
                    <div class="col-sm-12 <?= ($strate_question_order_right)? 'text-right': ''; ?>">
                        <div class="title-hand">
                            <?php echo $strate_question_sup_title_question; ?>
                        </div>
                        <div class="title">
                            <?= $strate_question_question; ?>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <?php if($professeurInterview): ?>
                        <div class="response">
                            <strong>
                                <?= get_the_title($professeurInterview); ?> :
                            </strong>
                        </div>
                        <?php endif; ?>

                        <div class="response-content">
                            <?= $strate_question_response; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>


<?php
get_footer();
