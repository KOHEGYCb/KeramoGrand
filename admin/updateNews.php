<?php

$id = $_POST['id'];

$name=$_POST['name'];
// $lang=$_POST['lang'];
$text=$_POST['text'];
$imgUrl=$_POST['img'];
$link=$_POST['href'];
// echo "$name\n";
// echo "$id\n";
// echo "$text\n";
// echo "$imgUrl\n";
// echo "$link";


$xmlDoc = simplexml_load_file("../xml/news.xml");
$items = $xmlDoc->xpath('//news');
// $items[0]->addChild('new')->addAttribute('id', $id);


$base = '<?xml version="1.0" encoding="UTF-8"?><news></news>';
$newXmlDoc = new SimpleXMLElement($base);
echo count($items[0]->children());
foreach ($items[0]->children() as $item) {
    echo $item['lang']."\n";
    if ($item['id'] != $id){
        $newXmlDoc->addChild('new')->addAttribute('id', $item['id']);
        $new = $newXmlDoc->xpath('//news/new[@id="'.$item['id'].'"]');

    	$new[0]->addAttribute('lang', $item['lang']);
        $new[0]->addChild('name', $item->name);
        $new[0]->addChild('text', $item->text);
        $new[0]->addChild('img', $item->img);
        $new[0]->addChild('href', $item->href);
    }else{
        $newXmlDoc->addChild('new')->addAttribute('id', $item['id']);
        $new = $newXmlDoc->xpath('//news/new[@id="'.$item['id'].'"]');

        $new[0]->addAttribute('lang', $item['lang']);
        $new[0]->addChild('name', $name);
        $new[0]->addChild('text', $text);
        $new[0]->addChild('img', $imgUrl);
        $new[0]->addChild('href', $link);
    }
}   

// $newXmlDoc->addChild('name', 'adsads');
$newXmlDoc->asXML('../xml/news.xml');

header("Location: http://ceramogrand.by/admin/news.php");
