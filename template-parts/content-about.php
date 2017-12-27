<?php
/*
 Template Name: About
 */
get_header(); ?>

    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                    <div class="img-wrap">
                        <div class="imgbody">
                            <?php
                            $image = get_field('your_img_about');
                            if( !empty($image) ): ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                    <div class="wrap-text">
                        <div class="headblock">
                            <h1><?php the_field('name_about'); ?></h1>
                            <p><?php the_field('specialization_about'); ?></p>
                        </div>
                        <div class="textblock">
                            <?php the_field('editor_about_you'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php if( have_rows('add_employees_about') ):
    while ( have_rows('add_employees_about') ) : the_row(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                    <div class="img-wrap">
                        <div class="imgbody">
                            <?php
                            $image = get_sub_field('image_for_employee');
                            if( !empty($image) ): ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                    <div class="wrap-text">
                        <div class="headblock">
                            <h1><?php the_sub_field('name_employees_about'); ?></h1>
                            <p><?php the_sub_field('specialization_employees_about'); ?></p>
                        </div>
                        <div class="textblock">
                            <?php the_sub_field('editor_about_employees_information'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <?php
    endwhile;
endif;  ?>
<?php
get_footer();
