<?php
if (!function_exists('consultant_lite_portfolio_section')) :
    /**
     * Tab portfolio Details
     *
     * @since consultant-lite 1.0.0
     *
     */
    function consultant_lite_portfolio_section()
    {
        ?>
        <!-- portfolio section start -->
        <?php if (1 != consultant_lite_get_option('show_portfolio_section')) {
            return null;
        }
        ?>
                    
        <?php $consultant_lite_portfolio_category_list_array = array();
        for ($i = 1; $i <= 6; $i++) {
            $consultant_lite_portfolio_category_list = consultant_lite_get_option('select_category_for_portfolio_' . $i);
            if (!empty($consultant_lite_portfolio_category_list)) {
                $consultant_lite_portfolio_category_list_array[] = absint($consultant_lite_portfolio_category_list);
            }
        }
        $consultant_lite_portfolio_args = array();
        
        $consultant_lite_number_of_home_portfolio = absint(consultant_lite_get_option('number_of_home_portfolio'));

        if( !empty( $consultant_lite_portfolio_category_list_array) ){
            $consultant_lite_portfolio_args = array(
                'post_type' => 'post',
                'cat' => $consultant_lite_portfolio_category_list_array,
                'ignore_sticky_posts' => true,
                'posts_per_page' => absint($consultant_lite_number_of_home_portfolio),
            );
        } ?>

        <div class="tm-portfolio-section portfolio-masonry tm-section-border tm-section-bg-color" id="tm-portfolio">
            <div class="container">
                <h2 class="tm-section-title tm-section-title-with-dashed"><span><?php echo esc_html(consultant_lite_get_option('main_title_portfolio_section')); ?></span></h2>
                <ul class="filter-group tm-font-semi-bold">
                    <li><span class="filter active" data-filter="*"> <?php esc_html_e('Show All','consultant-lite') ?></span></li>
                    <?php for ($j=0; $j < count($consultant_lite_portfolio_category_list_array) ; $j++) {
                        $consultant_lite_category = get_cat_name( $consultant_lite_portfolio_category_list_array[$j]);
                        $consultant_lite_category_id = get_cat_id($consultant_lite_category);
                        if (!empty($consultant_lite_category)) { ?>
                            <li><span class="filter" data-filter=".<?php echo esc_attr('cat-'.$consultant_lite_category_id)?>"><?php echo esc_html( $consultant_lite_category, 'consultant-lite' )?></span></li>
                        <?php }     
                    } ?>

                    <li>
                        <?php 
                        $consultant_lite_portfolio_button_text = consultant_lite_get_option('portfolio_button_text');
                        if (!empty($consultant_lite_portfolio_button_text)) { ?>
                            <a href="<?php echo esc_url(consultant_lite_get_option('portfolio_button_link')); ?>">
                                <?php echo esc_html(consultant_lite_get_option('portfolio_button_text')); ?>
                            </a>
                            
                        <?php } ?>
                    </li>
                </ul>
                <div id="portfolio-grid" class="tm-portfolio-list clearfix masonry">
                    <?php 
                    $consultant_lite_portfolio_post_query = new WP_Query($consultant_lite_portfolio_args);
                    if ($consultant_lite_portfolio_post_query->have_posts()) :
                        while ($consultant_lite_portfolio_post_query->have_posts()) : $consultant_lite_portfolio_post_query->the_post();
                            $consultant_lite_cat_id = array();
                            if(has_post_thumbnail()){
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                $url = $thumb['0'];
                            }
                            else{
                                $url = '';
                            }
                            $consultant_lite_categories = get_the_category();
                            foreach ($consultant_lite_categories as $consultant_lite_cat) {
                                $consultant_lite_cat_id[] = $consultant_lite_cat->term_id;
                            }
                            $cat_ids = implode(' cat-',$consultant_lite_cat_id);
                            $consultant_lite_single_cat_name = get_cat_name( $cat_ids);
                            ?>
                                <div class="tm-portfolio tm-overlay-image-hover masonry-item cat-<?php echo esc_html($cat_ids); ?>">
                                    <div class="tm-image-section">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url($url); ?>">
                                        </a>
                                    </div>
                                    <div class="tm-desc">
                                        <div class="tm-category">
                                            <a href="<?php the_permalink(); ?>"><?php echo esc_html($consultant_lite_single_cat_name); ?></a>
                                        </div>
                                        <h3 class="tm-post-title tm-post-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    </div>
                                </div> <!-- END .portfolio-masonry-entry-->
                        <?php 
                        endwhile;
                    endif; 
                    wp_reset_postdata(); 
                    ?>
                </div>
            </div><!--/container-->
        </div><!--/tm-portfolio-section-->
        <!-- End portfolio section -->
        <?php
    }
endif;
add_action('consultant_lite_action_front_page_portfolio', 'consultant_lite_portfolio_section',10);
