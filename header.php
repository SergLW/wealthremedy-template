<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WealthRemedy
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page-preloader"><span class="spinner"><img src="<?php bloginfo('template_directory'); ?>/img/loader.gif" alt=""></span></div>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<div class="top-line"></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="top-info">
						<ul>
							<li class="top-info-firstli">
								<span class="icon" ><i class="fa fa-phone-square" aria-hidden="true"></i></span>
								<a href="#"><?php the_field('phone_header','option'); ?></a>
							</li>
							<li class="top-info-secli">
								<span class="icon"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></span>
								<a href="mailto:<?php the_field('email_header','option'); ?>"><?php the_field('email_header','option'); ?></a>
							</li>
							<?php if( get_field('enable_social_header','option') ): ?>
								<li class="top-info-lastli">
									<a href="<?php the_field('facebook','option'); ?>" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
									<a href="<?php the_field('twitter','option'); ?>" class="twitter img-circle"><span class="fa fa-instagram"></span></a>
									<a href="<?php the_field('linkedin','option'); ?>" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="header-upper">
						<div class="site-branding">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="top-logo"><img src="<?php the_field('logo_header_main','option'); ?>" alt=""></a>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="hesive-logo"><img src="<?php the_field('logo_header_hesive','option'); ?>" alt=""></a>
						</div><!-- .site-branding -->
						<div class="nav-wrap">
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</nav><!-- #site-navigation -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php
		if ( is_front_page() ) :
	?>
	<section class="slider-sec">
		<ul id="owl-demo" class="owl-carousel owl-theme">
			<?php if( have_rows('slider_repeater_home') ):
			while ( have_rows('slider_repeater_home') ) : the_row(); ?>
				<li class="slider-container" style="background: url(<?php the_sub_field('image_slider_home'); ?>) no-repeat center; height: 450px;">
					<div class="container">
					<div class="slide-content">
							<div class="slider-wrap">
								<h2><?php the_sub_field('title_slider_home'); ?></h2>
								<h3><?php the_sub_field('description_for_slider'); ?></h3>
							<?php if( get_sub_field('enable_button_slider_home') ): ?>
								<a href="<?php the_sub_field('url_for_button_slider_home'); ?>" class="button"><?php the_sub_field('button_label_slider_home'); ?></a>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</li>
				<?php
			endwhile;
			endif;  ?>
		</ul>
	</section>
	<?php
		elseif (is_404()) :
	?>
	<section class="content">
		<section class="content-title parallax2" <?php if( get_field('background_img_title_pages') ): ?> style="background: url(<?php the_field('background_img_title_pages'); ?>) no-repeat" <?php endif; ?>>
			<div class="title-container">
				<div class="container">
					<div class="title-wrap title-wrap-404">
						<h1><?php the_field('header_title_404','option'); ?></h1>
					</div>
				</div>
			</div>
		</section>
	<?php
		else :
	?>
	<section class="content">
		<section class="content-title parallax2" <?php if( get_field('background_img_title_pages') ): ?> style="background: url(<?php the_field('background_img_title_pages'); ?>) no-repeat" <?php endif; ?>>
			<div class="title-container">
				<div class="container">
					<div class="title-wrap">
						<h2><?php the_title(); ?></h2>
						<h3><?php the_field('description_for_page'); ?></h3>
					</div>
				</div>
			</div>
		</section>
		<?php
		endif;
	?>

	<div id="content" class="site-content">
