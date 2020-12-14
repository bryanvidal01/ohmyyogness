<?php
    $params_facebook_link = get_field('params_facebook_link', 'option');
    $params_instagram_link = get_field('params_instagram_link', 'option');
    $params_twitter_link = get_field('params_twitter_link', 'option');
    $params_youtube_link = get_field('params_youtube_link', 'option');
?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo">
                        Oh My Yogness!
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="container-menu-footer">
                        <ul>
                            <li>
                                <a href="<?= get_the_permalink(PAGE_LEGALS); ?>">
                                    Mentions légales
                                </a>
                            </li>
                            <li>
                                <a href="mailto:<?= get_field('params_mail_address', 'option') ?>">
                                    Contact
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="container-menu-footer">
                        <?php echo wp_nav_menu(); ?>
                    </div>
                </div>
                <div class="col-sm-3 text-right">
                    <span class="label">
                        Réseaux Sociaux
                    </span>
                    <ul class="social-list">
                        <?php if($params_facebook_link): ?>
                        <li>
                            <a href="<?= $params_facebook_link; ?>">
                                <?php lsd_get_template_part('icons', 'icon', 'facebook'); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if($params_instagram_link): ?>
                        <li>
                            <a href="<?= $params_instagram_link; ?>">
                                <?php lsd_get_template_part('icons', 'icon', 'instagram'); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if($params_twitter_link): ?>
                        <li>
                            <a href="<?= $params_twitter_link; ?>">
                                <?php lsd_get_template_part('icons', 'icon', 'twitter'); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if($params_youtube_link): ?>
                        <li>
                            <a href="<?= $params_youtube_link; ?>">
                                <?php lsd_get_template_part('icons', 'icon', 'youtube'); ?>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
    <div class="end-footer">
        ©Copyright Oh my yogness! | Tous droits résérvés  | <a href="<?= get_the_permalink(PAGE_LEGALS); ?>">Mentions légales</a>
    </div>




        <?php wp_footer(); ?>

    </body>
</html>
