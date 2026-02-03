<header id="header" class="relative">

    <!-- Overlay -->
    <div class="absolute inset-0"></div>

    <!-- Contenu du header -->
    <div class="relative z-10 container mx-auto px-4 py-8">

        <!-- Première ligne : Logo centré + Bouton connexion à droite -->
        <div class="flex items-center justify-between mb-12">
            <!-- Burger menu (mobile) -->
            <button id="burger-menu" class="lg:hidden z-50">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path class="burger-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                    <path class="close-icon hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <!-- Espace vide à gauche (desktop) -->
            <div class="hidden lg:block w-32"></div>

            <!-- Logo et sous-titre centrés -->
            <div class="text-center flex-1">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg"
                         alt="<?php bloginfo('name'); ?>"
                         class="mx-auto mb-2 max-h-[50px]">
                </a>
            </div>

            <!-- Bouton connexion à droite -->
            <div class="w-32 flex justify-end">
                <!-- todo ACF -->
                <a href="#"
                   class="btn btn-primary">
                    Connexion
                </a>
            </div>
        </div>

        <div class="menus-container">
            <!-- Menu navigation -->
            <nav id="main-navigation" class="mb-12 hidden lg:block">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'menu_class' => 'flex justify-center space-x-8',
                    'fallback_cb' => false,
                    'link_before' => '<span class="">',
                    'link_after' => '</span>',
                ));
                ?>
            </nav>

            <!-- Menu mobile -->
            <nav id="mobile-menu" class="lg:hidden fixed inset-0 z-40 hidden">
                <div class="flex items-center justify-center">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'flex flex-col space-y-6 text-white text-center text-2xl font-medium',
                        'fallback_cb' => false,
                        'link_before' => '<span class="block py-2">',
                        'link_after' => '</span>',
                    ));
                    ?>
                </div>
            </nav>

        </div>

        <!-- Titre H1 -->
        <div class="text-center mt-20">
            <h1 class="px-4">
                <?php
                if (is_front_page()) {
                    echo get_bloginfo('name');
                } else {
                    the_title();
                }
                ?>
            </h1>
        </div>

    </div>
</header>
