<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action('create_term','motivar_functions_update');
add_action('edit_term', 'motivar_functions_update');
add_action('delete_term', 'motivar_functions_update');

function motivar_functions_update($term_id)
{
if (isset($_POST['taxonomy']))
	{
		$name = isset($_POST['name']) ? $_POST['name'] : '';
        $changes=$types=array();
        $flag = 2;


	    $taxonomies_to_slugify = get_option('motivar_functions_tax_slugify') ?: '';
        $taxonomies_to_slugify = explode(',', $taxonomies_to_slugify);
        if (in_array($_POST['taxonomy'], $taxonomies_to_slugify)){
            $changes['slug'] = sanitize_title(motivar_functions_slugify(motivar_functions_greeklish($name)));
            $types = array(
                    '%s'
                    );
        }
                /*update post only if the following exist*/
        if (!empty($changes) && !empty($types) && count($changes)==count($types))
        {
            motivar_functions_update_post($term_id,$changes,$types, $flag);
        }



	}
}
function custom_functions_delete($term_id)
{

}


