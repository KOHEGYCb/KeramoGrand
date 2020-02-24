<?php
/**
 * Sidebar Plugins Template
 *
 * @package GetSimple
 */
?>
<ul class="snav">
	<li id="sb_plugins" ><a href="news.php" <?php check_menu('news');  ?> accesskey="<?php echo find_accesskey(i18n_r('NEWS_NAV'));?>" ><?php i18n('NEWS_NAV'); ?></a></li>
	<li id="sb_extend" ><a href="usages.php" <?php check_menu('usages');  ?> accesskey="<?php echo find_accesskey(i18n_r('USAGE_NAV'));?>" ><?php i18n('USAGE_NAV'); ?></a></li>
</ul>