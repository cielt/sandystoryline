<?php
/**
 * The Header for our theme.
 *
 * @package progression
 * @since progression 1.0
 */
?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">

	<?php if(is_front_page() && of_get_option('home_title')): ?>
	<title><?php echo of_get_option('home_title'); ?></title>
	<?php else: ?>
	<title><?php global $page, $paged;  wp_title( '|', true, 'right' ); bloginfo( 'name' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'progression' ), max( $paged, $page ) ); ?></title>
	<?php endif; ?>

	<?php if(is_front_page() && of_get_option('home_meta')): ?>
	<meta name="description" content="<?php echo of_get_option('home_meta'); ?>" /> 
	<?php endif; ?>

	<?php if(of_get_option('favicon')): ?><link href="<?php echo of_get_option('favicon'); ?>" rel="shortcut icon" /> <?php endif; ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
	<style type="text/css" media="screen">
		body #logo.compact img { max-width: 120px; }
		header h1.align-right { width:auto; text-align: right; margin: 12px 0; line-height: 64px; }
	</style>
	<script type="text/javascript">
		var templateDir = "<?php bloginfo('stylesheet_directory'); ?>";
	</script>

</head>

<body <?php body_class(); ?>>
<header>

	<div class="width-container clearfix">
		
		<h1 id="logo" class="compact"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php echo of_get_option('logo', get_template_directory_uri() . '/images/logo.png'); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo of_get_option('logo_width'); ?>" />
		</a></h1>
		<h1 class="align-right"><?php echo get_the_title($post->ID); ?></h1>
	</div><!-- close .width-container -->
</header>


<div id="main" class="site-main">
	<div class="width-container">