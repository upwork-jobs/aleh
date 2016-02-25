<div class="dedication-area">
<?php
	$cat_details = &get_category($catid);
?>

<?php if($catid == 42):?>
<ul class="list-inline list-with-vertical-divider">
  <li><a href="#buildings"><strong>Buildings</strong></a></li>
  <li><a href="#equipment"><strong>Equipment</strong></a></li>
  <li><a href="#programs"><strong>Programs</strong></a></li>
  <li><a href="#training"><strong>Training</strong></a></li>
  <li><a href="#sponsorships"><strong>Sponsorships</strong></a></li>
</ul>
<br>
<?php else:?>
<h1 class="entry-title" id="<?php echo $cat_details->slug;?>"><?php echo get_the_category_by_id($catid);?></h1>
<?php endif;?>
<p><?php echo category_description($catid);?></p>

<?php 
 // WP_Query arguments

    $args = array (
        'cat'                    => $catid, 
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
    <div class="col-xs-2 dadication-left">
      <?php the_post_thumbnail(array(150,120)); ?>
    </div>
    <div class="col-xs-6 dadication-middle">
      <h3>
        <?php the_title(); ?>
      </h3>
      <b>Cost: $<?php the_field('dedication_sponsorship'); ?></b>
      <?php //the_content(); // Post content ?>
      <?php the_excerpt(); ?>
      <a href="<?php the_permalink(); ?> " style="text-decoration:none; float:right; color:#256224; font-weight: bold; cursor:pointer; margin-bottom: 5px; display:none;">SEE MORE &rarr;</a>
      
    </div>
    <div class="col-xs-2">
		<?php $cost = get_post_meta( get_the_ID(), 'dedication_sponsorship',true); ?>
        <a href="<?php echo esc_url( home_url( '/donate-online/' ) ); if($showcost) echo '?donate_amount='.$cost ?>" class="pop-up-donate-icon">
        <div class="donate-button">
          Donate
          </br>
          Now</div>
        </a>
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
