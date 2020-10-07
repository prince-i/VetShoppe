<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */
if ( ! function_exists( 'pet_business_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Pet Business 1.0.0
    */
    function pet_business_add_slider_section() {
    	$options = pet_business_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'pet_business_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'pet_business_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        pet_business_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'pet_business_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Pet Business 1.0.0
    * @param array $input slider section details.
    */
    function pet_business_get_slider_section_details( $input ) {
        $options = pet_business_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['slider_content_page_' . $i] ) )
                $page_ids[] = $options['slider_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = pet_business_trim_content( 13 );
                    $page_post['img']   = get_the_post_thumbnail_url( null, 'large' );

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'pet_business_filter_slider_section_details', 'pet_business_get_slider_section_details' );


if ( ! function_exists( 'pet_business_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Pet Business 1.0.0
   *
   */
   function pet_business_render_slider_section( $content_details = array() ) {
        $options = pet_business_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } ?>
         <div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows":true, "autoplay": true, "fade": true }'>
            <?php 
            $i = 1;
            foreach ( $content_details as $content ) : ?>
                <article style="background-image: url('<?php echo esc_url( $content['img'] ); ?>');">
                    <div class="overlay"></div>
                    <div class="entry-container">
                        <header class="entry-header">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <h2 class="entry-title">
                                    <?php echo esc_html( $content['title'] ); ?>
                                </h2>
                            <?php endif; ?>
                        </header>

                        <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                            <div class="entry-content">
                                <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="buttons">
                            <?php if ( ! empty( $options['slider_content_custom_btn_1_' . $i ] ) ) : 
                                $btn_1_url = ! empty( $options['slider_content_custom_url_1_' . $i ] ) ? $options['slider_content_custom_url_1_' . $i ] : '';
                                ?>
                                <a href="<?php echo esc_url( $btn_1_url ); ?>" class="btn btn-default"><?php echo esc_html( $options['slider_content_custom_btn_1_' . $i ] ); ?></a>
                            <?php endif; ?>
                        </div><!-- .buttons -->
                    </div>
                </article>
            <?php 
            $i++;
            endforeach; ?>
        </div><!-- #featured-slider -->
            
    <?php }
endif;