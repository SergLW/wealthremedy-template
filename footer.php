<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WealthRemedy
 */

?>

	</div><!-- #content -->
</section>
<?php
if ( is_front_page() ) :
?>
<footer  class="parallax1"  <?php if( get_field('background_img_contacts') ): ?> style="background: url(<?php the_field('background_img_contacts'); ?>) no-repeat" <?php endif; ?> >
	<section class="contacts">
		<div class="color-opacity">
			<div class="container">
				<div class="row">
					<h2><?php the_field('title_contact_section_home'); ?></h2>
					<div class="col-md-6">
						<?php the_field('form_contact_home'); ?>	
					</div>
					<div class="col-md-6">
						<div class="address-wrap">
							<div class="addr-item">
								<span>Address:</span>
								<p><?php the_field('address-contacts','option'); ?></p>
								<hr>
							</div>
							<div class="addr-item">
								<span>Phone:</span>
								<p><?php the_field('phone-main-contacts','option'); ?></p>
								<hr>
							</div>
							<div class="addr-item">
								<span>E-mail:</span>
								<p><a href="mailto:<?php the_field('e-mail-contacts','option'); ?>"><?php the_field('e-mail-contacts','option'); ?></a></p>
								<hr>
							</div>
							<div class="addr-item">
								<span>Social:</span>
								<p><?php if( get_field('enable_facebook','option') ): ?>
										<a href="<?php the_field('facebook','option'); ?>" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
									<?php endif; ?>
									<?php if( get_field('enable_twitter','option') ): ?>
										<a href="<?php the_field('twitter','option'); ?>" class="twitter img-circle"><span class="fa fa-instagram"></span></a>
									<?php endif; ?>
									<?php if( get_field('enable_linkedin','option') ): ?>
										<a href="<?php the_field('linkedin','option'); ?>" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
									<?php endif; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="foot">
		<div class="color-opacity">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="logo-footer-copy">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('logo_footer','option'); ?>" alt=""></a>
							<p>Copyright © 2017. All right reserved.</p>
						</div>
						<div class="menu-footer-wrap">
							<nav class="site-navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</footer>

<?php
else :
?>
	<footer class="parallax3 sec-foot" style="background: url(<?php the_field('background_img_footer_options', 'option'); ?>) no-repeat">
		<section class="foot">
			<div class="color-opacity">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="logo-footer-copy">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('logo_footer','option'); ?>" alt=""></a>
								<p>Copyright © <?php echo date("Y"); ?>. All right reserved.</p>
							</div>
							<div class="menu-footer-wrap">
								<nav class="site-navigation">
									<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</footer>

	<?php
endif;
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
