<?php
/**
 *    OpenSource-SocialNetwork
 *
 * @package   (softlab24.com).ossn
 * @author    OSSN Core Team <info@opensource-socialnetwork.com>
 * @copyright (C) SOFTLAB24 LIMITED
 * @license   General Public Licence http://opensource-socialnetwork.com/licence
 * @link      http://www.opensource-socialnetwork.com/licence
 */
  ossn_load_external_js('places.min');
  ossn_load_external_js('jquery.tokeninput');
?>
<div class="tabs-input">
    <div class="wall-tabs">
        <?php
			echo ossn_view_menu('wall/container/group', 'wall/menus/container');
		?>
    </div>
</div>
<div class="ossn-wall-container-data ossn-wall-container-data-post" data-type="post">
    <textarea placeholder="<?php echo ossn_print('wall:post:container'); ?>" name="post"></textarea>
    <div id="ossn-wall-location" style="display:none;">
        <input type="text" placeholder="<?php echo ossn_print('enter:location'); ?>" name="location" id="ossn-wall-location-input" />
    </div>
    <div id="ossn-wall-photo" style="display:none;">
        <input type="file" name="ossn_photo" />
    </div>
    <div id="ossn-wall-video" style="display:none;">
        <a href="https://www.youtube.com/upload" target="_blank">
          <i class="fa fa-youtube"></i>
        </a>
        <a href="https://vimeo.com/upload" target="_blank">
          <i class="fa fa-vimeo"></i>
        </a>
    </div>
    <div class="controls">
        <?php
			echo ossn_view_menu('wall/container/controls/group', 'wall/menus/container_controls');
		?>
        <div style="float:right;">
            <div class="ossn-loading ossn-hidden"></div>
            <input class="btn btn-primary ossn-wall-post" type="submit" value="<?php echo ossn_print('post'); ?>" />
        </div>
    </div>
	 <input type="hidden" value="<?php echo $params['group']['group']->guid; ?>" name="wallowner"/>
</div>
