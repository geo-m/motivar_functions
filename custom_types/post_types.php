<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*
function get_my_custom_posts()
{
return array(array('post'=>'hotspots','sn'=>'Hotspot','pl'=>'Hotspots','args'=>array( 'title','editor'),'chk'=>true,'mnp'=>3,'icn'=>'','slug'=>get_option('hotspots_slug') ?: 'hotspots','en_slg'=>1),);
}

add_action( 'init', 'sbp_register_my_cpts' );

function sbp_register_my_cpts() {
$names=get_my_custom_posts();
foreach ($names as $n)
{
$labels=$args=array();
$labels = array( 'name' => $n['pl'], 'singular_name' => $n['sn'], 'menu_name' => $n['pl'], 'add_new' => 'New '.$n['sn'], 'add_new_item' => 'New '.$n['sn'], 'edit' => 'Edit', 'edit_item' => 'Edit '.$n['sn'], 'new_item' => 'New '.$n['sn'], 'view' => 'View '.$n['sn'], 'view_item' => 'View '.$n['sn'], 'search_items' => 'Search '.$n['sn'], 'not_found' => 'No '.$n['pl'], 'not_found_in_trash' => 'No trushed '.$n['pl'], 'parent' => 'Parent '.$n['sn']);
$args = array('labels' => $labels, 'description' => 'My business plugin post type for'.$n['pl'], 'public' => $n['chk'], 'show_ui' => true, 'has_archive' => $n['chk'], 'show_in_menu' => true,'exclude_from_search' => $n['chk'], 'capability_type' => 'post', 'map_meta_cap' => true, 'hierarchical' => $n['chk'], 'rewrite' => array( 'slug' => $n['post'], 'with_front' => true ), 'query_var' => true, 'show_in_rest'       => true,'rest_controller_class' => 'WP_REST_Posts_Controller','supports' => $n['args']);

if  ( !empty($n['slug']))
{
$args['rewrite']['slug']=$n['slug'];
}

if  ( !empty($n['mnp']))
{
$args['menu_position']=$n['mnp'];
}

if  ( !empty($n['icn']))
{
$args['menu_icon']=$n['icn'];
}
register_post_type( $n['post'],$args);

if (isset($n['en_slg']) && $n['en_slg']==1)
{
add_action( 'load-options-permalink.php', function ($views) use ($n)
{
	if( isset( $_POST[$n['post'].'_slug'] ) )
	{
		update_option( $n['post'].'_slug', sanitize_title_with_dashes( $_POST[$n['post'].'_slug'] ) );
	}

add_settings_field( $n['post'].'_slug', __( $n['pl'].' Slug' ), function ($views) use ($n)
	{
	$value = get_option( $n['post'].'_slug' );
		echo '<input type="text" value="' . esc_attr( $value ) . '" name="'.$n['post'].'_slug'.'" id="'.$n['post'].'_slug'.'" class="regular-text" placeholder="'.$n['slug'].'"/>';

		}, 'permalink', 'optional' );
});

}


}
}
*/