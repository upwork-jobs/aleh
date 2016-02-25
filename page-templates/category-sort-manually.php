<?php
/**
 * Template Name: Sort Manually Template
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
        'cat'                    => $catid,
        'posts_per_page'         => -1,
	'meta_key'		=> 'members_order_number',
	'orderby'		=> 'meta_value_num',
	'order'			=> 'DESC'
  
      );
      // The Query
      $the_query = new WP_Query( $args );
			$allposts = $the_query->posts;
      // The Loop
      foreach( $allposts as $eachpost ) {
              $post = get_post($eachpost->ID);
              setup_postdata( $post );
			  			$_permalink = get_the_permalink();
              $_excerpt = get_the_excerpt();
  
  ?>
    <div class="each-post a4 bbb">
      <div class="col-xs-2"><a class="pull-left" href="<?php echo $_permalink; ?>">
        <?php $img_attr = array('class'	=> "img-responsive");  echo get_the_post_thumbnail(get_the_ID(), 'thumb', $img_attr); ?>
        </a></div>
      <div class="col-xs-7"> <a  class="post-title" href="<?php echo $_permalink; ?>">
        <?php the_title(); ?>
        </a>
        <p><?php echo $_excerpt; ?></p>
        <a href="<?php echo $_permalink; ?>"><?php echo $read_more?></a></div>
      <div class="clearfix"></div>
    </div>
    <?php 
     }
      wp_reset_postdata();
  ?>
  <script type="text/javascript">
  $('#myModal').modal()
  </script>
    <?php //get_sidebar( 'front' ); ?>
  </div>
</div>
<?php get_footer(); ?>
