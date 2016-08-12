<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/*
add_shortcode('show_taxs','show_taxonomy');

function show_taxonomy( $atts ) {

    extract(shortcode_atts(array(
        'tax' => '',
        'class' => '',
        'number' => '',
        'h_header'=>'',
        'h_tags'=>'',
        'parent'=>'',
        'main_class'=>''
    ), $atts));
 $parent=(isset($atts['parent']) && !empty($atts['parent'])) ? $atts['parent'] : 0;
 $class=(isset($atts['class']) && !empty($atts['class'])) ? $atts['class'] : '';
 $main_class=(isset($atts['main_class']) && !empty($atts['main_class'])) ? $atts['main_class'] : '';
 $final_print='';
 if ($parent!=0)
 {
$term=get_term( $parent, $atts['tax']);
$final_print.='<h2>'.$term->name.'</h2>';
$final_print.='<p class="sksd">'.$term->description.'</p>';
 }
$ts = get_terms($atts['tax'],array('hide_empty'=>false,'parent'=>$parent));

$final_print.='<div class="'.$main_class.'">';
$print=array();

foreach($ts as $t)
	{
	$print[$t->term_id]['priority']=get_term_meta($t->term_id,'motivar_functions_prior',true) ?: 0;
	$print[$t->term_id]['content']='<div class="'.$class.'"><'.$h_header.'>'.$t->name.'</'.$h_header.'>';
    if ($parent==0)
     {
       $children = get_terms($atts['tax'],array('hide_empty'=>false,'parent'=>$t->term_id,'number'=>$atts['number']));
        foreach ($children as $c)
            {
            $print[$t->term_id]['content'].='<'.$h_tags.'>'.$c->name.'</'.$h_tags.'>';
            }
    }
	$print[$t->term_id]['content'].='</div>';
	}
usort($print,function ($a, $b){return $a['priority'] -$b['priority']; });
foreach ($print as $pr)
    {
    $final_print.=$pr['content'];
    }
$final_print.='</div>';
return $final_print;
}

*/

