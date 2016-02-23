<?php
/**
 * Template Name: Dedication Opportunities See All Projects
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
?>

<div class="col-xs-3 inner-page-content-left">
 <?php get_template_part( 'inner-left-sidebar' ); ?>
</div>

<div class="col-xs-9 inner-page-content-inner">
<?php

 $showcost=true; 
 include(locate_template('page-templates/adoptachild-main-template.php')); 
  
 $catid = 42; 
 include(locate_template('page-templates/detication-main-template.php'));
 
 $catid = 43; 
 include(locate_template('page-templates/detication-main-template.php'));
 
 $catid = 44; 
 include(locate_template('page-templates/detication-main-template.php'));
 
 $catid = 45; 
 include(locate_template('page-templates/detication-main-template.php'));
 
 $catid = 46; 
 include(locate_template('page-templates/detication-main-template.php'));
 
?>

</div>


<?php get_footer(); ?>
