<?php
/*
* Wishdd GDrive Embed
* Author  - A wordpress plugin to Embed Google Drive Documents.
* Website -  http://wishdd.com/
* Contact - waqas@wishdd.com
* License: GPLv2
*/

function wishdd_gdoc_embed($atts, $content = null)
{ 
	$atts = shortcode_atts(['id' => '0B7Ls2KNfpdLdVG1uSk9hVXJ2eTQ', 'btn_txt' => 'Download'], $atts);
	$doc_id  = esc_html__($atts['id']);
	$btn_txt = esc_html__($atts['btn_txt']);
	$btn_txt = ($btn_txt == "") ? "Downlod" :  esc_html__($atts['btn_txt']);
	
	$width = 640;
	$height = ($width/8 ) * 6; 
	
	if (filter_var($doc_id, FILTER_VALIDATE_URL))
	{
		$parsed = parse_url($doc_id);
		$query = $parsed['query'];
		$doc_id = substr($query, 3, strlen($query) );
	}

	$output = '
	<iframe src="https://drive.google.com/file/d/'.$doc_id.'/preview" width="'.$width.'" height="'.$height.'"></iframe>

&nbsp;
<p style="text-align: center; margin: 20px 0px 30px 0px;"><a class="btn btn-default btn-lg" href="https://drive.google.com/uc?export=download&id='.$doc_id.'">'.$btn_txt.'</a></p>';
	return $output;
}

add_shortcode('wishdd_gdoc' , 'wishdd_gdoc_embed');