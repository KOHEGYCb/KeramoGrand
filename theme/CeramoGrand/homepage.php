<?php
if (!defined('IN_GS')) {
    die('you cannot load this page directly.');
}
/* * **************************************************
 *
 * @File: 			template.php
 * @Package:		GetSimple
 * @Action:		Cardinal theme for GetSimple CMS
 *
 * *************************************************** */
?>
<!DOCTYPE html>
<html>
    <head>

        <!-- Site Title -->
        <title><?php get_page_clean_title(); ?> &lt; <?php get_site_name(); ?></title>
        <?php 

        // get_header(); 
        get_i18n_header();

        ?>
        <meta name="robots" content="index, follow" />
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php get_theme_url(); ?>/css/styles.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php get_theme_url(); ?>/css/footer.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php get_theme_url(); ?>/css/preloader.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php get_theme_url(); ?>/css/news.css" media="all" />
        
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <link href="<?php get_theme_url(); ?>/css/fotorama.css" rel="stylesheet">


    </head>
    <body>

        <div id="preloader" class="pre_bg">
            <div class="container">
                <div id="preloader_c" class="c"><span>C</span></div>
                <div id="preloader_text" class="text"><span>ERAMO<br/>GRAN</span></div>
                <div id="preloader_d" class="d"><span>D</span></div>
            </div>
        </div>

        <?php get_i18n_component('header'); ?>

        <div class="nav" id="nav">

            <ul>
                <?php get_i18n_navigation(return_page_slug(), 0, 99, I18N_SHOW_MENU); ?>
            </ul>
        </div>


        <div id="content">
            <!-- <h1 class="pageTitle">-->
                <?php 
                // get_page_title();
                 ?>
                <!--</h1> -->
            <!-- <span class="separatore"></span> -->
            <div id="slider" style="overflow: hidden;">
                <div class="fotorama" data-width="100%" data-height="100%" data-fit="cover" data-nav="none" data-loop="true" data-autoplay="5000">
                    <?php
    $a = './data/uploads/main_page_slider';
    $sliderArr = scandir($a);
    unset($sliderArr[0],$sliderArr[1]);
    shuffle($sliderArr);
    $colHTML = "";
    foreach ($sliderArr as $name) {
        $link = get_site_url(false) . "data/uploads/main_page_slider/" . $name;
        $colHTML = $colHTML . "<img src=\"" . $link . "\">";
    }
    echo "$colHTML";
?>
                </div>
            </div>
<?php include 'php/news.php'; ?>
			
			<?php 

get_page_content(); 

?>


        </div>	
        <?php get_i18n_component('footer'); ?>




        <?php get_footer(); ?>

    </body>
    <script src="<?php get_theme_url(); ?>/js/js.js"></script>
    <script src="<?php get_theme_url(); ?>/js/js_slider.js"></script>
	<script src="<?php get_theme_url(); ?>/js/news.js" type="text/javascript"></script>
    <script src="<?php get_theme_url(); ?>/js/fotorama.js"></script>
    <script src="<?php get_theme_url(); ?>/js/preloader.js"></script>
</html>
