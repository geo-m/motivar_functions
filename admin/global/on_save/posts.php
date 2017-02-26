<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('save_post', 'motivar_global_save',10,3);


function motivar_global_save( $post_id ) {
 if ((!wp_is_post_revision($post_id) && 'auto-draft' != get_post_status($post_id) && 'trash' != get_post_status($post_id)))
 {
	 	$post_typee=get_post_type($post_id);
	 	$tttile = isset($_POST['post_title']) ? $_POST['post_title'] : '';
	 	$flag = 1;
	 	$changes=$types=array();

        $post_types_to_slugify = get_option('motivar_functions_post_slugify');
        $post_types_to_slugify = explode(',', $post_types_to_slugify);
        if (in_array($post_typee, $post_types_to_slugify)){
            $changes['post_name'] = sanitize_title(motivar_functions_slugify(motivar_functions_greeklish($tttile)));
            $changes['post_title'] = ucfirst($tttile);
            $types = array(
                '%s',
                '%s'
            );
        }
        	 	/*update post only if the following exist*/
	 	if (!empty($changes) && !empty($types) && count($changes)==count($types))
	 	{
	 		motivar_functions_update_post($post_id,$changes,$types, $flag);

	 	}
 }

}