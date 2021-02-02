<?php
if (!function_exists('consultant_lite_callback_section')) :
    /**
     * Tab callback Details
     *
     * @since consultant-lite 1.0.0
     *
     */
    function consultant_lite_callback_section()
    {
        $consultant_lite_callback_button_enable = consultant_lite_get_option('show_page_link_button');
        $consultant_lite_callback_button_text = consultant_lite_get_option('callback_button_text');
        $consultant_lite_callback_button_url = consultant_lite_get_option('callback_button_link');
        $consultant_lite_callback_excerpt_number = absint(consultant_lite_get_option('number_of_content_home_callback'));
        $consultant_lite_callback_page = array();
        $consultant_lite_callback_page[] = esc_attr(consultant_lite_get_option('select_callback_page'));
        if (1 != consultant_lite_get_option('show_our_callback_section')) {
            return null;
        }
        if (!empty($consultant_lite_callback_page)) {
            $consultant_lite_callback_page_args = array(
                'post_type' => 'page',
                'post__in' => $consultant_lite_callback_page,
                'orderby' => 'post__in'
            );
        }
        if (!empty($consultant_lite_callback_page_args)) {
            $consultant_lite_callback_page_query = new WP_Query($consultant_lite_callback_page_args);
            while ($consultant_lite_callback_page_query->have_posts()): $consultant_lite_callback_page_query->the_post();
                if (has_excerpt()) {
                    $consultant_lite_callback_main_content = get_the_excerpt();
                } else {
                    $consultant_lite_callback_main_content = consultant_lite_words_count($consultant_lite_callback_excerpt_number , get_the_content());
                }
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                $url = $thumb['0'];
                ?>
                <!--CTA Starts-->
                <?php $consultant_lite_cta_overlay = esc_attr(consultant_lite_get_option('select_callback_section_overlay'));
                switch ($consultant_lite_cta_overlay) {
                    case 'no-overlay':
                        $consultant_lite_cta_overlay = 'no-overlay';
                    break;
                    case 'color-overlay':
                        $consultant_lite_cta_overlay = 'tm-overlay';
                    break;
                    case 'pattern-overlay':
                        $consultant_lite_cta_overlay = 'tm-overlay-pattern';
                    break;

                    default:
                    break;
                }
                ?>
                <section class="tm-call-to-action" id="tm-call-to-action"> 
                    <div class="tm-image-section data-bg <?php echo esc_attr($consultant_lite_cta_overlay); ?>" data-background="<?php if (has_post_thumbnail()){ echo esc_url($url); } ?>">

                    </div>
                    <div class="container tm-text-center tm-desc">
                        <h3 class="tm-post-title tm-post-title-xl"><a href="<?php the_permalink();?>" class="tm-text-white-color tm-text-hover-color"><?php the_title(); ?></a></h3>
                        <p><?php echo esc_html($consultant_lite_callback_main_content); ?></p>
                        <div class="tm-btn-section">
                            <?php if (!empty($consultant_lite_callback_button_text)) { ?>
                                <a class="tm-btn-white tm-btn-md" href="<?php echo esc_url($consultant_lite_callback_button_url ); ?>">
                                    <?php echo esc_html($consultant_lite_callback_button_text); ?><i class="ion ion-md-arrow-forward"></i>
                                </a>
                            <?php } ?>
                            <?php if ($consultant_lite_callback_button_enable == 1) { ?>
                                <a class="tm-btn-primary tm-btn-md" href="<?php the_permalink();?>" ><?php _e( 'View More', 'consultant-lite' ); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                 
                    <?php if (1 == consultant_lite_get_option('enable_callback_border_svg')) { ?>
                        <div class="tm-svg tm-svg-multiple-layer">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 435">    
                                <path class="tm-layer-1" d="M1920,435.1H0V49c32.8,32,92.7,82.1,180,108.3C486.8,249.6,554.4-28.5,918,9.1C1152.9,33.4,1328.5,180,1602,176 c137.7-2,248.9-43,318-75C1920,229.7,1920,306.4,1920,435.1z"></path>
                                <path class="tm-layer-2" d="M1920,288.1c-228,42-357.8,100.5-489,54c-254.1-90-325.1-324.6-603-315C619.8,34.3,532.8,150,280.5,228.8	c-136.7,42.7-178-42.7-280.5-48.6v255h1920V288.1z"></path>
                                <path class="tm-layer-3" d="M1920,435.1H0v-215c81,5,135,77,243,41c199.3-66.4,294.5-143.1,405-162c315-54,384.2,131.1,585,207 c165,62.4,385,129,687-120C1920,236.1,1920,385.1,1920,435.1z"></path>    
                            </svg>
                        </div>
                    <?php } ?>
                </section>
                <!--CTA Ends-->
            <?php endwhile;
            wp_reset_postdata();
        } ?>
        <?php
    }
endif;
add_action('consultant_lite_action_front_page_cta', 'consultant_lite_callback_section', 10);
?>
