<?php
if (!function_exists('consultant_lite_about_section')) :
    /**
     * Tab callback Details
     *
     * @since consultant-lite 1.0.0
     *
     */
    function consultant_lite_about_section()
    {
        $consultant_lite_about_button_text = esc_html(consultant_lite_get_option('button_text_on_about'));
        $consultant_lite_about_excerpt_number = absint(consultant_lite_get_option('number_of_content_home_about'));
        $consultant_lite_about_page = array();
        $consultant_lite_about_page[] = esc_attr(consultant_lite_get_option('select_page_for_about'));
        if (1 != consultant_lite_get_option('show_about_section')) {
            return null;
        }
        if (!empty($consultant_lite_about_page)) {
            $consultant_lite_about_page_args = array(
                'post_type' => 'page',
                'post__in' => $consultant_lite_about_page,
                'orderby' => 'post__in'
            );
        }
        if (!empty($consultant_lite_about_page_args)) {
            $consultant_lite_about_page_query = new WP_Query($consultant_lite_about_page_args);
            while ($consultant_lite_about_page_query->have_posts()): $consultant_lite_about_page_query->the_post();
                if (has_excerpt()) {
                    $consultant_lite_about_main_content = get_the_excerpt();
                } else {
                    $consultant_lite_about_main_content = consultant_lite_words_count($consultant_lite_about_excerpt_number , get_the_content());
                }
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                $url = $thumb['0'];
                ?>
                <!--About Starts-->
                <?php 
                $tm_border_svg = "tm-about-svg-disable";
                    if (1 == consultant_lite_get_option('enable_about_border_svg')) {
                        $tm_border_svg = "tm-svg-enable";
                    }
                ?>
                <section class="tm-about-section  tm-section-border <?php echo esc_attr($tm_border_svg); ?>" id="tm-about">
                    <div class="container">
                        <div class="tm-row">
                            <div class="tm-col-12 tm-col-md-6">
                                <div class="tm-image-section-wrapper">
                                    <div class="tm-image-section bg-image tm-overlay">
                                        <?php if (has_post_thumbnail()){ ?>
                                            <img src="<?php echo esc_url($url); ?>">
                                        <?php } ?>
                                        <?php if (!empty(consultant_lite_get_option('video_url_to_pop_up'))) { ?>
                                            <div class="tm-post-format" id="video">
                                                <i class="ion ion-ios-play"></i>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tm-col-12 tm-col-md-6">
                                <div class="tm-desc">
                                    <h2 class="tm-section-title tm-section-title-with-dashed"><span><?php the_title(); ?></span></h3>
                                    <p><?php echo esc_html($consultant_lite_about_main_content); ?></p>
                                    <?php if (!empty ($consultant_lite_about_button_text)) { ?>
                                        <div class="tm-btn-section">
                                            <a class="tm-btn-border" href="<?php the_permalink(); ?>"><?php echo esc_html($consultant_lite_about_button_text); ?> <i class="ion ion-md-arrow-forward"></i></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div id="tm-video" class="tm-video-section">
                    <div class="tm-video-wrapper">
                        <div class="tm-video">
                            <div class="tm-close-icon-section" id="video-close">
                                <span class="tm-close-icon tm-close-icon-white">
                                    <span></span>
                                    <span></span>
                                </span>
                            </div>
                            <?php 
                            $video_url =  esc_url(consultant_lite_get_option('video_url_to_pop_up'));
                            if( strpos( $video_url, 'youtube') != false ){
                                parse_str(parse_url($video_url, PHP_URL_QUERY), $array_of_video);
                                $video_id = $array_of_video['v'];
                                $video_url_only = esc_url('https://www.youtube.com/embed/'.$video_id);
                
                            }elseif( strpos( $video_url, 'vimeo') != false ){
                
                                $vime_url_parts = explode("/", parse_url($video_url, PHP_URL_PATH));
                                $video_id = (int)$vime_url_parts[count($vime_url_parts)-1];
                
                                $video_url_only = esc_url('https://player.vimeo.com/video/'.$video_id);
                
                            }
                            ?>
                
                            <div id="about-video" src="<?php echo esc_url($video_url_only); ?>"></div>
                        </div>
                    </div>
                </div>
                <!--About Ends-->
            <?php endwhile;
            wp_reset_postdata();
        } ?>
        <?php
    }
endif;
add_action('consultant_lite_action_front_page_about', 'consultant_lite_about_section', 10);