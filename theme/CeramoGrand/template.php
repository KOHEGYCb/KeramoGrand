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

    </head>
    <body>

        <?php get_i18n_component('header'); ?>

        <div class="nav" id="nav">

            <ul>
                <?php get_i18n_navigation(return_page_slug(), 0, 99, I18N_SHOW_MENU); ?>
            </ul>
        </div>
        <div id="content">
<?php 

get_page_content(); 

    // $name_field = return_custom_field('names');
    // $names = array();

    // $str;
    // $name;
    // for ($i = 0; $i < strlen($name_field); $i++){
    //     if (ord($name_field[$i]) == 10){
    //         $names[$name] = $str;
    //         $str = "";
    //     }elseif (ord($name_field[$i]) == 58){
    //         $name = $str;
    //         $str = "";
    //     }else{
    //         $str = $str . $name_field[$i];
    //     }
    // }
    // $names[$name] = $str;

    // $colHTML = "<div class=\"fotorama\" data-width=\"100%\" data-ratio=\"3/1\" data-max-width=\"100%\" data-nav=\"thumbs\">";

    // foreach ($names as $key => $name) {
    //     $link = get_site_url(false) . "data/uploads/collection/" . return_custom_field('dir') . "/" . $name;
    //     $colHTML = $colHTML . "<a href=\"" . $link . "\" data-caption=\"One\"><img src=\"" . $link . "\" width=\"180\" height=\"60\"></a>";
    // }

    // $colHTML = $colHTML . "</div>";

    // echo "$colHTML";

// echo get_i18n_navigation(return_page_slug(),0,99,I18N_SHOW_PAGES | I18N_FILTER_CURRENT);

// echo get_i18n_navigation(return_page_slug(),0,99,I18N_SHOW_TITLES | I18N_FILTER_CURRENT);
    $collections = array();
    $collection = array(
        'name' => "",
        'dir' => "",
        'img' => "",
        'link' => "",
        'color' => ""
    );

    $field = return_custom_field('collections');
    $buf = "";
    $counter = 1;
    for ($i = 0; $i < strlen($field); $i++){
        if (ord($field[$i]) == 10){
            switch ($counter) {
                case 1:
                    $collection['name'] = $buf;
                    break;
                case 2:
                    $collection['dir'] = $buf;
                    break;
                case 3:
                    $collection['img'] = $buf;
                    break;
                case 4:
                    $collection['link'] = $buf;
                    break;
                case 5:
                    $collection['color'] = $buf;
                    break;
            }
            $buf = "";
            $counter++;
            if ($counter > 5) {
                $counter = 1;
                $collections[count($collections)] = $collection;
            }
        }else{
            $buf = $buf . $field[$i];
        }
    }
    $collection['color'] = $buf;

    $collection['name'] = "Blend";
    $collection['dir'] = "blend";
    $collection['img'] = "img83210260.jpg";
    $collection['link'] = "blend";
    $collection['color'] = "w";

    $collections[count($collections)] = $collection;

    ?>
<div id="gallery">

<?php
$innerHTML = "";
    foreach ($collections as $collection) {
        
        $innerHTML = $innerHTML . "<div class=\"element\" color=\"" . $collection['color'] . "\">";
        $innerHTML = $innerHTML . "<a href=\"" . get_site_url(false) . "index.php?id=" . $collection['link'] . "\">";
        $innerHTML = $innerHTML . "<img src=\"" . get_site_url(false) . "data/uploads/collection/" . $collection['dir'] . "/" . $collection['img'] . "\" alt=\"" . $collection['name'] . "\">";
        $innerHTML = $innerHTML . "<span>" . $collection['name'] . "</span>";
        $innerHTML = $innerHTML . "</a>";
        $innerHTML = $innerHTML . "</div>";

    }
    echo "$innerHTML";
?>

</div>
<?php

?>

<div>
            <?php
            // echo get_i18n_search_results(array('tags'=>'laminam', 'words'=>' ', 'DATE_FORMAT'=>'%d.%m.%Y', 'max'=>4, 'i18n'=>0, 'lang'=>'ru', 'numWords'=>'1p', 'order'=>'created','showPaging'=>1,'HEADER'=>''));
                  
            ?>
</div>

        </div>	




        <?php get_footer(); ?>

    </body>
    <script src="<?php get_theme_url(); ?>/js/js.js"></script>
</html>
