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

define('__ABOUTUSER__', ossn_route()->com . 'aboutuser/');

/**
 * Initialize component
 *
 * @return void
 */
function com_aboutuser_init() {
		$component = new OssnComponents();
		// don't interfere with Custom Profile Fields component
		// because CustomFields is using its own About page
		if(!$component->isActive('CustomFields')) {
			if(ossn_isLoggedin()) {
				// display 'aboutpage? yes or no' radio buttons on user settings page
				ossn_add_hook('user', 'default:fields', 'com_aboutuser_display_about_page_selector');
				ossn_profile_subpage('about');
				ossn_register_callback('page', 'load:profile', 'com_aboutuser_profile_about_user');
				ossn_add_hook('profile', 'subpage', 'com_aboutuser_profile_about_user_page');

				// display social media link inputs
				ossn_add_hook('user', 'default:fields', 'com_aboutuser_display_social_link_inputs');

				ossn_extend_view('css/ossn.default', 'css/aboutuser');
			}
		}
}

/**
 * Regisrer a about user menu
 *
 * @return void
 */
function com_aboutuser_profile_about_user() {
		$owner = ossn_user_by_guid(ossn_get_page_owner_guid());
		$url   = ossn_site_url();
		if(($owner->{'com:aboutuser:display:data'} == 'yes') ||
		   ($owner->{'com:aboutuser:display:data'} == 'friends' && ossn_loggedin_user()->isFriend(ossn_loggedin_user()->guid, $owner->guid)) ||
		   (ossn_loggedin_user()->guid == $owner->guid) ||
		    ossn_isAdminLoggedin()) {
				ossn_register_menu_link('aboutuser', 'com:aboutuser:aboutuser', $owner->profileURL('/about'), 'user_timeline');
		}
}
/**
 * Register user about page
 *
 * @return string
 */
function com_aboutuser_profile_about_user_page($hook, $type, $return, $params) {
		$page = $params['subpage'];
		if($page == 'about') {
				if(($params['user']->{'com:aboutuser:display:data'} == 'yes') ||
				   ($params['user']->{'com:aboutuser:display:data'} == 'friends' && ossn_loggedin_user()->isFriend(ossn_loggedin_user()->guid, $params['user']->guid)) ||
				   (ossn_loggedin_user()->guid == $params['user']->guid)||
				   ossn_isAdminLoggedin()) {
						$content = ossn_plugin_view('profile/about', $params);
						echo ossn_set_page_layout('module', array(
								'title' => ossn_print('com:aboutuser:aboutuser'),
								'content' => $content
						));
				}
		}
}
/**
 * Calculate user age from his birthdate
 *
 * @param string $birthday User birthdate
 *
 * @return integer
 */
function com_aboutuser_user_age($birthday = '') {
		//you can find your area timezone format here: http://php.net/manual/en/timezones.php
		date_default_timezone_set("Europe/Berlin");
		if(empty($birthday)) {
				return false;
		}
		$birthday = str_replace('/', '-', $birthday);
		$dob      = strtotime($birthday);
		if($dob === false) {
				return false;
		}
		$age = 0;

		while(time() > $dob = strtotime('+1 year', $dob)) {
				++$age;
		}
		return $age;
}

function com_aboutuser_display_about_page_selector($hook, $type, $fields){
		$extrafield = 	array(
			'name' => 'com:aboutuser:display:data',
			'label' => ossn_print('com:aboutuser:user:settings:label'),
			'options' => array(
				'yes' => ossn_print('com:aboutuser:yes'),
				'friends' => ossn_print('com:aboutuser:friends'),
				'no' => ossn_print('com:aboutuser:no')
			)
		);
		$fields['required']['dropdown'][] = $extrafield;
		return $fields;
}

function com_aboutuser_display_social_link_inputs($hook, $type, $fields){
		$tiktok = 	array(
			'name' => 'tiktok',
			'label' => 'TikTok Username'
		);
		$fields['non_required']['text'][] = $tiktok;

		$instagram = 	array(
			'name' => 'instagram',
			'label' => 'Instagram Username'
		);
		$fields['non_required']['text'][] = $instagram;

		$facebook = 	array(
			'name' => 'facebook',
			'label' => 'Facebook URL (facebook.com/{YOUR URL})'
		);
		$fields['non_required']['text'][] = $facebook;
		return $fields;
}

ossn_register_callback('ossn', 'init', 'com_aboutuser_init');
