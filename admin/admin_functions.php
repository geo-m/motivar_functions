<?php
if (!defined('ABSPATH')) exit;

add_action('admin_enqueue_scripts', 'admin_theme_enqueue_styles',20);

function admin_theme_enqueue_styles()
{
    wp_enqueue_script('myscript', plugin_dir_url( __FILE__ ).'myscript.js', array() , array() , false);
    wp_enqueue_style( 'admin_css', plugin_dir_url( __FILE__ )  . 'admin-style.css', true, '1.0.0' );
    if (!is_super_admin())
		{
		wp_enqueue_style( 'editor_css', plugin_dir_url( __FILE__ )  . 'editor.css', true, '1.0.0' );
		}
	}


/*change the footer text*/
function remove_footer_admin () {
  echo "Powered by <a href='https://motivar.io/' target='_blank' title='Web Services Professionals'>Motivar.io</a>, ".date('Y');
}

add_filter('admin_footer_text', 'remove_footer_admin');

function my_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' );
}

add_action( 'admin_menu', 'my_footer_shh' );
add_action('admin_menu','wphidenag');

function wphidenag() {
if (!is_super_admin())
	{
	remove_action( 'admin_notices', 'update_nag', 3 );
	}
else
	{
	require_once( 'super_user.php') ;
	require_once( 'custom_db/register_tables.php') ;
	require_once('user/registration.php') ;
}

if (get_option('motivar_functions_post_functions'))
	{
	require_once('on_save/posts.php') ;
	require_once('meta/posts.php') ;

	require_once('meta/taxonomies.php') ;
	require_once('on_save/taxonomies.php') ;
require_once('on_save/media.php') ;

/*add information page*/


/*remove notifications for other users*/
add_action('init', 'check_myuser');
function check_myuser()
{
if (!is_super_admin())
{
remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');
add_filter('pre_option_update_core','__return_null');
add_filter('pre_site_transient_update_core','__return_null');
add_filter('pre_site_transient_update_themes','remove_core_updates');
add_action('after_setup_theme','remove_core_updates');
}
}
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
 add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
}
