<?php
// Include the configuration file.
include(THEME_DIR_PHP . 'functions.php');

// Class name of the plugin
$className = 'AmzingMarketingPluginPro';

if (!pluginActivated($className)) {
    ?>
    <style>
        .activate_plugin_first {
            padding: 15px;
            background-color: #ffeae4;
            width: 80%;
            margin: 0 auto;
            text-align: center;
            margin-top: 40px;
            border-radius: 5px;
            border: 1px solid #f5cdc1;
            font-family: sans-serif;
            font-size: 20px;
            font-weight: lighter;
        }
    </style>
    <h3 class="activate_plugin_first">This theme required "AMZing Marketing Plugin Pro". please activate this plugin to run this theme.</h3>
    <?php
} else {

    // Check if debugging should be enabled.
    if ($debug_mode) {
        // Display all errors.
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    $myFile = DOMAIN_THEME . "json/home-content.json";
    $home_data = array();
    $jsondata = file_get_contents($myFile);
    $home_data = json_decode($jsondata, true);

    $myMenu = DOMAIN_THEME . "json/menu-content.json";
    $menu_data = array();
    $jsondata2 = file_get_contents($myMenu);
    $menu_data = json_decode($jsondata2, true);

    $myExtraMenu = DOMAIN_THEME . "json/extra_menus.json";
    $extra_menu_data = array();
    $jsondata3 = file_get_contents($myExtraMenu);
    $extra_menu_data = json_decode($jsondata3, true);

    $myColors = DOMAIN_THEME . "json/color_settings.json";
    $colors_data = array();
    $jsondata4 = file_get_contents($myColors);
    $colors_data = json_decode($jsondata4, true);
    ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <?php
            echo Theme::metaTags('title');
            echo Theme::metaTags('description');

            echo Theme::favicon('img/favicon.png');

            echo Theme::css('css/bootstrap.min.css');
            echo Theme::css('css/font-awesome.min.css');
            echo Theme::css('css/owl.carousel.min.css');
            echo Theme::css('css/animate.min.css');
            echo Theme::css('css/style.css');
            echo Theme::css('css/custom.css');
            echo Theme::css('css/responsive.css');

            Theme::plugins('siteHead');

            // Include dynamic color code.
//            include(THEME_DIR_PHP . 'dynamic_colors.php');
            ?>
        </head>
        <body>
            <?php Theme::plugins('siteBodyBegin'); ?>

            <?php
            include(THEME_DIR_PHP . 'header.php');

            if (isset($_GET['content']) && $_GET['content'] == 'blog') {

                include(THEME_DIR_PHP . 'blog.php');
            } elseif ($WHERE_AM_I == 'home') {

                include(THEME_DIR_PHP . 'html.php');
            } elseif ($WHERE_AM_I == 'page') {

                include(THEME_DIR_PHP . 'page.php');
            }

            include(THEME_DIR_PHP . 'footer.php');
            ?>

            <?php
            echo Theme::js('js/jquery-3.2.1.min.js');
            echo Theme::js('js/bootstrap.min.js');
            echo Theme::js('js/owl.carousel.min.js');
            echo Theme::js('js/custom.js');
            ?>

            <?php Theme::plugins('siteBodyEnd'); ?>
        </body>
    </html>
    <?php
}