<?php
/**
 * Template Name: Sorted Staff Page
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
$catid = get_post_meta(get_the_ID(), 'choose_category', true);
$read_more = (ICL_LANGUAGE_CODE=='he') ? "קרא עוד...": "More";
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
	'cat' => $catid,
	'posts_per_page' => -1,
	'orderby' => 'meta_value_num',
	'order' => 'DESC',//or ASC
	'meta_query' => array(
		array(
			'key' => 'members_order_number',
			'type' => 'NUMERIC'
		),
	),
);
// The Query
$query = new WP_Query( $args );
global $post;
// var_dump($query); 
      // The Loop
      if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
              $query->the_post();
		//echo "<p>menu_order: $post->menu_order</p>";
		$meta_value = get_post_meta( get_the_ID(), 'members_order_number', true );
		//echo "<p>members_order_number: $meta_value</p>";
		//echo "<br>Sort: get_post_meta(get_the_ID(), 'members_order_number', true);
		$_permalink = get_the_permalink();
		 ?>
				<div class="each-post a4">
					<div class="col-xs-2"><a class="pull-left" href="<?php echo $_permalink; ?>">
						<?php $img_attr = array('class'	=> "img-responsive");  echo get_the_post_thumbnail(get_the_ID(), 'thumb', $img_attr); ?></a>
					</div>
					<div class="col-xs-7">
						<a  class="post-title" href="<?php echo $_permalink; ?>"><?php the_title(); ?></a><br />
						<?php the_excerpt(); ?><a href="<?php echo $_permalink; ?>"><?php echo $read_more?></a>
					</div>
			        <div class="clearfix"></div>
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
