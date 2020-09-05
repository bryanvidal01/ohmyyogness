<?php

/*
Template Name: Contact
*/

get_header();

$contact_page_title = get_field('contact_page_title');
$contact_form_title = get_field('contact_form_title');
$contact_form_sub_title = get_field('contact_form_sub_title');
$contact_form_sub_text = get_field('contact_form_sub_text');
$contact_form_iframe = get_field('contact_form_iframe');
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title text-center text-uppercase marge-top">
                    <h1><?php echo $contact_page_title; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-blue contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="title blue text-uppercase">
                        <?php echo $contact_form_title; ?>
                    </div>
                    <div class="sub-title-general">
                        <?php echo $contact_form_sub_title; ?>
                    </div>
                    <div class="text-form">
                        <?php echo $contact_form_sub_text; ?>
                    </div>

                    <div class="container-form">
                        <?php echo $contact_form_iframe; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
