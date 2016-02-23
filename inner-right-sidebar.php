<?php
/**
 * inner right sidebar
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>



<?php 
  
  if( is_page() ) { 
	  global $post;
		  /* Get an array of Ancestors and Parents if they exist */
	  $parents = get_post_ancestors( $post->ID );
		  /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
	  $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
	  /* Get the parent and set the $class with the page slug (post_name) */
	  $parent = get_page( $id );
	  $parent_slug = $parent->post_name;
  }
?>
    
<?php 
if( $parent_slug=='mission' ):
	dynamic_sidebar( 'right-sidebar-for-about-aleh' );
elseif( $parent_slug=='aleh-facilities' ):
	dynamic_sidebar( 'right-sitebar-for-branches' );
elseif( $parent_slug=='donation-information' ):
	dynamic_sidebar( 'right-sitebar-for-how-you-can-help' );
elseif( $parent_slug=='the-aleh-family' ):
	dynamic_sidebar( 'right-sitebar-for-the-aleh-family' );
elseif( $parent_slug=='international-offices' ):
	dynamic_sidebar( 'right-sitebar-for-contact-us' );
endif;
?>