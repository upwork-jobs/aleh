<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
global $sitepress;
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>

<!-- Bootstrap -->
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/custom-bootstrap-margin-padding.css" rel="stylesheet">
<script src="<?php echo get_template_directory_uri(); ?>/js/scrolltofixed.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/custom.js"></script>
<?php wp_head(); ?>

<!-- Responsive -->
<link href="<?php echo get_template_directory_uri(); ?>/responsive.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php if(ICL_LANGUAGE_CODE=='en'):?>
<div class="wrapper en">

<!--Header Start-->
<div class="header">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-1 p-15 sm-text-center">
        	<a class="text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
        </div>
        <div class="col-xs-12 col-md-4 text-right p-10 border-right sm-text-center">
          <ul class="header-footer-social-list list-inline">
            <li><a href="https://www.facebook.com/alehisrael"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/alehinfo"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-4 pt-15 pb-15 border-right text-center">
          <ul class="top-wpml-list list-inline">
            <li><a href="<?php echo $sitepress->language_url( 'en' ); ?>">EN</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'he' ); ?>">HE</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'nl' ); ?>">NL</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'de' ); ?>">DE</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-3 p-10 sm-text-center">
          <div class="top-search-form">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input  type="text" id="s" name="s" placeholder="SEARCH SITE">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-3 logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="215"  alt="" /></a> </div>
      <div class="col-xs-12 col-md-9 pt-20 pl-0">
        <div class="header-menu">
          <div class="navbar" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="navbar-collapse collapse">
                <?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav' ) ); ?>
                <?php wp_nav_menu( array('menu' => 'top-nav', 'menu_class' => 'nav navbar-nav' ));?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <?php if(is_front_page()):?>
  <div class="container">
    <div class="row">
      <div class="clearfix"></div>
      <div class="header-banner">
      	<?php echo do_shortcode( '[rev_slider alias="scroll-effect-english-slider"]' ) ?>
      </div>
    </div>
  </div>
  <div class="container mb-50">
    <div class="row text-right">
        <div class="home-banner-donate-btn"><a href="https://aleh.org/donate-online/"><img id="donatebtn-scrolltofixed" width="250" src="<?php echo get_template_directory_uri(); ?>/images/icon-doten-now2.png" alt=""></a></div>
    </div>
  </div>
  <?php endif; ?>
</div>
<!--Header EN End-->

<?php elseif(ICL_LANGUAGE_CODE=='nl'):?>
<div class="wrapper en">

<!--Header Start-->
<div class="header">
  <div class="header-top">
    <div class="container">      
      <div class="row">
        <div class="col-xs-12 col-md-1 p-15 sm-text-center">
        	<a class="text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">THUIS</a>
        </div>
        <div class="col-xs-12 col-md-4 text-right p-10 border-right sm-text-center">
          <ul class="header-footer-social-list list-inline">
            <li><a href="https://www.facebook.com/alehisrael"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/alehinfo"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-4 pt-15 pb-15 border-right text-center">
          <ul class="top-wpml-list list-inline">
            <li><a href="<?php echo $sitepress->language_url( 'en' ); ?>">EN</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'he' ); ?>">HE</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'nl' ); ?>">NL</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'de' ); ?>">DE</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-3 p-10 sm-text-center">
          <div class="top-search-form">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input  type="text" id="s" name="s" placeholder="DOORZOEK SITE">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-3 logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="215"  alt="" /></a> </div>
      <div class="col-xs-12 col-md-9 pt-20 pl-0">
        <div class="header-menu">
          <div class="navbar" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="navbar-collapse collapse">
                <?php wp_nav_menu( array('theme_location' => 'primary', 'menu_class' => 'nav navbar-nav' ));?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <?php if(is_front_page()):?>
  <div class="container">
    <div class="row">
      <div class="clearfix"></div>
      <div class="header-banner">
      	<?php echo do_shortcode( '[rev_slider alias="dutch-rev-slider"]' ) ?>
      </div>
    </div>
  </div>
  <div class="container mb-50">
    <div class="row text-right">
        <div class="home-banner-donate-btn"><a href="https://aleh.nl/dutch-donate-online/"><img id="donatebtn-scrolltofixed" width="250" src="<?php echo get_template_directory_uri(); ?>/images/icon-doten-now-dutch.png" alt=""></a></div>
    </div>
  </div>
  <?php endif; ?>
</div>
<!--Header NL End-->

<?php elseif(ICL_LANGUAGE_CODE=='de'):?>
<div class="wrapper en">

<!--Header Start-->
<div class="header">
  <div class="header-top">
    <div class="container">      
      <div class="row">
        <div class="col-xs-12 col-md-1 p-15 sm-text-center">
        	<a class="text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">START</a>
        </div>
        <div class="col-xs-12 col-md-4 text-right p-10 border-right sm-text-center">
          <ul class="header-footer-social-list list-inline">
            <li><a href="https://www.facebook.com/alehisrael"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com/alehinfo"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-4 pt-15 pb-15 border-right text-center">
          <ul class="top-wpml-list list-inline">
            <li><a href="<?php echo $sitepress->language_url( 'en' ); ?>">EN</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'he' ); ?>">HE</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'nl' ); ?>">NL</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'de' ); ?>">DE</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-3 p-10 sm-text-center">
          <div class="top-search-form">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input  type="text" id="s" name="s" placeholder="SUCHE AUF DER SEITE">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-3 logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="215"  alt="" /></a> </div>
      <div class="col-xs-12 col-md-9 pt-20 pl-0">
        <div class="header-menu">
          <div class="navbar" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="navbar-collapse collapse">
                <?php wp_nav_menu( array('theme_location' => 'primary', 'menu_class' => 'nav navbar-nav' ));?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <?php if(is_front_page()):?>
  <div class="container">
    <div class="row">
      <div class="clearfix"></div>
      <div class="header-banner">
      	<?php echo do_shortcode( '[rev_slider alias="german-rev-slider"]' ) ?>
      </div>
    </div>
  </div>
  <div class="container mb-50">
    <div class="row text-right">
        <div class="home-banner-donate-btn"><a href="https://aleh-israel.de/spenden/online-spenden/"><img id="donatebtn-scrolltofixed" width="250" src="<?php echo get_template_directory_uri(); ?>/images/icon-doten-now-german.png" alt=""></a></div>
    </div>
  </div>
  <?php endif; ?>
</div>
<!--Header DE End-->

<?php elseif(ICL_LANGUAGE_CODE=='he'):?>
<div class="wrapper hebrew">

<!--Header Start-->
<div class="header">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-1 p-15 sm-text-center">
        	<a class="text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
        </div>
        <div class="col-xs-12 col-md-4 text-right p-10 border-right sm-text-center">
          <ul class="header-footer-social-list list-inline">
            <li><a href="https://www.youtube.com/user/alehisrael"><i class="fa fa-youtube"></i></a></li>
            <li><a href="https://twitter.com/alehinfo"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.facebook.com/alehisrael"><i class="fa fa-facebook"></i></a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-4 pt-15 pb-15 border-right text-center">
          <ul class="top-wpml-list list-inline">
            <li><a href="<?php echo $sitepress->language_url( 'en' ); ?>">EN</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'he' ); ?>">HE</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'nl' ); ?>">NL</a></li>
            <li><a href="<?php echo $sitepress->language_url( 'de' ); ?>">DE</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-md-3 p-10 sm-text-center">
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
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 pt-20 pl-0">
        <div class="header-menu">
          <div class="navbar" role="navigation">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar">Menu</span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
              <div class="navbar-collapse collapse">
                <?php wp_nav_menu( array( 'theme_location' => 'hebrew-primary', 'menu_class' => 'nav navbar-nav pull-right' ) ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-2 logo"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-hebrew.png" width="150"  alt="" /></a> </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <?php if(is_front_page()):?>
  <div class="container">
    <div class="row">
      <div class="clearfix"></div>
      <div class="header-banner">
      	<?php echo do_shortcode( '[rev_slider alias="scroll-effect-hebrew-slider"]' ) ?>
      </div>
    </div>
  </div>
  <div class="container mb-50">
    <div class="row text-right">
        <div class="home-banner-donate-btn text-left pl-100"><a href="https://aleh.org/donate-online-hebrew/?lang=he"><img id="donatebtn-scrolltofixed" width="300" src="<?php echo get_template_directory_uri(); ?>/images/icon-doten-now-hebrew.png" alt=""></a></div>
    </div>
  </div>
  <?php endif; ?>
</div>
<!--Header HE End-->

<?php endif;?>

<!--Body Start-->
<div class="main-content">
<div class="container main-body-container">
<div class="row main-body-row">
