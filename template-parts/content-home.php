<?php
/*
 Template Name: Home
 */
get_header(); ?>

    <section class="who-we-are">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h1><?php the_field('title_who_we_are'); ?></h1>
                    <?php the_field('editor_who_we_are'); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="who-right-img">
                        <?php
                        $image = get_field('img_who_we_are');
                        if( !empty($image) ): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="process parallax0" <?php if( get_field('background_img_process') ): ?> style="background: url(<?php the_field('background_img_process'); ?>) no-repeat" <?php endif; ?>>
        <div class="color-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-sm-push-6">
                        <h2><?php the_field('title_section_process'); ?></h2>
                        <?php the_field('content_section_process'); ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-sm-pull-6">
                        <div class="process-item-wrap">
                            <div class="row">
                            <?php if( have_rows('process_items_home') ):
                                $i = 1;
                                while ( have_rows('process_items_home') ) : the_row(); ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="<?php if( $i % 2 == 0 ): ?>item-right<?php else : ?>item-left<?php endif; ?>">
                                        <h4><?php the_sub_field('process_item_home'); ?></h4>
                                    </div>
                                </div>
                                <?php
                                    $i++;
                                endwhile;
                            endif;  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="facts">
        <div class="container">
            <div class="row">
                <?php if( get_field('enable_section_numbers') =='number' ): ?>
                    <h2><?php the_field('number_section_title'); ?></h2>
                    <?php if( have_rows('number_items_home') ):
                        while ( have_rows('number_items_home') ) : the_row(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="block-fact">
                            <span class="timer"><?php the_sub_field('number_for_item_home'); ?></span>
                            <hr>
                            <h4><?php the_sub_field('number_item_label_home'); ?></h4>
                        </div>
                    </div>
                        <?php

                        endwhile;
                    endif;  ?>
                <?php elseif (get_field('enable_section_numbers') =='service') : ?>
                    <h2><?php the_field('service_section_title'); ?></h2>
                <div class="col-md-12">
                    <?php the_field('service_section_content'); ?>
                </div>
                <?php endif; ?>
                <div class="col-md-12">
                    <div class="quote-block">
                        <span><i class="fa fa-quote-left" aria-hidden="true"></i></span>
                        <span><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                        <h5><?php the_field('slogan_homepage'); ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();