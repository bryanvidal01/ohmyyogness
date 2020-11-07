<?php
/*
Template Name: Homepage
*/

get_header();
?>

<div class="hero homepage">
    <img src="https://images.pexels.com/photos/2294353/pexels-photo-2294353.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="background-strate">

    <div class="inner-hero white">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto text-center">
                    <div class="sup-title">
                        Dévoilez vos profs de Yoga
                    </div>
                    <h2 class="title big">
                        À chacun son style, À chacun son prof
                    </h2>
                    <div class="description">
                        <p>Oh My Yogness! vous fait découvrir des profs de yoga à Paris pour vous permettre de trouver celui qui convient le mieux à votre sensibilité, vos objectifs et vos envies du moment. <a href="#">En savoir plus</a></p>

                    </div>
                    <a href="" class="button primary">Trouvez le prof' qui vous convient</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="strate teachers">
                <h3 class="title-hand">
                    Les professeurs
                </h3>
                <div class="title">
                    Trouvez le professeur qui correspond à vos attentes
                </div>
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
                    <a href="" class="button primary">
                        Trouvez le prod' qui vous convient
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-right">
            <h3 class="title-hand">
                Le blog
            </h3>
            <div class="title">
                Retrouvez toutes nos actualités sur notre blog
            </div>
        </div>

        <div class="col-sm-6">
            <?php lsd_get_template_part('bloc', 'bloc', 'article'); ?>
        </div>
        <div class="col-sm-6">
            <?php lsd_get_template_part('bloc', 'bloc', 'article'); ?>
        </div>
        <div class="col-sm-12 text-center marge-top">
            <a href="#" class="button primary">
                Voir tous nos articles
            </a>
        </div>
    </div>
</div>

<?php
get_footer();
