<?php
/**
 * Open Source Social Network
 *
 * @package   (softlab24.com).ossn
 * @author    OSSN Core Team <info@softlab24.com>
 * @copyright (C) SOFTLAB24 LIMITED
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */

//unused pagebar skeleton when ads are disabled #628
if(ossn_is_hook('newsfeed', "sidebar:right")) {
	$newsfeed_right = ossn_call_hook('newsfeed', "sidebar:right", NULL, array());
	$sidebar = implode('', $newsfeed_right);
	$isempty = trim($sidebar);
}
?>
<div class="container">
	<div class="row">
       	<?php echo ossn_plugin_view('theme/page/elements/system_messages'); ?>
		<div class="ossn-layout-newsfeed">
			<div class="col-md-7">
				<div class="newsfeed-middle">
					<?php echo $params['content']; ?>
				</div>
			</div>
			<div class="col-md-4">
            	<?php if(!empty($isempty)){ ?>
				<div class="newsfeed-right">
					<?php
						// echo $sidebar;
						?>
            <script src='https://redditjs.com/subreddit.js' data-subreddit='HowToHockey'></script>
						<a href="/chat" style="display: block; padding: 15px 10px 10px 40px;">
							<img src="/themes/QuarantineCamp/images/discord.png" style="width: 100%; height: auto;" />
						</a>
				</div>
                <?php } ?>
			</div>
		</div>
	</div>
	<?php echo ossn_plugin_view('theme/page/elements/footer');?>
</div>
