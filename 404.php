<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WealthRemedy
 */

get_header(); ?>
	<section class="process-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="contact-title">
						<h2><?php the_field('tittle_content_404_page','option'); ?></h2>
					</div>
					<?php the_field('content_404_page','option'); ?>
				</div>
	</section>
<?php
get_footer();
