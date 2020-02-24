<?php

$elementPattern = "
        <a class='<USAGE>' data-fancybox='gallery' href='".get_site_url(false)."data/uploads/usage/<FIELD>/<IMG_URL>' data-caption='<DESCRIPTION>'>
            <img src='".get_site_url(false)."data/uploads/usage/<FIELD>/small/<IMG_URL>'>
        </a>
        ";

$collectionName = get_page_slug(false);

$xmlDoc = simplexml_load_file("xml/usage.xml");
$usages = $xmlDoc->xpath('//usage')[0];
$list = "";
foreach ($usages->children() as $usage) {

	foreach ($usage->children() as $item) {
		foreach ($item->collections->children() as $collection) {
			if (strcasecmp($collectionName, $collection)==0){
				$html = str_replace("<DESCRIPTION>", $item->description, $elementPattern);
				$html = str_replace("<IMG_URL>", $item->imageUrl, $html);
				$html = str_replace("<FIELD>", $usage->getName(), $html);
				$list = $list.$html;  
			}
		}		
	}
}

if ($list != ""){
	echo "<section>
	<h1>Готовые работы с использованием данной коллекции:</h1>
	<span class='separatore'></span>
	<p class='gallery_list'>
	    ".$list."
	</p>

	</section>";
}

?>