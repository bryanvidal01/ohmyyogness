<?php

?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        Oh My Yogness!
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
                        <li>
                            <a href="">
                                <?php lsd_get_template_part('icons', 'icon', 'facebook'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <?php lsd_get_template_part('icons', 'icon', 'instagram'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <?php lsd_get_template_part('icons', 'icon', 'twitter'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <?php lsd_get_template_part('icons', 'icon', 'youtube'); ?>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
    <div class="end-footer">
        ©Copyright Oh my yogness! | Tous droits résérvés  | <a href="#">Mentions légales</a>
    </div>



        <?php wp_footer(); ?>

    </body>
</html>
