<?php
/**
 * Team section
 *
 * This is the template for the content of team section
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */
if ( ! function_exists( 'pet_business_add_team_section' ) ) :
    /**
    * Add team section
    *
    *@since Pet Business 1.0.0
    */
    function pet_business_add_team_section() {
    	$options = pet_business_get_theme_options();
        // Check if team is enabled on frontpage
        $team_enable = apply_filters( 'pet_business_section_status', true, 'team_section_enable' );

        if ( true !== $team_enable ) {
            return false;
        }
        // Get team section details
        $section_details = array();
        $section_details = apply_filters( 'pet_business_filter_team_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render team section now.
        pet_business_render_team_section( $section_details );
    }
endif;

if ( ! function_exists( 'pet_business_get_team_section_details' ) ) :
    /**
    * team section details.
    *
    * @since Pet Business 1.0.0
    * @param array $input team section details.
    */
    function pet_business_get_team_section_details( $input ) {
        $options = pet_business_get_theme_options();
        
        $content = array();
                $page_ids = array();

                for ( $i = 1; $i <= 4; $i++ ) {
                    if ( ! empty( $options['team_content_page_' . $i] ) )
                        $page_ids[] = $options['team_content_page_' . $i];
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
// team section content details.
add_filter( 'pet_business_filter_team_section_details', 'pet_business_get_team_section_details' );


if ( ! function_exists( 'pet_business_render_team_section' ) ) :
  /**
   * Start team section
   *
   * @return string team content
   * @since Pet Business 1.0.0
   *
   */
   function pet_business_render_team_section( $content_details = array() ) {
        $options = pet_business_get_theme_options();
        if ( empty( $content_details ) ) {
            return;
        } 
        ?>
        <div id="our-team" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if ( ! empty( $options['team_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['team_title'] ); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->
                <div class="section-content col-4">
                    <?php 
                    $i = 1;
                    foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="featured-image">
                                <img src="<?php echo esc_url( $content['img'] ); ?>">
                            </div><!-- .featured-image -->

                            <header class="entry-header">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                <?php endif; ?>

                                <?php if ( ! empty( $options['team_content_custom_position_' . $i ] ) ) : ?>
                                    <span class="team-position"><?php echo esc_html( $options['team_content_custom_position_' . $i ] ); ?></span>
                                <?php endif; ?>
                            </header>

                        </article>
                    <?php 
                    $i++;
                    endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #featured-team -->
            
    <?php }
endif;