<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */
if ( ! function_exists( 'pet_business_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Pet Business 1.0.0
    */
    function pet_business_add_service_section() {
    	$options = pet_business_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'pet_business_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'pet_business_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        pet_business_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'pet_business_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Pet Business 1.0.0
    * @param array $input service section details.
    */
    function pet_business_get_service_section_details( $input ) {
        $options = pet_business_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['service_content_page_' . $i] ) )
                $page_ids[] = $options['service_content_page_' . $i];
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
                $page_post['content']     = pet_business_trim_content( 15 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';
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
// service section content details.
add_filter( 'pet_business_filter_service_section_details', 'pet_business_get_service_section_details' );


if ( ! function_exists( 'pet_business_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Pet Business 1.0.0
   *
   */
   function pet_business_render_service_section( $content_details = array() ) {
        $options = pet_business_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="our-services" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['service_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['service_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->

                <div class="section-content clear col-3">
                    <?php 
                    $i = 1;
                    foreach ( $content_details as $content ) : 
                        $class = ( empty( $content['image'] ) ) ? 'no-post-thumbnail' : 'has-post-thumbnail';
                        ?>
                        <article class="<?php echo esc_attr( $class ); ?>"><!-- add class 'no-post-thumbnail' when no featured image -->
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>
                                <?php endif; ?>

                                <?php if ( ! empty( $content['content'] ) ) : ?>
                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content['content'] ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                
                            </div><!-- .entry-container -->
                        </article>
                    <?php 
                    $i++;
                    endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #service-experience -->

    <?php }
endif;