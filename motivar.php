<?php
/*
Plugin Name: Motivar Admin
Plugin URI: https://www.gnnpls.com
Description: Dev Options for Custom Development in every theme
Version: 1.0
Author: Giannopoulos Nikolaos
Author URI: https://www.gnnpls.com
*/
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}





//custom js_script
add_action('wp_enqueue_scripts', 'motivar_functions_theme_enqueue_styles',20);
function motivar_functions_theme_enqueue_styles()
{
	wp_enqueue_style('motivar-design', plugin_dir_url( __FILE__ ) . 'guest/mystyle.css',array(),'','all');
    wp_enqueue_script('motivar-myscript', plugin_dir_url( __FILE__ ).'guest/myscript.js', array() , array() , true);
}

//custom shortcodes

require_once('guest/custom_shortcodes.php');
//admin php file
if (is_admin())
	{
		if (get_option('motivar_functions_debug'))
		{
		ini_set('display_errors','1');
		ini_set('display_startup_errors','1');
		error_reporting (E_ALL);
		}
	}
	require_once('admin/admin_functions.php');
	/*custom post_types*/
	require_once('custom_types/post_types.php');
	require_once('custom_types/tax_types.php');
	require_once('email_functions.php');
	require_once('cron_functions.php');
require_once('custom_widgets.php');
require_once('custom_site_raw_code.php');
if (!is_admin())
	{
	add_action('wp_footer', 'add_this_script_footer');
	}

if (get_option('motivar_functions_admin_only'))
	{
	add_action( 'init', 'motivar_functions_redirect' );
	}


function motivar_functions_redirect()
{
// Current Page
    global $pagenow;

    // Check to see if user in not logged in and not on the login page
    if($pagenow != 'wp-login.php' && !is_user_logged_in())
    {
          auth_redirect();
  	}
}




function add_this_script_footer()
{
?>
<script>
<?php
if (get_option('motivar_functions_google'))
{
echo base64_decode(get_option('motivar_functions_google'));
}
if (get_option('motivar_functions_hotjar'))
{
echo base64_decode(get_option('motivar_functions_hotjar'));
}?>
</script>
<?php
}




//custom_login_css
function motivar_functions_login() {
wp_enqueue_style('login-style', plugin_dir_url( __FILE__ ) . 'login_style.css',array(),'','all');

}

add_action('login_enqueue_scripts', 'my_custom_login',20);
function motivar_functions_login_url() {
    return 'https://motivar.io';
    }
    function motivar_functions_login_title() {
    return "Web Services Corfu";
    }
add_filter('login_headerurl', 'motivar_functions_login_url');
add_filter('login_headertitle', 'motivar_functionsp_login_title');


/* Hide WP version strings from scripts and styles
 * @return {string} $src
 * @filter script_loader_src
 * @filter style_loader_src
 */

function motivar_functions_remove_wp_version_strings( $src ) {
     global $wp_version;
     parse_str(parse_url($src, PHP_URL_QUERY), $query);
     if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
          $src = remove_query_arg('ver', $src);
     }
     return $src;
}
add_filter( 'script_loader_src', 'motivar_functions_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'motivar_functions_remove_wp_version_strings' );

/* Hide WP version strings from generator meta tag */
function motivar_functions_remove_version() {
return '';
}
add_filter('the_generator', 'motivar_functions_remove_version');