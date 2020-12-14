<?php
/*
Template Name: Page mentions
*/
get_header();
the_post();
?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="title-hand"><?= get_the_title(); ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= get_the_content(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
