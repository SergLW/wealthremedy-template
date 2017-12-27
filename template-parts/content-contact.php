<?php
/*
 Template Name: Contacts
 */
get_header(); ?>

    <section class="contactus">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h2><?php the_field('first_title_contact_information'); ?></h2>
                        </div>
                        <?php the_field('contact_form_contacts_page'); ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-info">
                        <div class="contact-title">
                            <h2><?php the_field('second_title_contact_information'); ?></h2>
                        </div>
                        <div class="contact-address-wrap">
                            <div class="addr-item">
                                <span class="icon-container"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                <p><?php the_field('address-contacts','option'); ?></p>
                            </div>
                            <div class="addr-item">
                                <span class="icon-container"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <p><?php the_field('phone_contact_page','option'); ?></p>
                            </div>
                            <div class="addr-item">
                                <span class="icon-container"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                <p><a href="mailto:<?php the_field('e-mail-contacts','option'); ?>" class="mailo"><?php the_field('e-mail-contacts','option'); ?></a></p>
                            </div>
                        <?php if( get_field('showhide_social') ): ?>
                            <div class="social">
                                <div class="contact-title">
                                    <h2><?php the_field('social_title_contact_information'); ?></h2>
                                </div>
                                <div class="addr-item">
                                    <p>
                                        <?php if( get_field('enable_facebook','option') ): ?>
                                            <a href="<?php the_field('facebook','option'); ?>" class="facebook img-circle"><span class="soc fa fa-facebook-f"></span></a>
                                        <?php endif; ?>
                                        <?php if( get_field('enable_twitter','option') ): ?>
                                            <a href="<?php the_field('twitter','option'); ?>" class="twitter img-circle"><span class="soc fa fa-instagram"></span></a>
                                        <?php endif; ?>
                                        <?php if( get_field('enable_linkedin','option') ): ?>
                                            <a href="<?php the_field('linkedin','option'); ?>" class="linkedin img-circle"><span class="soc fa fa-linkedin"></span></a>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
