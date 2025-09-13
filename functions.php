<?php
add_action('wp_enqueue_scripts', function () {
    // CSS global (si tu as un style.css pour tout le thème)
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/style.css',
        [],
        '1.0'
    );

    // CSS spécifique à la page École
    if (is_page_template('ecole.php')) {
        wp_enqueue_style(
            'ecole-style',
            get_template_directory_uri() . '/Assets/StyleSheets/style_ecole.css',
            ['theme-style'], // dépend du style global
            '1.0'
        );
    }

});

