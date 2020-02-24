<?php 
$htmlCatalogsPatternLink_ru = "<div class=\"element\">
        <div class=\"name\">
            <p><NAME></p>
        </div>
        <div class=\"img\">
            <img src=\"<IMGL>\">
        </div>
        <div class=\"text\">
            <p><DESCRIPTION></p>
            <a target='_blank' href=\"<HREF>\">перейти к каталогу</a>
        </div>
    </div>";
$htmlCatalogsPatternLink_en = "<div class=\"element\">
        <div class=\"name\">
            <p><NAME></p>
        </div>
        <div class=\"img\">
            <img src=\"<IMGL>\">
        </div>
        <div class=\"text\">
            <p><DESCRIPTION></p>
            <a target='_blank' href=\"<HREF>\">go to catalog</a>
        </div>
    </div>";

global $language;
$xmlDoc = simplexml_load_file("xml/catalogs.xml");
$items = $xmlDoc->xpath('//catalogs');
$catalogs = array();
foreach ($items[0]->children() as $catalog) {
	foreach ($catalog->names->children() as $name) {
		if (strcasecmp($name["lang"], $language)==0){
            switch ($language) {
                case 'ru':
                    $element = str_replace("<NAME>", $name, $htmlCatalogsPatternLink_ru);
                    break;
                
                default:
                    $element = str_replace("<NAME>", $name, $htmlCatalogsPatternLink_en);
                    break;
            }
			
		}
	}
	foreach ($catalog->descriptions->children() as $description) {
		if (strcasecmp($description["lang"], $language)==0){
			$element = str_replace("<DESCRIPTION>", $description, $element);
		}
	}
	// $element = str_replace("<HREF>", get_site_url(false)."index.php?id=read-catalog-tested&lang=".$language."&catalog=".$catalog["id"], $element);
    $element = str_replace("<HREF>", $catalog->url, $element);
	$element = str_replace("<IMGL>", $catalog->img, $element);

	array_push($catalogs, $element);
}
?>

<div id="catalog">
    
    <?php
    	foreach ($catalogs as $catalog) {
    		echo $catalog;
    	}
    ?>
</div>