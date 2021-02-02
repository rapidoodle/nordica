<?php
if (!function_exists('consultant_lite_contact_section')) :
    /**
     * Tab contact Details
     *
     * @since consultant-lite 1.0.0
     *
     */
    function consultant_lite_contact_section()
    {
        $consultant_lite_contact_details = consultant_lite_get_option('show_top_contact_details');
        $consultant_lite_contact_social_nav = consultant_lite_get_option('show_social_nav');
        if (1 != consultant_lite_get_option('show_contact_section')) {
            return null;
        }
        $consultant_lite_contact_form_code = wp_kses_post(consultant_lite_get_option('contact_form_shortcode'));
        ?>
        
       
        <section class="tm-contact-section tm-section-border" id="tm-contact">
                <div class="tm-d-flex">
                    <?php  if (!empty($consultant_lite_contact_form_code)) { ?>
                        <div class="tm-col-12 tm-col-md-6 tm-no-space">
                            <div class="tm-contact tm-bg-blue-gray">
                                <h2 class="tm-section-title"><?php echo wp_kses_post(consultant_lite_get_option('main_title_contact_section')); ?></h2>
                                <div class="tm-contact-form">
                                    <?php echo (do_shortcode($consultant_lite_contact_form_code)); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php  
                    $consultant_lite_contact_form_abs = '';
                    if (!empty($consultant_lite_contact_form_code)) { 
                        $consultant_lite_contact_form_abs = 'tm-col-md-6';
                    } ?>
                    <div class="tm-col-12 <?php echo esc_attr($consultant_lite_contact_form_abs); ?> tm-no-space">
                        <div class="tm-google-map-section">
                            <div class="tm-w-100">
                                <div class="tm-address-with-social-section">
                                    <div class="tm-wrapper">
                                        <?php if ($consultant_lite_contact_details == 1) { ?>
                                            <!-- Address -->
                                            <div class="tm-contact-address-section">
                                                <!-- location -->
                                                <div class="tm-address">
                                                    <div class="tm-icon-section">
                                                        <i class="ion ion-ios-pin"></i>
                                                    </div>
                                                    <div class="tm-desc">
                                                        <?php echo esc_html(consultant_lite_get_option('top_header_location'));?>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <!-- telephone -->
                                                <div class="tm-telephone">
                                                    <div class="tm-icon-section">
                                                        <i class="ion ion-ios-call"></i>
                                                    </div>
                                                    <div class="tm-desc">
                                                        <a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( consultant_lite_get_option('top_header_telephone') ) ); ?>">
                                                            <?php echo esc_attr( consultant_lite_get_option('top_header_telephone') ); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- email -->
                                                <div class="tm-email">
                                                    <div class="tm-icon-section">
                                                        <i class="ion ion-ios-mail"></i>
                                                    </div>
                                                    <div class="tm-desc">
                                                        <a href="mailto:<?php echo esc_attr(consultant_lite_get_option('top_header_email') ); ?>">
                                                            <?php echo esc_attr( antispambot(consultant_lite_get_option('top_header_email'))); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div><!--/tm-contact-address-section-->
                                        <?php } ?>
    
                                        <div class="tm-contact-social-section">
                                            <!-- social nav -->
                                            <?php if ($consultant_lite_contact_social_nav == 1) { ?>
                                                <?php wp_nav_menu(
                                                    array('theme_location' => 'social-menu',
                                                        'link_before' => '<span>',
                                                        'link_after' => '</span>',
                                                        'menu_id' => 'social-menu',
                                                        'fallback_cb' => false,
                                                        'menu_class'=> 'tm-social-icons tm-social-icons-no-text tm-social-icons-rounded'
                                                )); ?>
                                            <?php } ?>
                                        </div><!--/tm-contact-social-section-->
                                    </div>
                                </div>
                                <?php
                                $consultant_lite_google_map_code = wp_kses_post(consultant_lite_get_option('google_map_shortcode'));
                                    if (!empty($consultant_lite_google_map_code)) { ?>
                                        <div class="tm-map clearfix">
                                            <?php echo (do_shortcode($consultant_lite_google_map_code)); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                    </div>
                </div>
        </section>
        <!-- End Google Map -->
        <?php
    }
endif;
add_action('consultant_lite_action_front_page_contact', 'consultant_lite_contact_section',10);
