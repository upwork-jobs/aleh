<?php
/**
 * Template Name: Endoresments Template
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
<div class="col-xs-3 inner-page-content-left">
 <?php get_template_part( 'inner-left-sidebar' ); ?>
</div>
<div class="col-xs-9 inner-page-content-inner">
<?php 

 // WP_Query arguments

    $args = array (
        'cat'                    => 52, 
        'posts_per_page'         => -1,
        'order'                  => 'DSCE',
		'orderby'                => 'date',

    );
    // The Query
    $query = new WP_Query( $args );
    // The Loop
    if ( $query->have_posts() ) {
        while ( $query->have_posts()){
            $query->the_post();
?>
<div class="each-endorsement" style="margin-top:30px;">
  <div class="col-xs-4 text-center">
   <?php the_post_thumbnail('thumbnail');?>
   <?php $endoresimage = get_field('ism_endorsements_letter');?>
   <a href="<?php echo $endoresimage; ?>" target="_blank">
   <img src="http://www.alehisraelfoundation.org/wp-content/uploads/2014/05/read_letter_e.gif" alt="Click to read the letter" width="100" height="17" border="0" /></a>
  </div>
  <div class="col-xs-8">
      <h5><strong><?php the_title(); ?></strong></h5>
      <p><small><?php echo get_the_date(); ?></small></p>
      <div id="full_text_<?php echo get_the_ID(); ?>" style="display:none;"><?php the_content(); ?><a onclick="more_less('full', 'abbrev', <?php echo get_the_ID(); ?>)" href="javascript:void(0)" style="font-weight:bold; ">Less</a></div>
      <div id="abbrev_text_<?php echo get_the_ID(); ?>"><?php the_excerpt(); ?><a onclick="more_less('abbrev', 'full', <?php echo get_the_ID(); ?>)" href="javascript:void(0)" style="font-weight:bold; ">Read More</a></div>  
  </div>
  <div class="clearfix"></div>
  <hr style="border: 1px solid #acd762;" />
</div>
<?php 
  }
    wp_reset_postdata();
}
?>
</div>
<?php get_footer(); ?>

