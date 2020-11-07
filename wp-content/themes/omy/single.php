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
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(have_rows('post_strates')): ?>
    <div class="container container-strates">
        <?php while ( have_rows('post_strates') ) : the_row(); ?>

            <?php

            if(get_row_layout() == 'strate_text_two_image'):
                $bigTitleStrateTwoImageText = get_sub_field('strate_text_two_image_big_title');
                $titleStrateTwoImageText = get_sub_field('strate_text_two_image_title');
                $textStrateTwoImageText = get_sub_field('strate_text_two_image_text');
                $imageOneIDStrateTwoImageText = get_sub_field('strate_text_two_image_image_1');
                $imageOneURLStrateTwoImageText = '';
                if($imageOneIDStrateTwoImageText):
                    $imageOneURLStrateTwoImageText = lsd_get_thumb($imageOneIDStrateTwoImageText, '800_1000');
                endif;

                $imageTwoIDStrateTwoImageText = get_sub_field('strate_text_two_image_image_2');
                $imageTwoURLStrateTwoImageText = '';
                if($imageTwoIDStrateTwoImageText):
                    $imageTwoURLStrateTwoImageText = lsd_get_thumb($imageTwoIDStrateTwoImageText, '1000_600');
                endif;
                ?>

                <div class="row strate strate-images-textes imgs-right">
                    <div class="col-sm-7">
                        <div class="text-content">
                            <?php if($bigTitleStrateTwoImageText): ?>
                                <div class="title-hand">
                                    <?php echo $bigTitleStrateTwoImageText; ?>
                                </div>
                            <?php endif; ?>
                            <?php if($titleStrateTwoImageText): ?>
                                <div class="title"><?php echo $titleStrateTwoImageText; ?></div>
                            <?php endif; ?>
                            <?php echo ($textStrateTwoImageText) ? $textStrateTwoImageText : ''; ?>
                        </div>
                        <?php if(isset($imageTwoURLStrateTwoImageText)): ?>
                            <img src="<?php echo $imageTwoURLStrateTwoImageText; ?>" class="image-2" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-5">
                        <?php if(isset($imageOneURLStrateTwoImageText)): ?>
                            <img src="<?php echo $imageOneURLStrateTwoImageText; ?>" class="image-1" alt="">
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif (get_row_layout() == 'strate_text_one_image'):
                $titleStrateTextOneImageBigTitle = get_sub_field('strate_text_one_image_big_title');
                $titleStrateTextOneImageTitle = get_sub_field('strate_text_one_image_title');
                $textStrateTextOneImageTitle = get_sub_field('strate_text_one_image_text');
                $imageStrateTextOneImageTitle = get_sub_field('strate_text_one_image_image_1');
                if($imageStrateTextOneImageTitle):
                    $imageURLStrateTextOneImageTitle = lsd_get_thumb($imageStrateTextOneImageTitle, '800_500');
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
            <?php elseif (get_row_layout() == 'strate_text_center'):
                $titleStrateTextCenter = get_sub_field('strate_text_center_title');
                $textStrateTextCenter = get_sub_field('strate_text_center_text');
                ?>
                <div class="row strate-textes-center text-center strate">
                    <div class="col-sm-9 mx-auto">
                        <div class="text-content">
                            <?php if($titleStrateTextCenter): ?>
                                <div class="title"><?php echo $titleStrateTextCenter; ?></div>
                            <?php endif; ?>
                            <?php echo ($textStrateTextCenter)? $textStrateTextCenter : ''; ?>
                        </div>
                    </div>
                </div>

            <?php elseif (get_row_layout() == 'image_center'):
                $imageCenterImage = get_sub_field('image_center_image');
                if($imageCenterImage):
                    $imageURLCenterImage = lsd_get_thumb($imageCenterImage, 'presentationPaysageSize');
                endif;
                ?>
                <?php if(isset($imageURLCenterImage)): ?>
                <div class="strate row image-center">
                    <div class="col-sm-12">
                        <img src="<?php echo $imageURLCenterImage; ?>" alt="">
                    </div>
                </div>
            <?php endif; ?>

            <?php elseif (get_row_layout() == 'strate_contenu_riche'):
                $richeContent = get_sub_field('strate_contenu_riche_content');
                ?>
                <div class="row strate-textes-center strate">
                    <div class="col-sm-10 mx-auto">
                        <div class="text-content">
                            <?php echo $richeContent; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>


<?php
get_footer();
