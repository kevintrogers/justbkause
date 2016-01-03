<?php

class SH_Functions {
	
	function __construct()
	{
		
	}
	
	
	/**
	 * Update the post views on visiting the post detail page.
	*/
	function post_views( $update = false )
	{
		global $post;
		
		if( !isset( $post->ID ) ) return;
		
		$key = '_sh_'.$post->post_type.'_views';
		
		$views = get_post_meta( $post->ID, $key, true );
		
		if( $update ) {
			$new_views = ( $views ) ? ((int)$views + 1) : 1;
			
			update_post_meta( $post->ID, $key, $new_views );
		} 
		else $new_views = (int)$views;
		
		return $this->format_num( $new_views );
	}
	
	function format_num( $number )
	{
		return number_format( (int) $number, 0 );
	}
}
