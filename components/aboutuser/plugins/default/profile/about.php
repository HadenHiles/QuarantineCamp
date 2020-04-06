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

?>
<table class="aboutuser">
  <tr>
    <th scope="row"><?php echo ossn_print('gender');?></th>
    <td><?php echo ossn_print($params['user']->gender);?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo ossn_print('birthdate');?></th>
    <td><?php echo $params['user']->birthdate;?></td>
  </tr>
  <tr>
    <th scope="row"><?php echo ossn_print('com:aboutuser:aboutuser:age');?></th>
    <td><?php echo com_aboutuser_user_age($params['user']->birthdate);?></td>
  </tr>
<?php if(isset($params['user']->language)) { ?>
  <tr>
    <th scope="row"><?php echo ossn_print('com:aboutuser:aboutuser:language');?></th>
    <td><?php echo ossn_print($params['user']->language);?></td>
  </tr>
<?php }
if(!empty($params['user']->tiktok)) { ?>
  <tr>
    <th scope="row"><img src="/themes/QuarantineCamp/images/icons/tik-tok-icon-black.svg" style="height: 32px;" /></th>
    <td><a href="https://tiktok.com/@<?php echo ossn_print($params['user']->tiktok);?>" target="_blank">@<?php echo ossn_print($params['user']->tiktok);?></a></td>
  </tr>
<?php }
if(!empty($params['user']->instagram)) { ?>
  <tr>
    <th scope="row"><i class="fab fa-instagram" style="color: #C13584; font-size: 32px;"></i></th>
    <td><a href="https://instagram.com/<?php echo ossn_print($params['user']->instagram);?>" target="_blank">@<?php echo ossn_print($params['user']->instagram);?></a></td>
  </tr>
<?php }
if(!empty($params['user']->facebook)) { ?>
  <tr>
    <th scope="row"><i class="fab fa-facebook" style="color: #3b5998; font-size: 32px;"></i></th>
    <td><a href="https://facebook.com/<?php echo ossn_print($params['user']->facebook);?>" target="_blank"><?php echo ossn_print($params['user']->facebook);?></a></td>
  </tr>
<?php }

$all_fields = ossn_prepare_user_fields($params['user']);

if(isset($all_fields)) {
	foreach(array_keys($all_fields) as $section_key) {
		// this one will loop twice:
		// first section includes required fields
		// second section includes non_requiered fields
		$section = $all_fields[$section_key];

		foreach(array_keys($section) as $field_key) {
			// we may get up to 4 possible field types here
			// text, textarea, dropdown and radio
			$fields = $section[$field_key];
			if($field_key == 'text') {
					foreach($fields as $item) {
							if(isset($item['display_on_about_page']) && $item['display_on_about_page'] === true && strlen($item['value'])) {
								echo "<tr>";
								if(isset($item['label']) && is_bool($item['label']) && $item['label'] === true){
									echo "<th scope='row'>".ossn_print("{$item['name']}")."</th>";
								} elseif(isset($item['label']) &&  $item['label'] !== false){
									echo "<th scope='row'>".$item['label']."</th>";
								}
								echo "<td>" . $item['value'] . "</td>";
								echo "</tr>";
							}
					}
			}
			if($field_key == 'textarea') {
					foreach($fields as $item) {
							if(isset($item['display_on_about_page']) && $item['display_on_about_page'] === true && strlen($item['value'])){
								echo "<tr>";
								if(isset($item['label']) && is_bool($item['label']) && $item['label'] === true){
									echo "<th scope='row'>".ossn_print("{$item['name']}")."</th>";
								} elseif(isset($item['label']) &&  $item['label'] !== false){
									echo "<th scope='row'>".$item['label']."</th>";
								}
								if(isset($item['class']) && $item['class'] == 'ossn-editor'){
									echo "<td>" . html_entity_decode(html_entity_decode($item['value'])) . "</td>";
								} else {
									echo "<td>" . $item['value'] . "</td>";
								}
								echo "</tr>";
							}
					}
			}
			if($field_key == 'dropdown') {
					foreach($fields as $item) {
							if(isset($item['display_on_about_page']) && $item['display_on_about_page'] === true && strlen($item['value'])){
								echo "<tr>";
								if(isset($item['label']) && is_bool($item['label']) && $item['label'] === true){
									echo "<th scope='row'>".ossn_print("{$item['name']}")."</th>";
								} elseif(isset($item['label']) &&  $item['label'] !== false){
									echo "<th scope='row'>".$item['label']."</th>";
								}
								echo "<td>" . ossn_print($item['value']) . "</td>";
								echo "</tr>";
							}
					}
			}
			if($field_key == 'radio') {
					foreach($fields as $item) {
							if(isset($item['display_on_about_page']) && $item['display_on_about_page'] === true && strlen($item['value'])){
								echo "<tr>";
								if(isset($item['label']) && is_bool($item['label']) && $item['label'] === true){
									echo "<th scope='row'>".ossn_print("{$item['name']}")."</th>";
								} elseif(isset($item['label']) &&  $item['label'] !== false){
									echo "<th scope='row'>".$item['label']."</th>";
								}
								echo "<td>" . ossn_print($item['value']) . "</td>";
								echo "</tr>";
							}
					}
			}
		}
	}
}
?>
</table>
