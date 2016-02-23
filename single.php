<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<?php
$current_cat = get_the_category();
?>
<div class="col-xs-3 inner-page-content-left">
 <?php get_template_part( 'inner-left-sidebar' ); ?>
</div>
<div class="col-xs-9 inner-page-content-inner">
	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
                    <div class="featured-post">
                        <?php _e( 'Featured post', 'twentytwelve' ); ?>
                    </div>
                    <?php endif; ?>
                    <header class="entry-header">
                        <?php if ( is_single() ) : ?>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php else : ?>
                        <h1 class="entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h1>
                        <?php endif; // is_single() ?> 
                        
                    	<?php if(ICL_LANGUAGE_CODE=='he'):?>
                    	<!--<div class="featured-img"><?php the_post_thumbnail('medium'); ?></div>-->
                        <?php endif; ?>
                        
                    </header><!-- .entry-header -->
            
                    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div><!-- .entry-summary -->
                    <?php else : ?>
                    <div class="entry-content bbbbbas">
                    	<?php if(ICL_LANGUAGE_CODE!='he'):?>
                    	<!--<div class="featured-img"><?php the_post_thumbnail('medium'); ?></div>-->
                        <?php endif; ?>
                    	<?php if($current_cat[0]->slug=='aleh-happenings' || $current_cat[0]->slug=='in-the-press'):?>
                    	<div class="featured-img aleh-happenings"><?php the_post_thumbnail('medium'); ?></div>
                        <?php endif; ?>
                        <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
                    </div><!-- .entry-content -->
                    <?php endif; ?>
             
                </article><!-- #post --> 

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- # -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>