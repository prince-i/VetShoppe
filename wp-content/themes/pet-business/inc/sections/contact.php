<?php
/**
 * Contact section
 *
 * This is the template for the content of contact section
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */
if ( ! function_exists( 'pet_business_add_contact_section' ) ) :
    /**
    * Add contact section
    *
    *@since Pet Business 1.0.0
    */
    function pet_business_add_contact_section() {
    	$options = pet_business_get_theme_options();
        // Check if contact is enabled on frontpage
        $contact_enable = apply_filters( 'pet_business_section_status', true, 'contact_section_enable' );

        if ( true !== $contact_enable ) {
            return false;
        }
        // Get contact section details
        $section_details = array();
        $section_details = apply_filters( 'pet_business_filter_contact_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render contact section now.
        pet_business_render_contact_section( $section_details );
    }
endif;

if ( ! function_exists( 'pet_business_get_contact_section_details' ) ) :
    /**
    * contact section details.
    *
    * @since Pet Business 1.0.0
    * @param array $input contact section details.
    */
    function pet_business_get_contact_section_details( $input ) {
        $options = pet_business_get_theme_options();
        
        $content = array();
        $page_id = ! empty( $options['contact_content_page'] ) ? $options['contact_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = pet_business_trim_content( 25 );
                    $page_post['image']   = get_the_post_thumbnail_url( get_the_ID(), 'large' );

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
// contact section content details.
add_filter( 'pet_business_filter_contact_section_details', 'pet_business_get_contact_section_details' );


if ( ! function_exists( 'pet_business_render_contact_section' ) ) :
  /**
   * Start contact section
   *
   * @return string contact content
   * @since Pet Business 1.0.0
   *
   */
   function pet_business_render_contact_section( $content_details = array() ) {
        $options = pet_business_get_theme_options();
        $readmore = ! empty( $options['contact_btn_title'] ) ? $options['contact_btn_title'] : '';
        if ( empty( $content_details ) ) {
            return;
        } 

        // foreach ( $content_details as $content ) : 
            ?>
            <div id="contact-us" class="relative page-section" style="background-image: url('<?php echo esc_url( $content_details[0]['image'] ); ?>');">
                <?php $col = ( ($content_details[0]['title'] || $content_details[0]['excerpt'] || has_nav_menu( 'social' ) ) && ! empty( $options['contact_shortcode'] ) ) ? 2 : 1 ; ?>
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="contact-information col-<?php echo esc_attr( $col ); ?>">
                        <div class="hentry">
                            <div class="contact-address">
                            <div class="section-header">
                                <?php if ( $content_details[0]['title'] ) { ?>
                                    <h2 class="section-title"><?php echo esc_html( $content_details[0]['title'] ); ?></h2>
                                <?php } ?>
                                
                                 <?php if ( $content_details[0]['excerpt'] ) { ?>
                                    <p class="section-subtitle">
                                        <?php echo wp_kses_post( $content_details[0]['excerpt'] ); ?>
                                    </p><!-- .entry-content -->
                                <?php } ?>
                            </div><!-- .section-header -->

                            <ul class="contact-details">
                                <?php for ( $i=1; $i < 3; $i++ ) { ?>
                                    <li>
                                        <?php if ( ! empty( $options['contact_text_' . $i ] ) ) { ?>
                                            <h4><?php echo esc_html( $options['contact_text_' . $i ] ); ?></h4>
                                        <?php } ?>

                                        <?php if ( ! empty( $options['contact_value_' . $i ] ) ) { ?>
                                            <span><?php echo esc_html( $options['contact_value_' . $i ] ); ?></span>
                                        <?php } ?>
                                    </li> 
                                <?php } ?>
                            </ul>

                            <?php if ( has_nav_menu( 'social' ) ) : ?>
                                <div class="social-icons">
                                    <?php  
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'social',
                                            'container' => false,
                                            'menu_class' => 'menu',
                                            'echo' => true,
                                            'fallback_cb' => false,
                                            'depth' => 1,
                                            'link_before' => '<span class="screen-reader-text">',
                                            'link_after' => '</span>',
                                            )
                                        );
                                    ?>
                                </div><!-- .social-icons -->
                            <?php endif; ?>

                            </div><!-- .contact-address-->
                        </div><!-- .hentry --> 

                        <?php if ( ! empty( $options['contact_shortcode'] ) ) { ?>
                            <div class="hentry">
                                <div class="contact-form">
                                    <?php echo do_shortcode( $options['contact_shortcode'] ); ?>  
                                </div><!-- .contact-form -->
                            </div><!-- .hentry -->
                        <?php } ?>

                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #contact-us -->
        <?php //endforeach;
    }
endif;