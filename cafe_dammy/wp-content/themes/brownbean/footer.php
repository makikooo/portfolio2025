              <div class="under_menu">
                <div class="under_nav_contents">
                    <ul>
                        <li>
                            <a href="<?php echo esc_url(home_url('/')); ?>">当店のこだわり</a>
                        </li>
                        <li class="line"></li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/menu.html#general_menu')); ?>">MENU</a>
                        </li>
                        <li class="line"></li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/#shop_info_and_access')); ?>"
                                >アクセス・店舗情報</a
                            >
                        </li>
                        <li class="line pc_only"></li>
                        <li class="sns pc_only">
                            <a href="#" class="pc_only">
                                <img class="pc_only" src="<?php echo esc_url(get_theme_file_uri('assets/img/insta_brown.png')); ?>" alt="" />
                            </a>
                            <a href="#" class="pc_only">
                                <img class="pc_only" src="<?php echo esc_url(get_theme_file_uri('assets/img/facebook_brown.png')); ?>" alt="" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </main> 
        <footer>
            <p>Copyright <?php bloginfo('name') ?> All Right Reserved.</p>
        </footer>
    <?php wp_footer(); ?>
    </body>
</html>
