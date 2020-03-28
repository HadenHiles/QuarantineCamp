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

define('__DISCORD_TITAN_CHAT__', ossn_route()->com . 'DiscordTitanChat/');

/**
 * Initialize Ossn Invite component
 *
 * @note Please don't call this function directly in your code.
 *
 * @return void
 * @access private
 */
function discord_titan_chat_init() {
	ossn_extend_view('css/ossn.default', 'css/chat');
	ossn_extend_view('js/opensource.socialnetwork', 'js/chat');
	ossn_register_page('chat', 'ossn_chat_pagehandler');

    if (ossn_isLoggedin()) {
    	$icon = ossn_site_url('components/OssnProfile/images/friends.png');
    	ossn_register_sections_menu('chat', array(
			'name' => 'chat',
        	'text' => ossn_print('com:ossn:chat'),
        	'url' => ossn_site_url('chat'),
        	'parent' => 'links',
        	'icon' => $icon
    	));
    }
}
/**
 * Invite page handler
 *
 * @note Please don't call this function directly in your code.
 *
 * @return mixed
 * @access private
 */
function ossn_chat_pagehandler(){
   if (!ossn_isLoggedin()) {
            ossn_error_page();
   }
   $title = ossn_print('com:ossn:chat');
   $contents['content'] = ossn_plugin_view('chat/pages/chat');
   $content = ossn_set_page_layout('fullwidth', $contents);
   echo ossn_view_page($title, $content);
}
//initilize ossn wall
ossn_register_callback('ossn', 'init', 'discord_titan_chat_init');
