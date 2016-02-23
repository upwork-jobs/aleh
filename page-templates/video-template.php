<?php
/**
 * Template Name: Video Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header();
$catid = 48;
?>
      <div class="col-xs-3 inner-page-content-left">
 		<?php get_template_part( 'inner-left-sidebar' ); ?>
     </div>
	 <div class="col-xs-9 inner-page-content-inner">
        <div class="dedication-area">
    <h1 class="entry-title"><?php echo get_the_category_by_id($catid);?></h1>
    <p><?php echo category_description($catid);?></p>
    <?php 
   // WP_Query arguments
  
      $args = array (
          'cat'                    => $catid,
          'posts_per_page'         => -1,
          'order'                  => 'DSCE',
          'orderby'                => 'date',
		  'meta_key'		=> 'members_order_number',
		  'orderby'		=> 'meta_value_num',
		  'order'			=> 'DESC'
  
      );
      // The Query
      $query = new WP_Query( $args );
      // The Loop
      if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
              $query->the_post();
  
  ?>
    <div class="dadication-content">
      <div class="row">
        <div class="col-xs-3 dadication-left">
          <?php the_post_thumbnail(array(150,120)); ?>
        </div>
        <div class="col-xs-9 dadication-middle">
          <h3>  
          	<img src="<?php echo get_template_directory_uri(); ?>/images/video-icon.png" alt="" />    
            <?php the_title(); ?>
          </h3>
          <?php the_content();?>
          <?php //the_excerpt(); ?>
        </div> 
      </div>
    </div>
    <?php 
     }
      wp_reset_postdata();
  }
  ?>
    <script type="text/javascript">
  $('#myModal').modal()
  </script>
    <?php //get_sidebar( 'front' ); ?>
  </div>
        </div>
    
<?php get_footer(); ?>
