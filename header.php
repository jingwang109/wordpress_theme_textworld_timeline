<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta property="wb:webmaster" content="c7f6f9e8bdd02cf7" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php bloginfo('name'); ?><?php wp_title( '|'); ?></title>
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/awsomefont.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-family.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.0.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/index-ajax.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<section id="head_wrap">
		<div id="head-wrap-inner">
			<nav class="nav navbar-dushed dushed container"  role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#hm-nav-collapse">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					    </button>
					    <a class="navbar-brand" href="<?php bloginfo('url') ?>"><?php bloginfo('info'); ?></a>
					</div>

					<div class="collapse navbar-collapse" id="hm-nav-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#">home</a></li>
							<?php wp_list_pages(array(
									'title_li' => ''
								)); ?>
							<li><?php wp_loginout(); ?></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		
	</section>
	<div class="container wrap">
		
