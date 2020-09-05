<?php

/*
Template Name: Landing
*/

get_header();


?>
  <div class="header-home not-home" style="background-image: url('https://images.pexels.com/photos/1916819/pexels-photo-1916819.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500');">
    <div class="content-center">
      <p class="wording white"><?php echo get_the_title(); ?></p>
    </div>
  </div>


<?php

// check if the flexible content field has rows of data
if( have_rows('strates') ):

    // loop through the rows of data
    while ( have_rows('strates') ) : the_row();

        if( get_row_layout() == 'text_grey_image' ):
            $title = get_sub_field('title_text_grey_image');
            $text = get_sub_field('text_text_grey_image');
            $url_link = get_sub_field('url_link_text_grey_image');
            $label_link = get_sub_field('label_link_text_grey_image');
            $image = get_sub_field('image_grey_image');
            $imageURL = lsd_get_thumb($image, 'full');
        ?>

            <div class="strate-about-us">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-container">
                                <div class="title">
                                    <?php if($title): ?>
                                        <?php echo $title; ?>
                                    <?php endif; ?>
                                </div>

                                <?php if($text) : ?>
                                <p>
                                    <?php echo $text; ?>
                                </p>
                                <?php endif; ?>

                                <?php if($url_link): ?>
                                <a href="<?php echo $url_link; ?>" class="button black">
                                    <?php echo ($label_link) ? $label_link : ''; ?>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-strate">
                    <?php if($imageURL): ?>
                        <img src="<?php echo $imageURL; ?>" alt="">
                    <?php endif; ?>
                </div>
            </div>

        <?php elseif( get_row_layout() == 'image_center_alone' ):
            $image = get_sub_field('image_image_center_alone');
            $imageURL = lsd_get_thumb($image, 'full');
            if($image):
        ?>

            <div class="strate-image-full">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="<?php echo $imageURL; ?>" class="image-full" alt="">
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php elseif( get_row_layout() == 'text_right_image_left' ):

            $title_text_right_image_left = get_sub_field('title_text_right_image_left');
            $text_text_right_image_left = get_sub_field('text_text_right_image_left');
            $label_link_text_right_image_left = get_sub_field('label_link_text_right_image_left');
            $url_link_text_right_image_left = get_sub_field('url_link_text_right_image_left');
            $image_left_text_right_image_left = get_sub_field('image_left_text_right_image_left');

            $image_left_text_right_image_leftURL = lsd_get_thumb($image_left_text_right_image_left, 'large');
        ?>

            <div class="strate-text-image">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="<?php echo $image_left_text_right_image_leftURL; ?>" class="image-full" alt="">
                        </div>
                        <div class="col-sm-7">
                            <?php if($title_text_right_image_left) : ?>
                            <div class="title title-strate">
                                <?php echo $title_text_right_image_left; ?>
                            </div>
                            <?php endif; ?>
                            <?php if($text_text_right_image_left): ?>
                            <p>
                                <?php echo $text_text_right_image_left; ?>
                            </p>
                            <?php endif; ?>

                            <?php if($label_link_text_right_image_left && $url_link_text_right_image_left): ?>
                            <a href="<?php echo $url_link_text_right_image_left; ?>" class="button black">
                                <?php echo $label_link_text_right_image_left; ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif( get_row_layout() == 'strate_video_youtube' ):
        $videoURL = get_sub_field('url_video_strate_video_youtube');

        if($videoURL) :
        ?>

            <div class="strate-video">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $videoURL; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php elseif( get_row_layout() == 'strate_text_center' ):
            $title_strate_text_center = get_sub_field('title_strate_text_center');
            $text_strate_text_center = get_sub_field('text_strate_text_center');
            $label_link_strate_text_center = get_sub_field('label_link_strate_text_center');
            $url_link_strate_text_center = get_sub_field('url_link_strate_text_center');
        ?>
        <div class="strate-text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 mx-auto text-center">
                        <?php if($title_strate_text_center) : ?>
                        <div class="title title-strate">
                            <?php echo $title_strate_text_center; ?>
                        </div>
                        <?php endif; ?>

                        <?php if($text_strate_text_center): ?>
                        <p>
                            <?php echo $text_strate_text_center; ?>
                        </p>
                        <?php endif; ?>

                        <?php if($label_link_strate_text_center && $url_link_strate_text_center): ?>
                        <a href="<?php echo $url_link_strate_text_center; ?>" class="button black">
                            <?php echo $label_link_strate_text_center; ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php elseif( get_row_layout() == 'strate_items_image_text' ):
            $items_strate_items_image_text = get_sub_field('items_strate_items_image_text');
            if(!empty($items_strate_items_image_text)):
        ?>

            <div class="strate-partners">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($items_strate_items_image_text as $item_strate_items_image_text):
                            $imagePartner = $item_strate_items_image_text['image'];
                            $imagePartnerURL = lsd_get_thumb($imagePartner, 'galerieSize');

                            $titlePartner = $item_strate_items_image_text['title_item'];
                            $descriptionPartner = $item_strate_items_image_text['text_item'];
                            $labelButton = $item_strate_items_image_text['label_button_item'];
                            $URLbutton = $item_strate_items_image_text['url_button_item'];
                        ?>
                            <div class="col-sm-4">
                                <div class="item-partners">
                                    <?php if($imagePartnerURL): ?>
                                    <img src="<?php echo $imagePartnerURL; ?>" alt="">
                                    <?php endif; ?>
                                    <?php if($titlePartner): ?>
                                    <div class="title">
                                        <?php echo $titlePartner; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if($descriptionPartner): ?>
                                    <?php echo $descriptionPartner; ?>
                                    <?php endif; ?>

                                    <?php if($URLbutton && $labelButton): ?>
                                        <a href="<?php echo $URLbutton; ?>" class="button black"><?php echo $labelButton; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php endif;

    endwhile;

else :

    echo get_row_layout();
endif;

?>







<?php
get_footer();
