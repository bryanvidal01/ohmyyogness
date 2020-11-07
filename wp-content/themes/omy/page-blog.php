<?php
/*
Template Name: Page archive blog
*/
get_header();

?>

<div class="hero not-homepage">
    <img src="https://images.pexels.com/photos/3735527/pexels-photo-3735527.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="background-strate">

    <div class="inner-hero white">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto text-center">
                    <h2 class="title big">
                        <?php echo get_the_title(); ?>
                    </h2>
                    <div class="description">
                        <p>Oh My Yogness! vous fait découvrir des profs de yoga à Paris pour vous permettre de trouver celui qui convient le mieux à votre sensibilité, vos objectifs et vos envies du moment.</p>
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
            $image = get_field('post_article_image');
            if($image){
                $imageURL = lsd_get_thumb($image, 'imagePushBlog');
            }

            $supTitle = get_field('post_article_sup_title');
            $textDescription = get_field('post_article_description');
        ?>
        <div class="col-sm-4">
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
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>

<?php
get_footer();
