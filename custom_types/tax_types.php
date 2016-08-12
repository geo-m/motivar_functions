<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*

add_action( 'init', 'my_bsn_register_my_taxes' );
function my_bsn_register_my_taxes() {
$actions=array(array('Industries','Industry','my_bsn_industry',array('my_bsn_project')),array('Occupations','Occupation','my_bsn_occupation',array('my_bsn_contact')),array('Target Areas','Target Area','my_bsn_target_area',array('my_bsn_project')),array('Countries','Country','my_bsn_country',array('my_bsn_contact')),array('Tasks','Task','my_bsn_task',array('my_bsn_service','my_bsn_contact')),array('Insurances','Insurance','my_bsn_insurance',array('my_bsn_contact')),array('Contact Types','Contact Type','my_bsn_contact_type',array('my_bsn_contact')),array('Languages','Language','my_bsn_language',array('my_bsn_contact')),array('Packages','Package','my_bsn_package',array('my_bsn_proposal')),array('Order Status','Order Status','my_bsn_project_state',array('my_bsn_order')),array('Proposal States','Proposal State','my_bsn_proposal_state',array('my_bsn_proposal')),array('Email Updates','Email Update','my_bsn_email_update',array('my_bsn_proposal','my_bsn_order')));

foreach ($actions as $i)
{
$labels=$args=array();
$labels = array( 'name' => $i[0], 'label' => $i[0], 'all_items' => 'All '.$i[0], 'edit_item' => 'Edit '.$i[1], 'update_item' => 'Update '.$i[1], 'add_new_item' => 'New '.$i[1], 'new_item_name' => 'New '.$i[1], 'parent_item' => $i[1].' Parent', 'parent_item_colon' => $i[1].'Parent:)', 'search_items' => 'Search '.$i[0], 'popular_items' => 'Popular '.$i[0], 'separate_items_with_commas' => 'Split '.$i[0].' with comma', 'add_or_remove_items' => 'Insert / Delete '.$i[1], 'choose_from_most_used' => 'Select '.$i[0]);
$args = array( 'labels' => $labels, 'hierarchical' => true, 'label' => $i[2], 'show_ui' => true, 'query_var' => true, 'rewrite' => array( 'slug' => $i[2] ), 'show_admin_column' => false);
register_taxonomy( $i[2], $i[3], $args );
}

}


}
*/