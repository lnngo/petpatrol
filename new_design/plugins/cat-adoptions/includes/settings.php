<?php
// Settings Menue
add_action( 'admin_menu', 'aw_pp_cat_settings_menue');

function aw_pp_cat_settings_menue() {
  add_menu_page('Petpatrol Related Settings', 'Petpatrol Settings', 'manage_options',
	__FILE__, 'aw_pp_settings_menue_page', plugins_url('wp-icon1.png',__FILE__));
}

?>

