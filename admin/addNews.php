<?php

$req = $_POST['addNews'];

$name=$_POST['name'];
$lang=$_POST['lang'];
$text=$_POST['text'];
$imgUrl=$_POST['imgUrl'];
$link=$_POST['link'];

$xmlDoc = simplexml_load_file("../xml/news.xml");
$items = $xmlDoc->xpath('//news');
$id = count($xmlDoc->xpath('//news/new'))+1;
$items[0]->addChild('new')->addAttribute('id', $id);



foreach ($items[0]->children() as $item) {
    if ($item['id'] == $id){
    	$item->addAttribute('lang', $lang);
        $item->addChild('name', $name);
        $item->addChild('text', $text);
        $item->addChild('img', $imgUrl);
        $item->addChild('href', $link);
    }
}   


$xmlDoc->asXML('../xml/news.xml');

header("Location: http://ceramogrand.by/admin/news.php");



?>
