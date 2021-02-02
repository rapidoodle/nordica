<?php
if (!function_exists('consultant_lite_banner_slider_args')) :
    /**
     * Banner Slider Details
     *
     * @since conslutant-lite 1.0.0
     *
     * @return array $qargs Slider details.
     */
    function consultant_lite_banner_slider_args()
    {
        $consultant_lite_banner_slider_number = absint(consultant_lite_get_option('number_of_home_slider'));
        $consultant_lite_banner_slider_from = esc_attr(consultant_lite_get_option('select_slider_from'));
        switch ($consultant_lite_banner_slider_from) {
            case 'from-page':
                $consultant_lite_banner_slider_page_list_array = array();
                for ($i = 1; $i <= $consultant_lite_banner_slider_number; $i++) {
                    $consultant_lite_banner_slider_page_list = consultant_lite_get_option('select_page_for_slider_' . $i);
                    if (!empty($consultant_lite_banner_slider_page_list)) {
                        $consultant_lite_banner_slider_page_list_array[] = absint($consultant_lite_banner_slider_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($consultant_lite_banner_slider_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => esc_attr($consultant_lite_banner_slider_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $consultant_lite_banner_slider_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $consultant_lite_banner_slider_category = esc_attr(consultant_lite_get_option('select_category_for_slider'));
                $qargs = array(
                    'posts_per_page' => esc_attr($consultant_lite_banner_slider_number),
                    'post_type' => 'post',
                    'cat' => $consultant_lite_banner_slider_category,
                );
                return $qargs;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;


if (!function_exists('consultant_lite_banner_slider')) :
    /**
     * Banner Slider
     *
     * @since conslutant-lite 1.0.0
     *
     */
    function consultant_lite_banner_slider()
    {
        if (1 != consultant_lite_get_option('show_slider_section')) {
            return null;
        }
        $consultant_lite_slider_button_text = esc_html(consultant_lite_get_option('button_text_on_slider'));
        $consultant_lite_slider_excerpt_number = absint(consultant_lite_get_option('number_of_content_home_slider'));
        $consultant_lite_banner_slider_args = consultant_lite_banner_slider_args();
        $consultant_lite_banner_slider_query = new WP_Query($consultant_lite_banner_slider_args); ?>

        <!-- main banner slider section -->
        <div class="tm-banner-section" id="tm-banner">
            <?php $rtl_class = 'false';
            if(is_rtl()){ 
                $rtl_class = 'true';
            }?>
            <div class="tm-banner-slider-section" data-slick='{"rtl": <?php echo esc_attr($rtl_class); ?>}'>
                <?php
                if ($consultant_lite_banner_slider_query->have_posts()) :
                    while ($consultant_lite_banner_slider_query->have_posts()) : $consultant_lite_banner_slider_query->the_post();
                        if (has_post_thumbnail()) {
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                            $url = $thumb['0'];
                        } else {
                            $url = NULL;
                        }

                        if (has_excerpt()) {
                            $consultant_lite_slider_content = get_the_excerpt();
                        } else {
                            $consultant_lite_slider_content = consultant_lite_words_count($consultant_lite_slider_excerpt_number, get_the_content());
                        }
                        ?>
                        <!-- slide items -->
                        <div class="tm-banner-slider-wrapper">
                            <div class="tm-banner-slider">
                                <?php $consultant_lite_slider_overlay = esc_attr(consultant_lite_get_option('select_slider_section_overlay'));
                                switch ($consultant_lite_slider_overlay) {
                                    case 'no-overlay':
                                        $consultant_lite_slider_overlay = 'no-overlay';
                                    break;
                                    case 'color-overlay':
                                        $consultant_lite_slider_overlay = 'tm-overlay';
                                    break;
                                    case 'pattern-overlay':
                                        $consultant_lite_slider_overlay = 'tm-overlay-pattern';
                                    break;

                                    default:
                                    break;
                                }
                                ?>
                                <div class="tm-image-section bg-image <?php echo esc_attr($consultant_lite_slider_overlay); ?>">
                                    <img src="<?php echo esc_url($url); ?>" alt="">
                                </div>
                                <div class="tm-wrapper">
                                    <h3 class="tm-post-title tm-post-title-xl"><a class="tm-text-white-color tm-text-hover-color"href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <!-- content -->
                                    <p><?php echo wp_kses_post($consultant_lite_slider_content); ?></p>
                                    <!-- button -->
                                    <?php if (!empty ($consultant_lite_slider_button_text)) { ?>
                                        <div class="tm-btn-section">
                                            <a class="tm-btn-white tm-btn-md" href="<?php the_permalink(); ?>"><?php echo esc_html($consultant_lite_slider_button_text); ?><i class="ion ion-md-arrow-forward"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- title -->
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
            <?php if (1 == consultant_lite_get_option('enable_slider_border_svg')) { ?>
                <div class="tm-svg tm-svg-multiple-layer">
                    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 435">    
                        <path class="tm-layer-1" d="M1920,435.1H0V49c32.8,32,92.7,82.1,180,108.3C486.8,249.6,554.4-28.5,918,9.1C1152.9,33.4,1328.5,180,1602,176 c137.7-2,248.9-43,318-75C1920,229.7,1920,306.4,1920,435.1z"></path>
                        <path class="tm-layer-2" d="M1920,288.1c-228,42-357.8,100.5-489,54c-254.1-90-325.1-324.6-603-315C619.8,34.3,532.8,150,280.5,228.8	c-136.7,42.7-178-42.7-280.5-48.6v255h1920V288.1z"></path>
                        <path class="tm-layer-3" d="M1920,435.1H0v-215c81,5,135,77,243,41c199.3-66.4,294.5-143.1,405-162c315-54,384.2,131.1,585,207 c165,62.4,385,129,687-120C1920,236.1,1920,385.1,1920,435.1z"></path>    
                    </svg>
                </div>
            <?php } ?>
        </div>

        <?php
    }
endif;

add_action('consultant_lite_action_front_page_slider', 'consultant_lite_banner_slider', 10);