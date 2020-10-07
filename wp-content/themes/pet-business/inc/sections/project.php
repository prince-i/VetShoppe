<?php
/**
 * Project section
 *
 * This is the template for the content of project section
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */
if ( ! function_exists( 'pet_business_add_project_section' ) ) :
    /**
    * Add project section
    *
    *@since Pet Business 1.0.0
    */
    function pet_business_add_project_section() {
        $options = pet_business_get_theme_options();
        // Check if project is enabled on frontpage
        $project_enable = apply_filters( 'pet_business_section_status', true, 'project_section_enable' );

        if ( true !== $project_enable ) {
            return false;
        }
        // Get project section details
        $section_details = array();
        $section_details = apply_filters( 'pet_business_filter_project_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render project section now.
        pet_business_render_project_section( $section_details );
    }
endif;

if ( ! function_exists( 'pet_business_get_project_section_details' ) ) :
    /**
    * project section details.
    *
    * @since Pet Business 1.0.0
    * @param array $input project section details.
    */
    function pet_business_get_project_section_details( $input ) {
        $options = pet_business_get_theme_options();
        
        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $options['project_content_page_' . $i] ) )
                $page_ids[] = $options['project_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 4,
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
                $page_post['id'] = get_the_ID();
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
// project section content details.
add_filter( 'pet_business_filter_project_section_details', 'pet_business_get_project_section_details' );


if ( ! function_exists( 'pet_business_render_project_section' ) ) :
  /**
   * Start project section
   *
   * @return string project content
   * @since Pet Business 1.0.0
   *
   */
   function pet_business_render_project_section( $content_details = array() ) {
        $options = pet_business_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="latest-projects" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['project_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['project_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->

                <div class="project-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "fade": false }'>
                    <?php 
                    $i = 1;
                    foreach ( $content_details as $content ) : 
                        ?>
                        <article style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                            <div class="overlay"></div>
                            <div class="entry-container">
                                <div class="entry-container">
                                    <?php if ( ! empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif; ?>
                                </div><!-- .entry-container -->
                            </div><!-- .entry-container -->
                        </article>
                    <?php 
                    $i++;
                    endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #project-experience -->

    <?php }
endif;