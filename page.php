<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="col-xs-3 inner-page-content-left">
 <?php get_template_part( 'inner-left-sidebar' ); ?>
</div>

<?php if(ICL_LANGUAGE_CODE=='en'):?>
<div class="col-xs-8 inner-page-content-inner">
<?php elseif(ICL_LANGUAGE_CODE=='he'):?>
<div class="col-xs-9 inner-page-content-inner">
<?php endif;?>

  <div id="primary" class="site-content">
    <div id="content" role="main">
      <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'content', 'page' ); ?>
      <?php //comments_template( '', true ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
    <!-- #content --> 
  </div>
</div>
<div class="col-xs-2 inner-page-content-right">
 <?php get_template_part( 'inner-right-sidebar' ); ?>
</div>
<?php get_footer(); ?>
