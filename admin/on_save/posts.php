<?php
if ( ! defined( 'ABSPATH' ) ) exit;


add_action( 'acf/save_post', 'motivar_functions_save_acf', 20 );
function motivar_functions_acf( $post_id ) {
 if ((!wp_is_post_revision($post_id) && 'auto-draft' != get_post_status($post_id) && 'trash' != get_post_status($post_id)))
	 {
	 	$post_typee=get_post_type($post_id);
	 	$changes=$types=array();
	 	/*for changes in slug motivar_functions_slugify */
	 	switch ($post_typee) {
	 		default:
	 			break;
	 	}
	 	/*update post only if the following exist*/
	 	if (!empty($changes) && !empty($types) && count($changes)==count($types))
	 	{
	 		motivar_functions_update_post($post_id,$changes,$types);
	 	}

	 }
}




/*
add_action('save_post', 'custom_posts_gnnpls',10,3);

function custom_posts_gnnpls($post_id,$post,$out)
{
 if ((!wp_is_post_revision($post_id) && 'auto-draft' != get_post_status($post_id) && 'trash' != get_post_status($post_id)))
	 {
	 	$post_typee=get_post_type($post_id);
	 	if ($post_typee=='page' || $post_typee=='portfolio' || $post_typee=='post')
	 		{
	 		$title=get_the_title($post_id);
	 		update_post_meta($post_id,'be_themes_hero_section_content','<h1>'.$title.'</h1>');
			if ($post_typee=='post')
				{
				default_page_meta($post_id);
				}

	 		}
	}

}
*/

/*on delete posts*/
/*
add_action('wp_trash_post', 'delete_post_function');

function delete_post_function($post_id)
{
$typ=get_post_type($post_id) ;
if ($typ== 'partner')
 {

 }
else if ($typ=='career')
 {

 }
}
*/
/*on restore hook*/
/*
add_action('untrash_post', 'custom_posts_restore');


function custom_posts_restore($post_id)
{
remove_action( 'save_post', 'custom_posts_gnnpls' );
$typ=get_post_type($post_id);
	$title=get_the_title( $post_id);
	$post=get_post($post_id);

}
*/
/*
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );*/