<?php
/**
 * Template Name: We in the Media-Hebrew
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="col-xs-12">
<header class="entry-header">
<h1 class="entry-title">אנחנו בתקשורת</h1>
</header>
<ul class="we-in-the-media">
<?php 

// WP_Query arguments
    $args = array (
        'post_type'              => 'weinthemedia',
        'posts_per_page'         => -1,
        'order'                  => 'DESC',
	'orderby'                => 'date',
    );
    // The Query
    $query = new WP_Query( $args );
    // The Loop
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $_the_date = get_the_date( 'Y F j' );
			
			$attached_file_url = get_field('weinthemedia_attached_file');
			if($attached_file_url=='') {
				$attached_file_url = get_field('weinthemedia_external_url');
			}

?>
	<li>
          <div class="col-xs-2 the-date"><?php echo hebrewDate($_the_date); ?></div>
          <div class="col-xs-10"><a href="<?php echo $attached_file_url; ?>" target="_blank">
<img src="<?php echo get_template_directory_uri(); ?>/images/we-in-the-media-icon.png" alt="" /><?php the_title();?> <img src="<?php echo get_template_directory_uri(); ?>/images/hebrew-in-the-media-left-arrow-icon.png" alt="" />
</a></div>
     </li>

<?php 
   }
    wp_reset_postdata();
}
?>

</ul>
</div>
<?php get_footer(); ?>
