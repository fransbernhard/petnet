<header class="main-navigation">
    <nav>
        <a class="logo" href="<?php bloginfo('url'); ?>">
            <img src="<?php bloginfo('url'); ?>/wp-content/themes/petnet/app/img/logo.png">
        </a>

        <div class="menu-icons">
            <span class="menu-toggle"></span>
        </div>

        <?php wp_nav_menu(array(
            'theme_location' => 'primary',  
            'container' => false,
        )); ?>
    </nav>
</header>
