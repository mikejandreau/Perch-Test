<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Perch_Test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>


<body id="page-top" <?php body_class('body'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'perchtest' ); ?></a>


<div class="navbar-wrap fixed-top">
  <?php /* if alert box is not empty and it's the homepage, show the alert */ ?>
  <?php if (($footerTagline = get_option('dcv3_options')['dcv3-header-alert']) && (is_front_page())) { 
    echo '<div class="alert alert-danger alert-dismissible fade show m-0" role="alert">' . $footerTagline . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>  ';
  } else { /* do nothing */ } ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-white" id="mainNav">

    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/perch-logo.svg" />
    </a>

    <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar top-bar"></span>
      <span class="icon-bar middle-bar"></span>
      <span class="icon-bar bottom-bar"></span>
    </button>
    <?php
    wp_nav_menu([
      'menu'            => 'top',
      'theme_location'  => 'menu-1',
      'container'       => 'div',
      'container_id'    => 'navbarResponsive',
      'container_class' => 'collapse navbar-collapse',
      'menu_id'         => 'primary-menu',
      'menu_class'      => 'navbar-nav ml-auto',
      'depth'           => 2,
      'fallback_cb'     => 'bs4navwalker::fallback',
      'walker'          => new bs4navwalker()
    ]);
    ?>
  </nav>

</div><?php /* /navbar-wrap */ ?>

<div class="site-content">





