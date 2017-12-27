<?php
/*
 Template Name: Process
 */
get_header(); ?>

    <section class="process-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php the_field('main_text_for_page'); ?>
                    <div class="row">
                        <div class="pocess-diagram">
                            <?php if( have_rows('process_line') ):
                                $i = 1;
                                while ( have_rows('process_line') ) : the_row(); ?>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 col-xxs-6">
                                    <?php if( $i == 1 ) : ?>
                                        <div class="process-item-body-f">
                                    <?php elseif ( $i == 6 ) : ?>
                                        <div class="process-item-body-l">
                                    <?php else : ?>
                                        <div class="process-item-body">
                                    <?php endif; ?>
                                            <h4><?php the_sub_field('title_process'); ?></h4>
                                        </div>
                                    </div>
                                <?php
                                    $i++;
                                    endwhile;
                                     endif;
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="parallax4 process-details" style="background-image: url(<?php the_field('background_process_image'); ?>);">
        <?php if( have_rows('process_line') ):
        $i = 1;
        while ( have_rows('process_line') ) : the_row(); ?>
                <div class="<?php the_sub_field('background_colors_process'); ?>">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php if( $i % 2 == 0 ): ?> col-sm-push-6 <?php endif; ?>">
                                <div class="text-wrap">
                                    <span></span>
                                    <div class="wrap2">
                                        <h2><?php the_sub_field('title_process'); ?></h2>
                                        <?php the_sub_field('description_process'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php if( $i % 2 == 0 ): ?> col-sm-pull-6 <?php endif; ?>">
                                <div class="img-wrap">
                                    <div class="img-cont">
                                        <img src="<?php the_sub_field('img_for_current_process'); ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            $i++;
            endwhile;
        endif;  ?>


    </section>

<?php
get_footer();
