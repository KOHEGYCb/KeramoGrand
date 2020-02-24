<?php

$id = $_POST['reomve'];

$xmlDoc = simplexml_load_file("../xml/news.xml");
$items = $xmlDoc->xpath('//news');
$items[0]->addChild('new')->addAttribute('id', $id);


$base = '<?xml version="1.0" encoding="UTF-8"?><news></news>';
$newXmlDoc = new SimpleXMLElement($base);
foreach ($items[0]->children() as $item) {
    if ($item['id'] != $id){
    	$newXmlDoc->addChild('new')->addAttribute('id', $item['id']);
    	$new = $newXmlDoc->xpath('//news/new[@id="'.$item['id'].'"]');
    	
    	$new[0]->addAttribute('lang', $item['lang']);
        $new[0]->addChild('name', $item->name);
        $new[0]->addChild('text', $item->text);
        $new[0]->addChild('img', $item->img);
        $new[0]->addChild('href', $item->href);
    }
}   

// $newXmlDoc->addChild('name', 'adsads');
$newXmlDoc->asXML('../xml/news.xml');

header("Location: http://ceramogrand.by/admin/news.php");
