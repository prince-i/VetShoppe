<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

$options = pet_business_get_theme_options();
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'pet-business' );
?>

<article id="post-<?php the_ID(); ?>">
    
    <?php if ( has_post_thumbnail() ) : ?> 
        <div class="featured-image">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
        </div>
    <?php endif; ?>
    
    <div class="entry-container">
        <div class="entry-meta">
            <?php 
            if ( pet_business_archive_meta_option( 'hide_date' ) ) : 
                pet_business_posted_on();
            endif; 
            ?>
        </div><!-- .entry-meta -->

        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->

        <?php if ( ! empty( $readmore ) ) : ?>
            <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html( $readmore ); ?></a>
            </div><!-- .read-more -->
        <?php endif; ?>

    </div><!-- .entry-container -->

</article><!-- #post-## -->
