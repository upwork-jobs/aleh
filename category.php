<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php $read_more = (ICL_LANGUAGE_CODE=='he') ? "קרא עוד...": "More";?>
<?php $read_more = (ICL_LANGUAGE_CODE=='nl') ? "Meer....": "More";?>
<?php $read_more = (ICL_LANGUAGE_CODE=='de') ? "Mehr....": "More";?>

<div class="col-xs-3 inner-page-content-left">
 <?php get_template_part( 'inner-left-sidebar' ); ?>
</div>

<div class="col-xs-12 inner-page-content-inner">
<?php 
//get cat id
$category = get_category( get_query_var( 'cat' ) );
$category_id = $category->cat_ID;

$categories = get_the_category($category_id);

//$category_id = $cat;
$args = array(
	'cat' => $category_id,
	'orderby' => 'date',
	'order' => 'DESC',
	'date_query' => array(
		array(
			'year'  => date('Y')
		),
	),
);
$the_query = new WP_Query( $args ); 
$allposts = $the_query->posts;
//$allposts = array_reverse($allposts);
$current_category_link = get_category_link( $category_id );
?>


<?php 
	if($categories[0]->slug=='programs-in-action' || $categories[0]->slug=='in-the-press' || $categories[0]->slug=='aleh-happenings'):

 ?> 

<?php if(!isset($_REQUEST['archive']) && $_REQUEST['archive']!='y'):?>
			<header class="entry-header">
				<h1 class="entry-title"><?php echo single_cat_title( '', false );?></h1> 
			</header><!-- .archive-header -->
		<?php if ( count($allposts)>0 ) : ?>
			<?php foreach( $allposts as $eachpost ) { ?>
      <?php
				  $post = get_post($eachpost->ID);
				  setup_postdata( $post );
				  $_excerpt = get_the_excerpt();
				  $_title = get_the_title();
				  $_permalink = get_the_permalink();
				  $_the_date = get_the_date( 'M d, Y', get_the_ID() );
				  wp_reset_postdata();
			?>
                <div class="each-post a1">
                	<div class="col-xs-2">
                    <?php if ( has_post_thumbnail($eachpost->ID) ) : ?>
                    <a class="pull-left" href="<?php echo $_permalink; ?>">
                    	<?php $img_attr = array('class'	=> "img-responsive																												");  echo get_the_post_thumbnail($eachpost->ID, 'thumb', $img_attr); ?>
                 	 </a>
					<?php else: ?>
                            <img src="<?php home_url( '/wp-content/uploads/2014/05/no-photo.jpg' ); ?>" alt="" />
                    <?php endif; ?>
                  
                  	</div>
                	<div class="col-xs-7"> <a  class="post-title" href="<?php echo $_permalink; ?>"><?php echo $eachpost->post_title; ?></a> <br /> <?php echo $_excerpt; ?><a href="<?php echo $_permalink; ?>"> <br /> More</a></div>
                	<div class="col-xs-2"><?php echo $_the_date;?></div>
                   
                	<div class="clearfix"></div>
                </div>
            <?php }//foreach ?>
		<?php else : ?>
			 No news records on file.
		<?php endif; ?>
        <div class="each-post text-center old-archives-link a2">
            <a href="<?php echo $current_category_link; ?>?archive=y">
                <?php echo single_cat_title( '', false );?> - archive
            </a>        
            <div class="clearfix"></div>
        </div>
<?php 
//end if archive and archive!=y
else:
?>

			<header class="entry-header">
				<h1 class="entry-title"><?php echo single_cat_title( '', false );?> Archive</h1> 
			</header><!-- .archive-header -->
            
            
<?php  
$currentyear=date('Y');

for($year=$currentyear; $year>=2013;$year--){
$args = array(
	'cat' => $category_id,
	'orderby' => 'date',
	'order' => 'DESC',
	'date_query' => array(
		array(
			'year'  => $year
		),
	),
);
$the_query = new WP_Query( $args ); 
$allposts = $the_query->posts;
//$allposts = array_reverse($allposts);
?>

		<?php if ( count($allposts)>0 ) : ?>
				<h3 class="archive-year"><?php echo $year;?> Archive</h3>
			<?php foreach( $allposts as $eachpost ) { ?>
            <?php
				  $post = get_post($eachpost->ID);
				  setup_postdata( $post );
				  $_excerpt = get_the_excerpt();
				  $_title = get_the_title();
				  $_permalink = get_the_permalink();
				  $_the_date = get_the_date( 'M d, Y', get_the_ID() );
				  wp_reset_postdata();
			?>
            	
                
                <div class="each-post-archive isma">
                	<div class="col-xs-9"> <a  class="post-title" href="<?php echo $_permalink; ?>"><?php echo $_title; ?></a></div>
                	<div class="col-xs-3 the-date"><?php echo $_the_date;?></div>
                	<div class="clearfix"></div>
                </div>
            
            <?php }//foreach ?> 
		<?php endif; ?>
        
        
<?php } ?>

<?php 
//end else if archive and archive==y
endif; 
?>


<?php else:  
//47 f
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

//חברי נשיאות Members of the Presidium
if($category_id==47) :
	$args = array(
		'cat' => $category_id,
		'paged' => $paged,
		
		'meta_key'		=> 'members_order_number',
		'orderby'		=> 'meta_value_num',
		'order'			=> 'DESC',
	
		'date_query' => array(
			array(
				'after'     => 'January 1st, 2013',
			),
		)
	);
else :
	$args = array(
		'cat' => $category_id,
		'paged' => $paged,
		'orderby' => 'date',
		'order' => 'DESC',
		'date_query' => array(
			array(
				'after'     => 'January 1st, 2013',
			),
		)
	);
endif;



$the_query = new WP_Query( $args ); 
$allposts = $the_query->posts;
//$allposts = array_reverse($allposts);
?>
			<header class="entry-header">
				<h1 class="entry-title"><?php echo single_cat_title( '', false );?></h1> 
			</header><!-- .archive-header -->
		<?php if ( count($allposts)>0 ) : ?>
        
        

			<?php if(ICL_LANGUAGE_CODE=='he'):?>
				<?php foreach( $allposts as $eachpost ) { ?>
				<?php
                      $post = get_post($eachpost->ID);
                      setup_postdata( $post );
                      $_excerpt = get_the_excerpt();
				  	  $_title = get_the_title();
                      $_permalink = get_the_permalink();
                      $_the_date = get_the_date( 'Y F j', get_the_ID() );
                      wp_reset_postdata();
                ?>
                    <div class="each-post a3">
                        <div class="col-xs-2 the-date"><?php //echo hebrewDate($_the_date); ?></div>
                        <div class="col-xs-7"> <a  class="post-title" href="<?php echo $_permalink; ?>"><?php echo $_title; ?></a> <br /> <?php echo $_excerpt; ?><a href="<?php echo $_permalink; ?>"><?php echo $read_more?></a></div>
                        <div class="col-xs-2"><a class="pull-left" href="<?php echo $_permalink; ?>">
                        <?php $img_attr = array('class'	=> "img-responsive																												"); echo get_the_post_thumbnail($eachpost->ID, 'thumb', $img_attr); ?>
                      </a></div>
                	  <div class="clearfix"></div>
                    </div> 
                <?php }//foreach ?>
                 <div class="pagination">
                 <?php 
				 	$big = 999999999; // need an unlikely integer
					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages
					) ); 
				?> 
                 </div>
            <?php else : ?>
				<?php foreach( $allposts as $eachpost ) { ?>
				<?php
                      $post = get_post($eachpost->ID);
                      setup_postdata( $post );
                      $_excerpt = get_the_excerpt();
				  	  $_title = get_the_title();
                      $_permalink = get_the_permalink();
                      $_the_date = get_the_date( 'M d, Y', get_the_ID() );
                      wp_reset_postdata();
                ?>
                    <div class="each-post a4">
                        <div class="col-xs-2"><a class="pull-left" href="<?php echo $_permalink; ?>">
                        <?php $img_attr = array('class'	=> "img-responsive																												");  echo get_the_post_thumbnail($eachpost->ID, 'thumb', $img_attr); ?>
                      </a></div>
                        <div class="col-xs-7"> <a  class="post-title" href="<?php echo $_permalink; ?>"><?php echo $_title; ?></a> <br /> <?php echo $_excerpt; ?><a href="<?php echo $_permalink; ?>"><?php echo $read_more?></a></div>
                        <div class="col-xs-2 post-date"><?php echo $_the_date; ?></div>
                		<div class="clearfix"></div>
                    </div> 
                <?php }//foreach ?>
            <?php endif; ?>

		<?php else : ?>
			 No news records on file.
		<?php endif; ?>
                

<?php endif; ?>

</div>


<?php get_footer(); ?>