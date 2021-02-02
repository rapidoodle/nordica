<?php
if (!function_exists('consultant_lite_service_args')) :
    /**
     * Banner Service Section Details
     *
     * @since conslutant-lite 1.0.0
     *
     * @return array $qargs Service Section details.
     */
    function consultant_lite_service_args()
    {
        $consultant_lite_service_page_list_array = array();
        for ($i = 1; $i <= 6; $i++) {
            $consultant_lite_service_page_list = consultant_lite_get_option('select_page_for_service_' . $i);
            if (!empty($consultant_lite_service_page_list)) {
                $consultant_lite_service_page_list_array[] = absint($consultant_lite_service_page_list);
            }
        }
        // Bail if no valid pages are selected.
        if (empty($consultant_lite_service_page_list_array)) {
            return;
        }
        /*page query*/
        $qargs = array(
            'posts_per_page' => 6,
            'orderby' => 'post__in',
            'post_type' => 'page',
            'post__in' => $consultant_lite_service_page_list_array,
        );
        return $qargs;
    }
endif;


if (!function_exists('consultant_lite_service')) :
    /**
     * Banner Service Section
     *
     * @since conslutant-lite 1.0.0
     *
     */
    function consultant_lite_service()
    {
        if (1 != consultant_lite_get_option('show_service_section')) {
            return null;
        }
        $consultant_lite_service_image_enable = absint(consultant_lite_get_option('show_service_feature_img'));
        $consultant_lite_service_button_text = esc_html(consultant_lite_get_option('button_text_on_service'));

        $consultant_lite_service_excerpt_number = absint(consultant_lite_get_option('number_of_content_home_service'));
        $consultant_lite_service_args = consultant_lite_service_args();
        $consultant_lite_service_query = new WP_Query($consultant_lite_service_args); ?>

        <!-- main service section -->
        <div class="tm-service-section tm-section-border" id="tm-service">
            <div class="container">
                <h2 class="tm-section-title tm-section-title-with-dashed"><span> <?php echo esc_html(consultant_lite_get_option('service_section_title'));?></span></h2>
                <div class="tm-service-list tm-row">
                    <?php
                    $j = 1;
                    if ($consultant_lite_service_query->have_posts()) :
                        while ($consultant_lite_service_query->have_posts()) : $consultant_lite_service_query->the_post();
                            $totalpost = $consultant_lite_service_query->found_posts; 
                            if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'conslutant-lite-service-image');
                                $url = $thumb['0'];
                            } else {
                                $url = NULL;
                            }
                            if (has_excerpt()) {
                                $consultant_lite_service_content = get_the_excerpt();
                            } else {
                                $consultant_lite_service_content = consultant_lite_words_count($consultant_lite_service_excerpt_number, get_the_content());
                            }
                            $consultant_lite_service_icon = consultant_lite_get_option('number_of_home_service_icon_' . $j);
                            ?>
                            <!-- slide items -->
                            <div class="tm-col-4">
                                <?php 
                                $consultant_iamge = 'tm-service-with-icon';
                                if ($consultant_lite_service_image_enable == 1) {
                                    $consultant_iamge = 'tm-service-with-image';
                                } ?>
                                <div class="tm-service <?php echo esc_attr($consultant_iamge); ?> tm-bg-light-gray">
                                    <?php if ($consultant_lite_service_image_enable == 1) { ?>
                                        <div class="tm-image-section  bg-image">
                                            <a href="<?php the_permalink(); ?>"></a>
                                            <img src="<?php echo esc_url($url); ?>">
                                        </div>
                                    <?php } else { ?>
                                        <div class="tm-icon">
                                            <i class="ion <?php echo esc_attr($consultant_lite_service_icon); ?>"></i>
                                        </div>
                                    <?php } ?>

                                    <h3 class="tm-post-title"><?php the_title(); ?></h4>
                                    <p><?php echo wp_kses_post($consultant_lite_service_content); ?></p>
                                    <?php if (!empty($consultant_lite_service_button_text)) { ?>
                                        <div class="tm-btn-section">
                                            <a class="tm-btn-border" href="<?php the_permalink(); ?>"><?php echo esc_html($consultant_lite_service_button_text); ?> <i class="ion ion-md-arrow-forward"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                            $j++;
                        endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>

        <?php
    }
endif;

add_action('consultant_lite_action_front_page_service', 'consultant_lite_service', 10);