<?php
if (!function_exists('consultant_lite_testimonial')) :
    /**
     * Testimonial
     *
     * @since consultant-lite 1.0.0
     *
     */
    function consultant_lite_testimonial()
    {
        if (1 != consultant_lite_get_option('show_testimonial_section')) {
            return null;
        }
        $consultant_lite_testimonial_excerpt_number = absint(consultant_lite_get_option('number_of_content_home_testimonial'));
        $consultant_lite_testimonial_number = absint(consultant_lite_get_option('number_of_home_testimonial'));

        $consultant_lite_testimonial_from = esc_attr(consultant_lite_get_option('select_testimonial_from'));
        switch ($consultant_lite_testimonial_from) {
            case 'from-page':
                $consultant_lite_testimonial_page_list_array = array();
                for ($i = 1; $i <= $consultant_lite_testimonial_number; $i++) {
                    $consultant_lite_testimonial_page_list = consultant_lite_get_option('select_page_for_testimonial_' . $i);
                    if (!empty($consultant_lite_testimonial_page_list)) {
                        $consultant_lite_testimonial_page_list_array[] = absint($consultant_lite_testimonial_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($consultant_lite_testimonial_page_list_array)) {
                    return;
                }
                /*page query*/
                $consultant_lite_testimonial_args = array(
                    'posts_per_page' => esc_attr($consultant_lite_testimonial_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $consultant_lite_testimonial_page_list_array,
                );
            break;

            case 'from-category':
                $consultant_lite_blog_category = absint(consultant_lite_get_option('select_category_for_testimonial'));

                $consultant_lite_testimonial_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => absint($consultant_lite_testimonial_number),
                    'cat' => absint($consultant_lite_blog_category),
                    'ignore_sticky_posts' => 1,
                );
            break;

            default:
            break;
        }



        $consultant_lite_testimonial_query = new WP_Query($consultant_lite_testimonial_args); ?>
        <div class="tm-testimonial-section tm-section-border" id="tm-testimonial">
            <?php $consultant_lite_testimonial_overlay = esc_attr(consultant_lite_get_option('select_testimonial_section_overlay'));
            switch ($consultant_lite_testimonial_overlay) {
                case 'no-overlay':
                    $consultant_lite_testimonial_overlay = 'no-overlay';
                break;
                case 'color-overlay':
                    $consultant_lite_testimonial_overlay = 'tm-overlay';
                break;
                case 'pattern-overlay':
                    $consultant_lite_testimonial_overlay = 'tm-overlay-pattern';
                break;

                default:
                break;
            }
            ?>
            <div class="tm-bg-image-section data-bg <?php echo esc_attr($consultant_lite_testimonial_overlay); ?>" data-background="<?php echo esc_url(consultant_lite_get_option('testimonial_section_background_image')); ?>"></div>
            <div class="container">
                <h2 class="tm-section-title tm-text-center"><?php echo wp_kses_post(consultant_lite_get_option('title_testimonial_section')); ?></h2>
                <?php $rtl_class = 'false';
                if(is_rtl()){ 
                    $rtl_class = 'true';
                }?>
                <div class="tm-testimonial-slider"  data-slick='{"rtl": <?php echo esc_attr($rtl_class); ?>}'>
                    <?php
                    if ($consultant_lite_testimonial_query->have_posts()) :
                        while ($consultant_lite_testimonial_query->have_posts()) : $consultant_lite_testimonial_query->the_post();
                            if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium');
                                $url = $thumb['0'];
                            } else {
                                $url = '';
                            }
                            if (has_excerpt()) {
                                $consultant_lite_testimonial_content = get_the_excerpt();
                            } else {
                                $consultant_lite_testimonial_content = consultant_lite_words_count($consultant_lite_testimonial_excerpt_number, get_the_content());
                            }
                            ?>
                            <div class="tm-testimonial">
                                <?php if (!empty($url)) { ?>
                                    <div class="tm-image-section">
                                        <div class="tm-wrapper bg-image tm-overlay-image-hover">
                                            <a href="<?php the_permalink(); ?>"></a>
                                            <img src="<?php echo esc_url($url); ?>" alt="" class="img-circle"/>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="tm-desc tm-text-center">
                                    <h3 class="tm-post-title"><a href="<?php the_permalink(); ?>" class="tm-text-white-color tm-text-hover-shade-color"><?php the_title(); ?></a></h3>
                                    <div class="tm-icon-section">
                                        <div class="tm-wrapper">
                                            <i class="ion ion-md-quote"></i>
                                        </div>
                                    </div>
                                    <div class="tm-caption">
                                        <p><?php echo wp_kses_post($consultant_lite_testimonial_content); ?></p>
                                    </div>
                                    <div class="tm-btn-section">
                                        <a class="tm-readmore-btn tm-btn-border tm-text-white-color tm-text-hover-shade-color" href='<?php the_permalink(); ?>'>
                                            <?php esc_html_e('Learn More', 'consultant-lite'); ?> 
                                            <i class="ion ion-md-arrow-round-forward"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
        <!-- End Testmonial -->
        <?php
    }
endif;
add_action('consultant_lite_action_front_page_testimonial', 'consultant_lite_testimonial', 10);