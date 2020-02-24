<?php 
$htmlNewsPattern = "<div class=\"element\">
        <div class=\"name\">
            <p><NAME></p>
        </div>
        <div class=\"img\">
            <img src=\"<IMG_URL>\">
        </div>
        <div class=\"text\">
            <p><TEXT></p>
        </div>
    </div>";
$htmlNewsPatternLink = "<div class=\"element\">
        <div class=\"name\">
            <p><NAME></p>
        </div>
        <div class=\"img\">
            <img src=\"<IMG_URL>\">
        </div>
        <div class=\"text\">
            <p><TEXT></p>
            <a href=\"<HREF>\">перейти к статье</a>
        </div>
    </div>;";

global $language;

$xmlDoc = simplexml_load_file("xml/news.xml");
$items = $xmlDoc->xpath('//news/new[@lang="'.$language.'"]');


?>

<div id="news">
    <div class="news_header">
        <h2>Новости и статьи</h2>
        <span class="separatore"></span>
    </div>
    
    <?php
    foreach ($items as $item) {
    	$html = str_replace("<NAME>", $item->name, $htmlNewsPattern);
    	$html = str_replace("<TEXT>", $item->text, $html);
    	$html = str_replace("<IMG_URL>", $item->img, $html);
    	echo $html;
    }
    ?>
</div>