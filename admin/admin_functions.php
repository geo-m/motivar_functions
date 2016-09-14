<?php
if (!defined('ABSPATH')) exit;

add_action('admin_enqueue_scripts', 'motivar_functions_admin_enqueue_styles',20);

function motivar_functions_admin_enqueue_styles()
{
    wp_enqueue_script('motivar-admin-myscript', plugin_dir_url( __FILE__ ).'myscript.js', array() , array() , false);
    wp_enqueue_style( 'motivar-admin-css', plugin_dir_url( __FILE__ )  . 'admin-style.css', true, '1.0.0' );
    if (!is_super_admin())
		{
		wp_enqueue_style( 'motivar-editor-css', plugin_dir_url( __FILE__ )  . 'editor.css', true, '1.0.0' );
		}
	}


/*change the footer text*/
function motivar_functions_footer_admin () {
  echo "Powered by <a href='https://motivar.io/' target='_blank' title='Web Services Professionals'>Motivar.io</a>, ".date('Y');
}

add_filter('admin_footer_text', 'motivar_functions_footer_admin');

function motivar_functions_footer_shh() {
    remove_filter( 'update_footer', 'core_update_footer' );
}

add_action( 'admin_menu', 'motivar_functions_footer_shh' );
add_action('admin_menu','motivar_functions_wphidenag');

function motivar_functions_wphidenag() {
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
}

require_once('on_save/posts.php') ;
require_once('meta/posts.php') ;
require_once('meta/taxonomies.php') ;
require_once('on_save/taxonomies.php') ;
require_once('on_save/media.php') ;

/*add information page*/


/*remove notifications for other users*/
add_action('init', 'motivar_functions_check_myuser');
function motivar_functions_check_myuser()
{
if (!is_super_admin())
{
remove_action('load-update-core.php','wp_update_plugins');
add_filter('pre_site_transient_update_plugins','__return_null');
add_filter('pre_option_update_core','__return_null');
add_filter('pre_site_transient_update_core','__return_null');
add_filter('pre_site_transient_update_themes','motivar_functions_core_updates');
add_action('after_setup_theme','motivar_functions_core_updates');
}
}


function motivar_functions_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
 add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
}

