<?php
 
// Setup inclusions
$load['plugin'] = true;

// Include common.php
include('inc/common.php');

$pluginid 		=  isset($_GET['set']) ? $_GET['set'] : null;
$nonce    		= isset($_GET['nonce']) ? $_GET['nonce'] : null;

if ($pluginid){
	if(check_nonce($nonce, "set", "news.php")) {
	  $plugin=antixss($pluginid);	
	  change_plugin($plugin);
	  redirect('news.php');
	}
}
// Variable settings
login_cookie_check();

$xmlDoc = simplexml_load_file("../xml/news.xml");
$items = $xmlDoc->xpath('//news/new');
$html = "
<table>
	<tr>
		<td>id</td>
		<td>name</td>
		<td>description</td>
		<td>img</td>
		<td>link</td>
		<td>update</td>
		<td>delete</td>
	<tr>";

foreach ($items as $item) {
	$insert = "<tr>
				<form method='POST' action='updateNews.php'>";
	$insert = $insert."<td><input type='hidden' name='id' value='".$item['id']."'/>".$item['id']."</td>";
	// $insert = $insert."<td><input type='text' name='name' value='".$item->name."'/></td>";
	$insert = $insert."<td><textarea name='name'>".$item->name."</textarea></td>";
	$insert = $insert."<td><textarea name='text'>".$item->text."</textarea></td>";
	$insert = $insert."<td><textarea name='img'>".$item->img."</textarea></td>";
	$insert = $insert."<td><textarea name='href'>".$item->href."</textarea></td>
					<td><input type='submit' value='update' /></td>
				</form>";
	$insert = $insert."<td><form method='POST' action='removeNews.php'><input type='hidden' value='".$item['id']."' name='reomve'><input type=\"submit\" value=\"X\"/></form></td>";
	$insert = $insert."</tr>";

	$html = $html.$insert;

}
$html = $html."</table>";
 
get_template('header', cl($SITENAME).' &raquo; '.i18n_r('PLUGINS_MANAGEMENT')); 

?>
	
<?php include('template/include-nav.php'); ?>

<div class="bodycontent clearfix">
	
	<div id="maincontent">
		<div class="main" >
			<h3>add news</h3>
			
			<?php echo $html; ?>
			<form method="POST" action="addNews.php">
				<tabel>
					<tr>
						<td><input type="text" name="name" placeholder="name"></td>
						<td><input type="text" name="lang" placeholder="lang"/></td>
						<td><textarea name="text"></textarea></td>
						<td><input type="text" name="imgUrl" placeholder="img"/></td>
						<td><input type="text" name="link" placeholder="link" /></td>
						<td><input type="submit" name="addNews" value="add" /></td>
					</tr>
				</tabel>
			</form>
		</div>
	</div>
	
	<div id="sidebar" >
		<?php include('template/sidebar-news.php');?>
	</div>

</div>

<?php get_template('footer'); ?>
