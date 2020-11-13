<?php
$image = get_field('post_article_image');
$imageURL = '';
if($image){
    $imageURL = lsd_get_thumb($image, 'imagePushBlog');
}

$supTitle = get_field('post_article_sup_title');
$textDescription = get_field('post_article_description');
?>
<a href="<?php echo get_the_permalink(); ?>" class="push-blog">
    <div class="image">
        <img src="<?php echo $imageURL; ?>">
    </div>
    <div class="category">
        <?php echo $supTitle; ?>
    </div>
    <div class="title">
        <?php echo get_the_title(); ?>
    </div>
    <?php if($textDescription): ?>
        <div class="description">
            <?php echo $textDescription; ?>
        </div>
    <?php endif; ?>
</a>
