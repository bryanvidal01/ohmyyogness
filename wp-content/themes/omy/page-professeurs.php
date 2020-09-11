<?php
/*
Template Name: Page professeurs
*/

get_header();

$filterLocation = get_terms('location',array(
    'hide_empty' => false,
));

$filterTypeClasses = get_terms('type_classes',array(
    'hide_empty' => false,
));

$filterYogaStyle = get_terms('yoga_style',array(
    'hide_empty' => false,
));

$filterTeachStyle = get_terms('teach_style',array(
    'hide_empty' => false,
));

$filterGoal = get_terms('goal',array(
    'hide_empty' => false,
));

$filterLevel = get_terms('level',array(
    'hide_empty' => false,
));

if($_POST){
    $resultsProfs = get_teach_after_filter();
}

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
        <div class="col-sm-12 text-center marge-top-sup">
            <h1 class="title">Trouver le professeur qui correspond à vos attentes</h1>
        </div>
    </div>
    <form action="#" method="POST" class="row container-filters mx-auto">
        <div class="col-sm-3 offset-1">
            <div class="container-select">
                <div class="label">
                    Localisation
                </div>
                <select name="location" id="" class="select-filter">
                    <option value="">Choisissez une ville</option>
                    <?php if($filterLocation): ?>
                        <?php foreach ($filterLocation as $filterLocationItem): ?>
                            <option value="<?php echo $filterLocationItem->term_id; ?>" <?php echo ($_POST['location']== $filterLocationItem->term_id)? 'selected': ''; ?>>
                                <?php echo $filterLocationItem->name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Type de cours
                </div>
                <select name="typeClasses" id="" class="select-filter">
                    <option value="">Choisissez un type</option>
                    <?php if($filterTypeClasses): ?>
                        <?php foreach ($filterTypeClasses as $filterTypeClassesItem): ?>
                            <option value="<?php echo $filterTypeClassesItem->term_id; ?>" <?php echo ($_POST['typeClasses']== $filterTypeClassesItem->term_id)? 'selected': ''; ?>>
                                <?php echo $filterTypeClassesItem->name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Style de Yoga
                </div>
                <select name="yogaStyle" id="" class="select-filter">
                    <option value="">Choisissez un type</option>
                    <?php if($filterTypeClasses): ?>
                        <?php foreach ($filterYogaStyle as $filterYogaStyleItem): ?>
                            <option value="<?php echo $filterYogaStyleItem->term_id; ?>" <?php echo ($_POST['yogaStyle']== $filterYogaStyleItem->term_id)? 'selected': ''; ?>>
                                <?php echo $filterYogaStyleItem->name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-3 offset-1">
            <div class="container-select">
                <div class="label">
                    Objectif
                </div>
                <select name="goal" id="" class="select-filter">
                    <option value="">Choisissez votre objectif</option>
                    <?php if($filterGoal): ?>
                        <?php foreach ($filterGoal as $filterGoalItem): ?>
                            <option value="<?php echo $filterGoalItem->term_id; ?>" <?php echo ($_POST['goal']== $filterGoalItem->term_id)? 'selected': ''; ?>>
                                <?php echo $filterGoalItem->name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Style d'enseignement
                </div>
                <select name="teachStyle" id="" class="select-filter">
                    <option value="">Choisissez un style</option>
                    <?php if($filterTeachStyle): ?>
                        <?php foreach ($filterTeachStyle as $filterTeachStyleItem): ?>
                            <option value="<?php echo $filterTeachStyleItem->term_id; ?>" <?php echo ($_POST['teachStyle']== $filterTeachStyleItem->term_id)? 'selected': ''; ?>>
                                <?php echo $filterTeachStyleItem->name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Votre niveau
                </div>
                <select name="level" id="" class="select-filter">
                    <option value="">Choisissez votre niveau</option>
                    <?php if($filterLevel): ?>
                        <?php foreach ($filterLevel as $filterLevelItem): ?>
                            <option value="<?php echo $filterLevelItem->term_id; ?>" <?php echo ($_POST['level']== $filterLevelItem->term_id)? 'selected': ''; ?>>
                                <?php echo $filterLevelItem->name; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <div class="col-sm-12 text-center marge-top">
            <button type="submit" class="button primary">Trouvez le prof qui vous convient</button>
        </div>
    </form>
</div>


<?php if(isset($resultsProfs)): ?>
<div class="container list-push">
    <div class="row">
        <div class="col-sm-12">
            <div class="strate teachers">
                <h3 class="title-hand">
                    Nos professeurs
                </h3>
                <?php if(isset($resultsProfs) && $resultsProfs->post_count): ?>
                <div class="title">
                    <strong><?php echo $resultsProfs->post_count; ?></strong> professeur<?php echo ($resultsProfs->post_count > 1) ? 's correspondent' : ' correspond'; ?>  à votre recherche
                </div>

                <?php else: ?>
                <div class="title">Aucun professeur ne correspond à votre recherche</div>
                <?php endif; ?>
            </div>
        </div>


        <?php
        if ( isset( $resultsProfs ) && $resultsProfs->have_posts() ):
            while ( $resultsProfs->have_posts() ):
                $resultsProfs->the_post();
                $postID = get_the_id();
        ?>
                <div class="col-sm-4">
                    <?php lsd_get_template_part('bloc', 'bloc', 'teacher', $postID); ?>
                </div>
            <?php endwhile;
        else :

        endif;

        wp_reset_postdata();
        ?>
    </div>
</div>
<?php endif; ?>

<?php
get_footer();
