<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Open Social Website Core Team <info@softlab24.com>
 * @copyright (C) SOFTLAB24 LIMITED
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
?>
<div class="ossn-page-contents">
<?php
 	echo ossn_plugin_view('widget/view', array(
		'title' => ossn_print('com:ossn:chat'),
		'contents' => '<iframe src="https://titanembeds.com/embed/693191624536358933?scrollbartheme=minimal&theme=DiscordDark&username=Rookie&userscalable=false" frameborder="0" id="discordchat" style="width: 100%; height: 1200px;"></iframe>',
	));
?>
</div>
