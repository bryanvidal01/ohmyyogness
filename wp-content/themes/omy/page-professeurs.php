<?php
/*
Template Name: Page professeurs
*/

get_header();

$filterLocation = get_terms('location',array(
    'hide_empty' => false,
));

$filterYogaStyle = get_terms('yoga_style',array(
    'hide_empty' => false,
));

$filterYogaType = get_terms('yoga_type',array(
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

if($_GET){
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
            <h1 class="title">Sélectionner un ou plusieurs critères pour trouver le(s) professeur(s) qui vous convien(nen)t</h1>
        </div>
    </div>
    <form action="#items-prof" method="GET" class="row container-filters mx-auto">
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Localisation
                </div>
                <div class="fake-select">
                    <div class="placeholder">
                        Choisissez
                    </div>
                    <div class="fake-select-content">
                    <?php if($filterLocation): ?>
                        <?php $i=0; foreach ($filterLocation as $filterLocationItem): $i++; ?>
                            <div class="value">
                                <input type="checkbox" <?php echo ( isset($_GET['location']) && in_array($filterLocationItem->term_id, $_GET['location']) )? 'checked': ''; ?> id="location-<?= $i; ?>" name="location[]" value="<?php echo $filterLocationItem->term_id; ?>">
                                <label for="location-<?= $i; ?>"><?php echo $filterLocationItem->name; ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Styles de Yoga
                </div>

                <div class="fake-select">
                    <div class="placeholder">
                        Choisissez
                    </div>
                    <div class="fake-select-content">
                    <?php if($filterYogaStyle): ?>
                        <?php $i=0; foreach ($filterYogaStyle as $filterYogaStyleItem): $i++;?>
                        <div class="value">
                            <input type="checkbox" <?php echo ( isset($_GET['yogaStyle']) && in_array($filterYogaStyleItem->term_id, $_GET['yogaStyle']) )? 'checked': ''; ?> id="yogaStyle-<?= $i; ?>" name="yogaStyle[]" value="<?php echo $filterYogaStyleItem->term_id; ?>">
                            <label for="yogaStyle-<?= $i; ?>"><?php echo $filterYogaStyleItem->name; ?></label>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Types de Yoga
                </div>
                <div class="fake-select">
                    <div class="placeholder">
                        Choisissez
                    </div>
                    <div class="fake-select-content">
                    <?php if($filterYogaType): ?>
                        <?php $i=0; foreach ($filterYogaType as $filterYogaTypeItem): $i++;?>
                            <div class="value">
                                <input type="checkbox" <?php echo ( isset($_GET['yogaType']) && in_array($filterYogaTypeItem->term_id, $_GET['yogaType']) )? 'checked': ''; ?> id="yogaType-<?= $i; ?>" name="yogaType[]" value="<?php echo $filterYogaTypeItem->term_id; ?>">
                                <label for="yogaType-<?= $i; ?>"><?php echo $filterYogaTypeItem->name; ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Objectifs
                </div>
                <div class="fake-select">
                    <div class="placeholder">
                        Choisissez
                    </div>
                    <div class="fake-select-content">
                    <?php if($filterGoal): ?>
                        <?php $i=0; foreach ($filterGoal as $filterGoalItem): $i++;?>
                            <div class="value">
                                <input type="checkbox" <?php echo ( isset($_GET['goal']) && in_array($filterGoalItem->term_id, $_GET['goal']) )? 'checked': ''; ?> id="goal-<?= $i; ?>" name="goal[]" value="<?php echo $filterGoalItem->term_id; ?>">
                                <label for="goal-<?= $i; ?>"><?php echo $filterGoalItem->name; ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Styles d'enseignement
                </div>
                <div class="fake-select">
                    <div class="placeholder">
                        Choisissez
                    </div>
                    <div class="fake-select-content">
                    <?php if($filterTeachStyle): ?>
                        <?php $i=0; foreach ($filterTeachStyle as $filterTeachStyleItem): $i++; ?>
                            <div class="value">
                                <input type="checkbox" <?php echo ( isset($_GET['teachStyle']) && in_array($filterTeachStyleItem->term_id, $_GET['teachStyle']) )? 'checked': ''; ?> id="teachStyle-<?= $i; ?>" name="teachStyle[]" value="<?php echo $filterTeachStyleItem->term_id; ?>">
                                <label for="teachStyle-<?= $i; ?>"><?php echo $filterTeachStyleItem->name; ?></label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Votre niveau
                </div>
                <div class="fake-select">
                    <div class="placeholder">
                        Choisissez
                    </div>
                    <div class="fake-select-content">
                        <?php if($filterLevel): ?>
                            <?php $i = 0; foreach ($filterLevel as $filterLevelItem): $i++; ?>
                                <div class="value">
                                    <input type="checkbox" <?php echo ( isset($_GET['level']) && in_array($filterLevelItem->term_id, $_GET['level']) )? 'checked': ''; ?> id="level-<?= $i; ?>" name="level[]" value="<?php echo $filterLevelItem->term_id; ?>">
                                    <label for="level-<?= $i; ?>"><?php echo $filterLevelItem->name; ?></label>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 text-center marge-top">
            <button type="submit" class="button primary">Rechercher un professeur</button>
        </div>
    </form>
</div>


<?php if(isset($resultsProfs)): ?>
<div class="container list-push" id="items-prof">
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
