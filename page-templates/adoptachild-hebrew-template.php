<?php
/**
 * Template Name: Adopt-a-Child Hebrew Template
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

<h1 class="entry-title"><?php echo get_the_category_by_id(69);?></h1>
<p><?php echo category_description(69);?></p>
<?php 
 // WP_Query arguments

    $args = array (
        'post_type'              => 'dedication',
        'cat'                    => 69,
        'posts_per_page'         => -1,
        'order'                  => 'DSCE',
		'orderby'                => 'date',

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
  <a href="#<?php echo get_the_ID();?>" class="pop-up-donate-icon">
    <div class="col-xs-2 donate-button donate-button-hebrew"> 
      <?php the_title(); ?>
    </div>
   </a>
    <div class="col-xs-7 dadication-content-hebrew-middle">
      <h3>
        <?php the_title(); ?>
      </h3>
      <?php //the_content(); // Post content ?>
      <?php the_excerpt(); ?>
      <div class="hebrew-modal-readmore"> <a data-toggle="modal" data-target=".bs-example-modal-lg_<?php echo get_the_id(); ?>">להמשך &larr;</a> </div>
      <div class="modal fade bs-example-modal-lg_<?php echo get_the_id(); ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="popup-page">
              <div class="title-bar">
                <div class="container">
                  <div class="row">
                    <div class="col-xs-10 popup-title ">
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
                    <div class="col-xs-10 popup-content">
                      <?php the_content(); ?>
                    </div>
                    <div class="col-xs-2 popup-img">
                      <?php the_post_thumbnail(array(150,120)); ?>
                    </div>
                  </div>
                </di>
              </div>
              <div class="popup-amount">
                <div class="container">
                  <div class="row">
                    <div class="col-xs-11 donate-popup-section">
                      <p style="font-size:18px; font-weight:bold; color:#fff; font-weight:bold; color:#fff; margin:11px 35px 11px 15px;">* השמות שונו כדי להגן על מטרות פרסום פרטיות אפשרויות:</p>
                      <form id="form-donate-amount_<?php echo get_the_ID();?>" method="post" action="<?php echo esc_url( home_url( '/donate-online-hebrew/?lang=he' ) ); ?>">
                        <div class="row">
                          <div class="col-xs-10">
                            <p style="padding-top:5px; font-size:16px; color:#fff;">
                              <?php the_title(); ?>
                            </p>
                          </div>
                          <div class="col-xs-2">
                            <button type="button" value="10000" class="btn btn-warning pop-btn btn-donate-amount">$10,000</button>
                          </div>
                          <div class="col-xs-10">
                            <p style="padding-top:5px; font-size:16px; color:#fff;">תכנית חושית ג'ימבורי: 2 מפגשים שבועיים x 50 שבועות</p>
                          </div>
                          <div class="col-xs-2">
                            <button style="color:#226320" value="3000" type="button" class="btn btn-success pop-btn btn-donate-amount">$3,000</button>
                          </div>
                          <div class="col-xs-10">
                            <p style="padding-top:5px; font-size:16px; color:#fff;">תרפיה במוסיקה: 2 מפגשים שבועיים x 50 שבועות</p>
                          </div>
                          <div class="col-xs-2">
                            <button style="color:#226320" value="2500" type="button" class="btn btn-success pop-btn btn-donate-amount">$2,500</button>
                          </div>
                          <div class="col-xs-10">
                            <p style="padding-top:5px; font-size:16px; color:#fff;">2250 $ - הידרותרפיה: 1 פגישה שבועית x 50 שבועות</p>
                          </div>
                          <div class="col-xs-2">
                            <button style="color:#226320" value="2250" type="button" class="btn btn-success pop-btn btn-donate-amount">$2,250</button>
                          </div>
                          <div class="col-xs-10">
                            <p style="padding-top:5px; font-size:16px; color:#fff;">סכום אחר</p>
                          </div>
                          <div class="col-xs-2"> <span style="width:800px; float:left; margin-bottom: 10px"> <span style="color:#226320" type="button" class="btn btn-default pop-btn">
                            <input type="text" class="donate-amount" name="donate_amount" value=""/>
                            <input type="submit" style="display:none;" />
                            <input type="hidden" name="child_id" value="<?php echo get_the_ID();?>" />$
                            </span>
                            <p style="padding-top:5px; font-size:16px; color:#fff;">Other Amount</p>
                            </span> </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="popup-footer">
                <div class="container">
                  <div class="row">
                    <div class="col-xs-3"> <a class="pop-up-donate-icon" href="#<?php echo get_the_ID();?>"><img style="float:right; margin:10px 55px 0px;" src="<?php echo get_template_directory_uri(); ?>/images/donate-icon-hebrew.png" width="148" alt="" /></a> </div>
                    <div class="col-xs-9">
                      <p style="font-size:20px; color:#656f70; margin:30px 14px 0px;">קמפיין קוד</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-2 dadication-content-hebrew-right">
      <?php the_post_thumbnail(array(150,120)); ?>
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
<?php get_footer(); ?>
