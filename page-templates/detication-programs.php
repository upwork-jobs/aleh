<?php
/**
 * Template Name: Dedication Program
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
$catid = 44;
$showcost=true;
?>
<?php include(locate_template('page-templates/detication-main-template.php'));?>
<?php get_footer(); ?>
