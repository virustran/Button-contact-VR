<?php
/**
 * Plugin Name: Button contact VR
 * Plugin URI: virustran.vr
 * Description: Button contact call, zalo, chat...
 * Version: 3.0
 * Author: VirusTran
 * Author URI: virustran
 * License: GPLv2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'PZF_FILE', __FILE__ );
define( 'PZF_NAME', basename( PZF_FILE ) );
define( 'PZF_BASE_NAME', plugin_basename( PZF_FILE ) );
define( 'PZF_PATH', plugin_dir_path( PZF_FILE ) );
define( 'PZF_URL', plugin_dir_url( PZF_FILE ) );

function register_mysettings() {
    register_setting( 'pzf-settings-group', 'pzf_phone' );
    register_setting( 'pzf-settings-group', 'pzf_color_phone' );
    register_setting( 'pzf-settings-group', 'pzf_phone_bar' );

    register_setting( 'pzf-settings-group', 'pzf_zalo' );
    register_setting( 'pzf-settings-group', 'pzf_viber' );        
    register_setting( 'pzf-settings-group', 'pzf_contact_link' );
    register_setting( 'pzf-settings-group', 'pzf_color_contact' );

    register_setting( 'pzf-settings-group', 'pzf_id_fanpage' );
    register_setting( 'pzf-settings-group', 'pzf_color_fb' );
    register_setting( 'pzf-settings-group', 'logged_in_greeting' );
// page setting  sine: 2.0
    register_setting( 'pzf-settings-group-setting', 'setting_size' );
    register_setting( 'pzf-settings-group-setting', 'pzf_location' );
    register_setting( 'pzf-settings-group-setting', 'pzf_location_bottom' );
    register_setting( 'pzf-settings-group-setting', 'pzf_hide_mobile' );
    register_setting( 'pzf-settings-group-setting', 'pzf_hide_desktop' );
// page setting  sine: 3.0
    register_setting( 'pzf_settings_all_in_one', 'pzf_enable_all_in_one' );
    register_setting( 'pzf_settings_all_in_one', 'pzf_note_all_in_one' );
    register_setting( 'pzf_settings_all_in_one', 'pzf_note_bar_all_in_one' );
    register_setting( 'pzf_settings_all_in_one', 'pzf_color_all_in_one' );
    register_setting( 'pzf_settings_all_in_one', 'pzf_icon_all_in_one' );
    register_setting( 'pzf_settings_all_in_one', 'pzf_hide_default_all_in_one' );
}

require_once PZF_PATH . '/inc/button-contact.php';

// add menu admin wp
function pzf_create_menu() {
    add_menu_page('Button contact VR', 'Button contact', 'administrator', 'contact_vr', 'pzf_settings_page',plugins_url('/img/icon.png', __FILE__), 100);
    add_action( 'admin_init', 'register_mysettings' );

    // add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
    add_submenu_page( 'contact_vr', 'Setting', 'Setting', 'administrator', 'contact_vr_setting', 'pzf_settings_page_setting', 10 );
    add_submenu_page( 'contact_vr', 'All in one', 'All in one', 'administrator', 'contact_vr_all_in_one', 'pzf_settings_all_in_one', 20 );

}
add_action('admin_menu', 'pzf_create_menu'); 
// add backend
function pzf_settings_page() {
    include PZF_PATH. '/inc/admin.php';
}
function pzf_settings_page_setting() {
    include PZF_PATH. '/inc/setting.php';
}
function pzf_settings_all_in_one() {
    include PZF_PATH. '/inc/all-in-one.php';
}

PZF::instance();