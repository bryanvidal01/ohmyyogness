<?php
/*
Template Name: Page professeurs
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
        <div class="col-sm-12 text-center marge-top-sup">
            <h1 class="title">Trouver le professeur qui correspond à vos attentes</h1>
        </div>
    </div>
    <div class="row container-filters mx-auto">
        <div class="col-sm-3 offset-1">
            <div class="container-select">
                <div class="label">
                    Localisation
                </div>
                <select name="location" id="" class="select-filter">
                    <option value="">Choisissez une ville</option>
                    <option value="">Paris</option>
                    <option value="">Nice</option>
                    <option value="">Toulon</option>
                    <option value="">Corse</option>
                    <option value="">Calvados</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Type de cours
                </div>
                <select name="location" id="" class="select-filter">
                    <option value="">Choisissez un type</option>
                    <option value="">Paris</option>
                    <option value="">Nice</option>
                    <option value="">Toulon</option>
                    <option value="">Corse</option>
                    <option value="">Calvados</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Style de Yoga
                </div>
                <select name="location" id="" class="select-filter">
                    <option value="">Choisissez un type</option>
                    <option value="">Paris</option>
                    <option value="">Nice</option>
                    <option value="">Toulon</option>
                    <option value="">Corse</option>
                    <option value="">Calvados</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3 offset-3">
            <div class="container-select">
                <div class="label">
                    Style d'enseignement
                </div>
                <select name="location" id="" class="select-filter">
                    <option value="">Choisissez un style</option>
                    <option value="">Paris</option>
                    <option value="">Nice</option>
                    <option value="">Toulon</option>
                    <option value="">Corse</option>
                    <option value="">Calvados</option>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="container-select">
                <div class="label">
                    Votre niveau
                </div>
                <select name="location" id="" class="select-filter">
                    <option value="">Choisissez votre niveau</option>
                    <option value="">Paris</option>
                    <option value="">Nice</option>
                    <option value="">Toulon</option>
                    <option value="">Corse</option>
                    <option value="">Calvados</option>
                </select>
            </div>
        </div>

        <div class="col-sm-12 text-center marge-top">
            <a href="" class="button primary">Trouvez le prof qui vous convient</a>
        </div>
    </div>
</div>



<div class="container list-push">
    <div class="row">
        <div class="col-sm-12">
            <div class="strate teachers">
                <h3 class="title-hand">
                    Nos professeurs
                </h3>
                <div class="title">
                    <strong>6</strong> sprofesseurs correspondent à vos recherche
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <?php lsd_get_template_part('bloc', 'bloc', 'teacher'); ?>
        </div>
        <div class="col-sm-4">
            <?php lsd_get_template_part('bloc', 'bloc', 'teacher'); ?>
        </div>
        <div class="col-sm-4">
            <?php lsd_get_template_part('bloc', 'bloc', 'teacher'); ?>
        </div>
        <div class="col-sm-4">
            <?php lsd_get_template_part('bloc', 'bloc', 'teacher'); ?>
        </div>
        <div class="col-sm-4">
            <?php lsd_get_template_part('bloc', 'bloc', 'teacher'); ?>
        </div>
        <div class="col-sm-4">
            <?php lsd_get_template_part('bloc', 'bloc', 'teacher'); ?>
        </div>
    </div>
</div>


<?php
get_footer();
