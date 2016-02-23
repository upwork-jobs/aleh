<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
</div>
</div>
</div>

<!--Body End-->


<?php if(ICL_LANGUAGE_CODE=='en'):?>
<!--Footer Start--> 
<div class="footer en" style="background: #426100;">
  <div class="container pt-20 pb-20">
    <div class="row">
      <div class="col-xs-12 col-md-5 footer-nav pt-40">
      	<div class="row">
        	<div class="col-md-4 nav1 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav1'));?>
          </div>
        	<div class="col-md-4 nav2 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav2'));?>
          </div>
        	<div class="col-md-4 nav3 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav3'));?>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-2 footer-icon hidden-xs hidden-sm ">
      	<img src="<?php echo get_template_directory_uri(); ?>/images/footer-tree.png" alt="">
      </div>
      <div class="col-xs-12 col-md-5 footer-nav pt-40">
      	<div class="row">
        	<div class="col-md-4 nav4 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav4'));?>
          </div>
        	<div class="col-md-4 nav5 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav5'));?>
          </div>
        	<div class="col-md-4 nav6 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav6'));?>
          </div>
        </div>
      </div>
    </div>
    <div class="row"><p class="text-white text-center pt-20 pb-20">ALEH Central Office: 12 Aharonovitz Street P.O.B. 435, Bnei Brak 51103 | Phone: 972-3-617-1888 | Email: <a href="mailto: info@aleh.org" class="text-white">info@aleh.org</a></p></div>
    <div class="row">
    		<div class="col-md-3 sm-text-center">
        	<a target="_blank" href="http://www.rootfunding.com/campaign/1579"><img class="mr-10" src="https://aleh.org/wp-content/uploads/2015/10/footer-clients1.jpg" alt=""></a>
        	<a target="_blank" href="http://www.guidestar.org/organizations/30-0456686/aleh-negev-foundation.aspx"><img src="https://aleh.org/wp-content/uploads/2015/10/footer-clients2.jpg" alt=""></a>
        </div>
    		<div class="col-md-6 text-center">
          <?php wp_nav_menu( array('theme_location' => 'footer-mini-nav', 'menu_class' => 'footer-mini-menu list-inline text-white mt-20' ));?>
        </div>
    		<div class="col-md-3 sm-text-center">
          <div class="top-search-form">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input  type="text" id="s" name="s" placeholder="Search ALEH’s Website">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
    </div>
  </div>
  <div class="footer-bottom" style="background:#fd911e;">
    <div class="container-fluid pt-20 pb-20 text-center">
      <div class="row">
          <ul class="header-footer-social-list list-inline">
            <li><a href="https://www.facebook.com/alehisrael"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/alehinfo"><i class="fa fa-twitter"></i></a></li>
            
            <li><a href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a></li>
          </ul>
          <p class="text-white">&copy; 2015 ALEH All rights reserved. All images and information may be used only with written approval from ALEH.</p>
      </div>
    </div>
  </div>
</div> 
<!--Footer End-->


<?php elseif(ICL_LANGUAGE_CODE=='nl'):?>
<!--Footer Start--> 
<div class="footer en" style="background: #426100;">
  <div class="container pt-20 pb-20">
    <div class="row">
      <div class="col-xs-12 col-md-5 footer-nav pt-40">
      	<div class="row">
        	<div class="col-md-4 nav1 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav1'));?>
          </div>
        	<div class="col-md-4 nav2 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav2'));?>
          </div>
        	<div class="col-md-4 nav3 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav3'));?>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-2 footer-icon hidden-xs hidden-sm ">
      	<img src="<?php echo get_template_directory_uri(); ?>/images/footer-tree.png" alt="">
      </div>
      <div class="col-xs-12 col-md-5 footer-nav pt-40">
      	<div class="row">
        	<div class="col-md-4 nav4 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav4'));?>
          </div>
        	<div class="col-md-4 nav5 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav5'));?>
          </div>
        	<div class="col-md-4 nav6 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav6'));?>
          </div>
        </div>
      </div>
    </div>
   <div class="row"><p class="text-white text-center pt-20 pb-20"> </p></div>
    <div class="row">
    		<div class="col-md-3 sm-text-center">
        	<a target="_blank" href="http://www.rootfunding.com/campaign/1579"><img class="mr-10" src="https://aleh.org/wp-content/uploads/2015/10/footer-clients1.jpg" alt=""></a>
        	<a target="_blank" href="http://www.guidestar.org/organizations/30-0456686/aleh-negev-foundation.aspx"><img src="https://aleh.org/wp-content/uploads/2015/10/footer-clients2.jpg" alt=""></a>
        </div>
    		<div class="col-md-6 text-center">
          <?php //wp_nav_menu( array('theme_location' => 'dutch-footer-mini-nav', 'menu_class' => 'footer-mini-menu list-inline text-white mt-20' ));?>
          <?php wp_nav_menu( array('theme_location' => 'footer-mini-nav', 'menu_class' => 'footer-mini-menu list-inline text-white mt-20' ));?>
        </div>
    		<div class="col-md-3 sm-text-center mt-20">
          <div class="top-search-form">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input  type="text" id="s" name="s" placeholder="Doorzoek ALEH’s Website">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
    </div>
  </div>
  <div class="footer-bottom" style="background:#fd911e;">
    <div class="container-fluid pt-20 pb-20 text-center">
      <div class="row">
          <ul class="header-footer-social-list list-inline">
            <li><a href="https://www.facebook.com/alehisrael"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/alehinfo"><i class="fa fa-twitter"></i></a></li>
            
           
            <li><a href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a></li>
          </ul>
          <p class="text-white">&copy; 2015 ALEH Alle rrechten voorbehouden. Alle beelden en informatie mogen alleen gebruikt worden met schriftelijke toestemming van ALEH.</p>
      </div>
    </div>
  </div>
</div> 
<!--Footer End-->

<?php elseif(ICL_LANGUAGE_CODE=='de'):?>
<!--Footer Start--> 
<div class="footer en" style="background: #426100;">
  <div class="container pt-20 pb-20">
    <div class="row">
      <div class="col-xs-12 col-md-5 footer-nav pt-40">
      	<div class="row">
        	<div class="col-md-4 nav1 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav1'));?>
          </div>
        	<div class="col-md-4 nav2 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav2'));?>
          </div>
        	<div class="col-md-4 nav3 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav3'));?>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-2 footer-icon hidden-xs hidden-sm ">
      	<img src="<?php echo get_template_directory_uri(); ?>/images/footer-tree.png" alt="">
      </div>
      <div class="col-xs-12 col-md-5 footer-nav pt-40">
      	<div class="row">
        	<div class="col-md-4 nav4 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav4'));?>
          </div>
        	<div class="col-md-4 nav5 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav5'));?>
          </div>
        	<div class="col-md-4 nav6 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'footer-nav6'));?>
          </div>
        </div>
      </div>
    </div>
   <div class="row"><p class="text-white text-center pt-20 pb-20"> </p></div>
    <div class="row">
    		<div class="col-md-3 sm-text-center">
        	<a target="_blank" href="http://www.rootfunding.com/campaign/1579"><img class="mr-10" src="https://aleh.org/wp-content/uploads/2015/10/footer-clients1.jpg" alt=""></a>
        	<a target="_blank" href="http://www.guidestar.org/organizations/30-0456686/aleh-negev-foundation.aspx"><img src="https://aleh.org/wp-content/uploads/2015/10/footer-clients2.jpg" alt=""></a>
        </div>
    		<div class="col-md-6 text-center">
          <?php //wp_nav_menu( array('theme_location' => 'dutch-footer-mini-nav', 'menu_class' => 'footer-mini-menu list-inline text-white mt-20' ));?>
          <?php wp_nav_menu( array('theme_location' => 'footer-mini-nav', 'menu_class' => 'footer-mini-menu list-inline text-white mt-20' ));?>
        </div>
    		<div class="col-md-3 sm-text-center mt-20">
          <div class="top-search-form">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input  type="text" id="s" name="s" placeholder="Suchen innerhalb Seite">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
    </div>
  </div>
  <div class="footer-bottom" style="background:#fd911e;">
    <div class="container-fluid pt-20 pb-20 text-center">
      <div class="row">
          <ul class="header-footer-social-list list-inline">
            <li><a href="https://www.facebook.com/alehisrael"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/alehinfo"><i class="fa fa-twitter"></i></a></li>
            
           
            <li><a href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a></li>
          </ul>
          <p class="text-white">&copy; 2015 ALEH Alle Rechte vorbehalten. Alle Bilder und Informationen dürfen nur mit schriftlicher Zustimmung von ALEH verwendet werden.</p>
      </div>
    </div>
  </div>
</div> 
<!--Footer End-->

<?php elseif(ICL_LANGUAGE_CODE=='he'):?>
<!--Footer Start--> 
<div class="footer hebrew" style="background: #426100;">
  <div class="container pt-20 pb-20">
    <div class="row">
      <div class="col-xs-12 col-md-5 footer-nav pt-40">
      	<div class="row">
        	<div class="col-md-4 nav1 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'hebrew-primary' ));?>
          </div>
        	<div class="col-md-4 nav2 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'hebrew-primary' ));?>
          </div>
        	<div class="col-md-4 nav3 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'hebrew-primary' ));?>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-2 footer-icon hidden-xs hidden-sm" style="min-height: 280px;">
      	<img src="<?php echo get_template_directory_uri(); ?>/images/footer-tree.png" alt="">
      </div>
      <div class="col-xs-12 col-md-5 footer-nav pt-40">
      	<div class="row">
        	<div class="col-md-4 nav4 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'hebrew-primary' ));?>
          </div>
        	<div class="col-md-4 nav5 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'hebrew-primary' ));?>
          </div>
        	<div class="col-md-4 nav6 p-0">
          	<?php wp_nav_menu( array('theme_location' => 'hebrew-primary' ));?>
          </div>
        </div>
      </div>
    </div>
    <div class="row"><p class="text-white text-center pt-20 pb-20">משרד ראשי: רחוב אהרונוביץ 12, ת.ד. 435 בני ברק 5110301 | טלפון: 03-6171888| דוא"ל: <a href="mailto: aleh@aleh.org" class="text-white">aleh@aleh.org</a></p></div>
    <div class="row">
    		<div class="col-md-4 sm-text-center">
        	<a target="_blank" href="http://www.rootfunding.com/campaign/1579"><img class="mr-10" src="https://aleh.org/wp-content/uploads/2015/10/footer-clients1.jpg" alt=""></a>
        	<a target="_blank" href="http://www.guidestar.org/organizations/30-0456686/aleh-negev-foundation.aspx"><img src="https://aleh.org/wp-content/uploads/2015/10/footer-clients2.jpg" alt=""></a>
        </div>
    		<div class="col-md-4 sm-text-center">
        	<ul class="footer-mini-menu list-inline text-white mt-20">
          	<li><a href="<?php echo esc_url( home_url( '/צור-קשר/' ) ); ?>">צור קשר</a></li>
          	<li>|</li>
          	<li><a href="<?php echo esc_url( home_url( '/מדיניות-פרטיות/' ) ); ?>">מדיניות פרטיות</a></li>
          </ul>
        </div>
    		<div class="col-md-4 sm-text-center">
          <div class="top-search-form">
            <form action="<?php echo esc_url( home_url( '/?lang=he' ) ); ?>">
              <button type="submit"><i class="fa fa-search"></i></button>
              <input  type="text" id="s" name="s" placeholder="חיפוש באתר">
              <input type="hidden" name="lang" value="he">
            </form>
          </div>
        </div>
    </div>
  </div>
  <div class="footer-bottom" style="background:#fd911e;">
    <div class="container-fluid pt-20 pb-20 text-center">
      <div class="row">
          <ul class="header-footer-social-list list-inline">
            <li><a href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a></li>
            
            
            <li><a href="https://twitter.com/alehinfo"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.facebook.com/alehisrael"><i class="fa fa-facebook"></i></a></li>
          </ul>
          <p class="text-white">© 2015 עלה כל הזכויות שמורות. כל התמונות והמידע ניתן להשתמש רק עם אישור בכתב מעלה.</p>
      </div>
    </div>
  </div>
</div> 
<!--Footer End-->
  
<?php endif;?>




</div>

<!-- jquery | prettyPhoto --> 
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/prettyphoto-lightbox/css/prettyPhoto.css">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/prettyphoto-lightbox/js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" charset="utf-8">
  jQuery(document).ready(function(){
    jQuery("a[rel^='prettyPhoto']").prettyPhoto();
  });
</script>


<script type="text/javascript">
$('.sidebar-tooltip').popover({
	placement: 'right',
	trigger: 'hover',
	html: true
});
</script>
<script>
function more_less (hide_div, show_div, myID) {
	document.getElementById(show_div + "_text_" + myID).style.display = ""
	document.getElementById(hide_div + "_text_" + myID).style.display = "none"
}
</script>

<?php wp_footer(); ?>

<script type="text/javascript">
$("#lang_sel_list .icl-he a").attr("href", "https://aleh.org.il/")
</script>


</body></html>