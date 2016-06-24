<?php
/*
Plugin Name: Admin post tag filter
Description: Admin posts and pages filter by tags
Version: 1.0
Author: kiranpatil353, clarionwpdeveloper
*/

function aptf_manage_posts_by_tag(){
	global $wp_taxonomies;
	if ( is_array( $wp_taxonomies ) )
	{
		$no_category_and_links = array('');
		foreach( $wp_taxonomies as $tax )
		{
			
				if($tax->label=='Tags'){ 
				$the_terms = get_terms($tax->name,'orderby=name&hide_empty=0' );
				$content  = '<select name="'.$tax->name.'" id="'.$tax->name.'" class="postsfilter">';
				$content .= '<option value=""> All '.$tax->label.'</option>';
				
				foreach ($the_terms as $term){
					$selected_tag = '';
					
					$content .= '<option  value="' . $term->slug . '">'. $term->slug . '</option>';
				}
				$content .= '</select>';
				$content = str_replace('post_tag', 'tag', $content); 
				echo($content);
			}
		}
	}
}

add_action('restrict_manage_posts', 'aptf_manage_posts_by_tag');
