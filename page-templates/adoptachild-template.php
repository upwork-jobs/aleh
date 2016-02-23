<?php
/**
 * Template Name: Adopt-a-Child Template
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

get_header(); ?>
<div class="dedication-area">
  <h1 class="entry-title"><?php echo get_the_category_by_id(27);?></h1>
  <p><?php echo category_description(27);?></p>
  <?php 
 // WP_Query arguments

    $args = array (
        'post_type'              => 'dedication',
        'posts_per_page'         => -1,
        'category_name'		 => 'Adopt A Child', 
        'order'                  => 'DESC',
	'orderby'                => 'date',

    );
    // The Query
    $query = new WP_Query( $args );
    // The Loop
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();

?>
  <div class="dadication-content adopt-a-child">
    <div class="row">
      <div class="col-xs-2 dadication-left">
        <?php the_post_thumbnail(array(150,120)); ?>
      </div>
      <div class="col-xs-8 dadication-middle">
        <h3>
          <?php the_title(); ?>
        </h3>
        <div id="<?php echo get_the_ID();?>-dedicate-excerpt">
        	<?php the_excerpt(); ?>
        </div>
        <div id="<?php echo get_the_ID();?>-dedicate-content" style="display: none;">
        	<?php the_content(); ?>
        </div>
        <a href="#<?php echo get_the_ID();?>" class="dedicate-see-more">SEE MORE &rarr;</a>
      </div>
      <!--<a href="#<?php echo get_the_ID();?>" class="pop-up-donate-icon">-->
      <a id="click-modal-lg_<?php echo get_the_id(); ?>" style="text-decoration:none; float:right; color:#256224; font-weight: bold; cursor:pointer; margin-bottom: 5px;" data-toggle="modal" data-target="#bs-example-modal-lg_<?php echo get_the_id(); ?>">
      <div class="col-xs-2 donate-button">
        <?php the_title(); ?>
        </br>
        Now</div>
      </a> 
      <div id="bs-example-modal-lg_<?php echo get_the_id(); ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="popup-page">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <div class="title-bar">
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-10 col-xs-offset-2 popup-title">
                        <h2>
                          <?php the_title(); ?>
                        </h2>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="popup-content">
                  <di class="container">
                    <div class="row">
                      <div class="col-xs-2 popup-img">
                        <?php the_post_thumbnail(array(150,120)); ?>
                      </div>
                      <div class="col-xs-10 popup-content">
                        <?php the_content(); ?>
                      </div>
                    </div>
                  </di>
                </div>
                <div class="popup-amount">
                  <div class="container">
                    <div class="row">
                      <div class="col-xs-10 col-xs-offset-2 donate-popup-section pt-15">
                        
                        <form id="form-donate-amount_<?php echo get_the_ID();?>" method="post" action="<?php echo esc_url( home_url( '/donate-online/' ) ); ?>">
                          <span style="width:800px; float:left; margin-bottom: 10px">
                          <button type="button" value="10000" class="btn btn-warning pop-btn btn-donate-amount">$10,000</button>
                          <p style="padding-top:5px; font-size:16px; color:#fff; font-weight: bold;">
                            <?php the_title(); ?>
                          </p>
                          </span> <span style="width:800px; float:left; margin-bottom: 10px">
                          <button style="color:#226320" value="3000" type="button" class="btn btn-success pop-btn btn-donate-amount">$3,000</button>
                          <p style="padding-top:5px; font-size:16px; color:#fff; font-weight: bold;">Gymboree sensory program:  2 weekly sessions x 50 weeks</p>
                          </span> <span style="width:800px; float:left; margin-bottom: 10px">
                          <button style="color:#226320" value="2500" type="button" class="btn btn-success pop-btn btn-donate-amount">$2,500</button>
                          <p style="padding-top:5px; font-size:16px; color:#fff; font-weight: bold;">Music Therapy:  2 weekly sessions x 50 weeks</p>
                          </span> <span style="width:800px; float:left; margin-bottom: 10px">
                          <button style="color:#226320" value="2250" type="button" class="btn btn-success pop-btn btn-donate-amount">$2,250</button>
                          <p style="padding-top:5px; font-size:16px; color:#fff; font-weight: bold;"> Hydrotherapy:  1 weekly session x 50 weeks</p>
                          </span> <span style="width:800px; float:left; margin-bottom: 10px">
                          <button style="color:#226320" value="2000" type="button" class="btn btn-success pop-btn btn-donate-amount">$2,000</button>
                          <p style="padding-top:5px; font-size:16px; color:#fff; font-weight: bold;">Afternoon Outings and Trips </p>
                          </span> <span style="width:800px; float:left; margin-bottom: 10px"> <span style="color:#226320" type="button" class="btn btn-default pop-btn">$
                          <input type="text" class="donate-amount" name="donate_amount" value="0"/>
                          <input type="hidden" name="child_id" value="<?php echo get_the_ID();?>" />
                          <input type="hidden" name="ism_campaign_code" value="<?php echo get_field('ism_campaign_code');?>" />
                          </span>
                          <p style="padding-top:5px; font-size:16px; color:#fff; font-weight: bold;">Other Amount</p>
                          </span>
                          <input type="submit" value="Submit" class="pull-right" style="margin-top: -35px;"> 
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="popup-footer">
                  <div class="container">
                    <div class="row hidden">
                      <div class="col-xs-3">
                        <p style="font-size:14px; font-weight:bold; color:#474c4c; margin:40px 14px 0px;">Campaign Code:</p>
                      </div>
                      <div class="col-xs-9"> <a class="pop-up-donate-icon" href="#<?php echo get_the_ID();?>"><img style="float:right; margin:10px 0px;" src="../<?php echo get_template_directory_uri(); ?>/images/donate-icon.png" width="148" alt="" /></a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <?php 
   }
    wp_reset_postdata();
}
?>
<script type="text/javascript">
$(document).ready(function(e) {
	$('#myModal').modal();
	$('.dedicate-see-more').click(function(e) {
		e.preventDefault();
		$(this).hide();
		var id=$(this).attr('href');
		$(id+'-dedicate-excerpt').hide();
		$(id+'-dedicate-content').show();
	});
	
	
//get hash from url:
var childhash = window.location.hash.substr(1);
console.log(childhash);
//
$("#click-modal-lg_"+childhash).trigger('click');
});

</script>
  <?php //get_sidebar( 'front' ); ?>
</div>


<?php get_footer(); ?>
