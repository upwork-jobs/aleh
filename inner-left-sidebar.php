<?php
/**
 * inner left sidebar
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
  
  //category "About Aleh" page
  $cat_about_aleh = array(11, 12, 14);
  //category "The Aleh Family" page
  $cat_aleh_family = array(16, 17, 18);
  //category "How You Can Help" page
  $cat_how_you_can_help = array(13, 15);
?>
    
		<style type="text/css">
			/* remove contact us link */
			#menu-top-nav > .menu-item:nth-child(7) {
				display: none;
			}
		</style>
<?php 

if(ICL_LANGUAGE_CODE=='en'):
	//left side bar is same as top nav
	wp_nav_menu( array('menu' => 'top-nav' )); 
	function showhideLeftNav($nthchild){		 
		?>
		<style type="text/css">
		
			.inner-page-content-left .menu > li{
				display: none;
			}
			.inner-page-content-left .menu > li:nth-child(<?php echo $nthchild;?>){
				display: block;
			}
			#menu-top-nav > .menu-item:nth-child(<?php echo $nthchild;?>) > ul {
				display: none;
			}
		</style>
		<?php
	}
	if( $parent_slug=='mission' ):
		//wp_nav_menu( array('menu' => 'Top: About Aleh' ));
		showhideLeftNav(2);
	elseif( $parent_slug=='aleh-facilities' ):
		//wp_nav_menu( array('menu' => 'Top: Branches' )); 
		showhideLeftNav(3);
	elseif( $parent_slug=='the-aleh-family' ):
		//wp_nav_menu( array('menu' => 'Top: The Aleh Family' )); 
		showhideLeftNav(4);
	elseif( $parent_slug=='donation-information' ||  in_array($cat, $cat_how_you_can_help) ):
		//wp_nav_menu( array('menu' => 'Top: How You Can Help' )); 
		showhideLeftNav(6);
	elseif( $parent_slug=='international-offices' ):
		//wp_nav_menu( array('menu' => 'Top: Contact Us' )); 
		showhideLeftNav(6);
	elseif( in_array($cat, $cat_about_aleh) ):
		//wp_nav_menu( array('menu' => 'Top: About Aleh' )); 
		showhideLeftNav(2);
	elseif( in_array($cat, $cat_aleh_family) ):
		//wp_nav_menu( array('menu' => 'Top: The Aleh Family' ));
		showhideLeftNav(5); 
	else:
		showhideLeftNav(2); 
	endif;
	
elseif(ICL_LANGUAGE_CODE=='he'):
	//
	if( is_page() || is_single() ) { 
		$widgetid = get_field( "choose_left_sidebar_donate_widget" ); 
		if( $widgetid=='1' ):
			dynamic_sidebar( 'left-sidebar-for-donation-1' );
		elseif( $widgetid=='2' ):
			dynamic_sidebar( 'left-sidebar-for-donation-2' );
		elseif( $widgetid=='3' ):
			dynamic_sidebar( 'left-sidebar-for-donation-3' );
		elseif( $widgetid=='4' ):
			dynamic_sidebar( 'left-sidebar-for-donation-4' );
		elseif( $widgetid=='5' ):
			dynamic_sidebar( 'left-sidebar-for-donation-5' );
		elseif( $widgetid=='6' ):
			dynamic_sidebar( 'left-sidebar-for-donation-6' );
		endif;
	}
endif;

?>