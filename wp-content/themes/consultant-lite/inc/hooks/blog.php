<?php
if (!function_exists('consultant_lite_blog')) :
    /**
     * blog
     *
     * @since Consultant Lite 1.0.0
     *
     */
    function consultant_lite_blog()
    {
        $consultant_lite_blog_excerpt_number = absint(consultant_lite_get_option('number_of_excerpt_home_blog'));
        $consultant_lite_blog_category = esc_attr(consultant_lite_get_option('select_category_for_blog'));
        if (1 != consultant_lite_get_option('show_blog_section')) {
            return null;
        }
        ?>
        <section class="tm-blog-section tm-section-border tm-section-bg-color" id="tm-blog">
            <div class="container">
                <h2 class="tm-section-title tm-section-title-with-dashed"><span><?php echo esc_html(consultant_lite_get_option('main_title_blog_section')); ?></span></h2>
                <!-- blog content -->
                <?php $rtl_class = 'false';
                if(is_rtl()){ 
                    $rtl_class = 'true';
                }?>
                <div class="tm-blog-list tm-blog-slider" data-slick='{"rtl": <?php echo esc_attr($rtl_class); ?>}'>
                    <?php
                    $consultant_lite_home_blog_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'cat' => $consultant_lite_blog_category,
                        'ignore_sticky_posts' => 1,
                    );
                    $consultant_lite_home_about_post_query = new WP_Query($consultant_lite_home_blog_args);
                    if ($consultant_lite_home_about_post_query->have_posts()) :
                        while ($consultant_lite_home_about_post_query->have_posts()) : $consultant_lite_home_about_post_query->the_post();
                            if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'medium-large');
                                $url = $thumb['0'];
                            } else {
                                $url = '';
                            }
                            $consultant_lite_blog_content = '';
                            if (has_excerpt()) {
                                $consultant_lite_blog_content = get_the_excerpt();
                            } else {
                                $consultant_lite_blog_content = consultant_lite_words_count($consultant_lite_blog_excerpt_number, get_the_content());
                            }
                            ?>
                            <div class="tm-blog">
                                <div class="tm-image-section bg-image">
                                    <a href="<?php the_permalink(); ?>"></a>
                                    <img src="<?php echo esc_url($url); ?>">
                                    <div class="tm-date">
                                        <div class="tm-ribbon">
                                            <div class="tm-month"><?php echo esc_html(get_the_date('M'));?></div>
                                            <div class="tm-day"><?php echo esc_html(get_the_date('j')); ?></div>
                                        </div>
                                       
                                    </div>
                                    <svg class="tm-svg tm-svg-single-layer" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 800 104.5">
                                        <path class="tm-layer-1" d="M-1,24.3c187-68.7,303,43.3,479.2,80.2H-1V24.3z"></path>
                                        <path class="tm-layer-2" d="M-1,49.4c36.2,33.5,113.4,55.1,190.5,55.1c131.1,0,181.7-23.1,273.4-55.1S667.1-13.1,803,8.5v96H-1V49.4z"></path>
                                    </svg>
                                </div>
                                <div class="tm-desc tm-bg-white">
                                    <h3 class="tm-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>  
                                    <div class="tm-caption">
                                        <p>
                                        <?php echo wp_kses_post($consultant_lite_blog_content); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            wp_reset_postdata();
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action('consultant_lite_action_front_page_blog', 'consultant_lite_blog', 10);