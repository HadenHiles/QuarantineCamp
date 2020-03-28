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
if (!isset($params['user']->guid)) {
    $params['user'] = new stdClass;
    $params['user']->guid = '';
}
 ossn_load_external_js('maps.google');
 ossn_load_external_js('jquery.tokeninput');
?>
<div class="tabs-input">
    <div class="wall-tabs">
        <div class="item">
            <div class="ossn-wall-status"></div>
            <div class="text"><?php echo ossn_print('post'); ?></div>
        </div>
    </div>
    <textarea placeholder="<?php echo ossn_print('wall:post:container'); ?>" name="post"></textarea>

    <div id="ossn-wall-friend" style="display:none;">
        <input type="text" placeholder="<?php echo ossn_print('tag:friends'); ?>" name="friends"
               id="ossn-wall-friend-input"/>
    </div>
    <div id="ossn-wall-location" style="display:none;">
        <input type="text" placeholder="<?php echo ossn_print('enter:location'); ?>" name="location"
               id="ossn-wall-location-input"/>
    </div>
    <div id="ossn-wall-photo" style="display:none;">
        <input type="file" name="ossn_photo"/>
    </div>
    <div id="ossn-wall-video" style="display:none;">
        <a href="https://www.youtube.com/upload" target="_blank">
          <i class="fa fa-youtube"></i>
        </a>
        <a href="https://vimeo.com/upload" target="_blank">
          <i class="fa fa-vimeo"></i>
        </a>
    </div>
</div>
<div class="controls">
    <li class="ossn-wall-friend">
       <i class="fa fa-users"></i>
    </li>
    <li class="ossn-wall-location">
       <i class="fa fa-map-marker"></i>
    </li>
    <li class="ossn-wall-photo">
       <i class="fa fa-picture-o"></i>
    </li>
    <li class="ossn-wall-video">
      <i class="fa fa-film"></i>
    </li>
	<div style="float:right;">
    	<div class="ossn-loading ossn-hidden"></div>
   		 <input class="btn btn-primary ossn-wall-post" type="submit" value="<?php echo ossn_print('post'); ?>"/>
	</div>
    <li class="ossn-wall-privacy">
 		<span><i class="ossn-wall-privacy-lock fa fa-lock"></i><span class="hidden-xs"><?php echo ossn_print('privacy'); ?></span></span>
	</li>
</div>
<input type="hidden" value="<?php echo $params['user']->guid; ?>" name="wallowner"/>
<input type="hidden" name="privacy" id="ossn-wall-privacy" value="<?php echo OSSN_PUBLIC; ?>"/>
