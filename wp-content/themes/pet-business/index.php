<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Pet
 * @since Pet Business 1.0.0
 */

get_header(); 
?>

<div id="inner-content-wrapper" class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php  
			$sticky_posts = get_option( 'sticky_posts' );
			if ( ! empty( $sticky_posts ) ) :
				$sticky_count = 0;
				if ( ! empty($sticky_posts) ) :
					$sticky_count = count( $sticky_posts );
				endif;
				?>
				
				<div class="sticky-post-wrapper posts-wrapper">
					<?php $sticky_args = array(
						'post_type'	=> 'post',
						'post__in'	=> ( array ) $sticky_posts,
						'posts_per_page' => absint( $sticky_count ),
					); 
					$sticky_query = new WP_Query( $sticky_args );
					if ( $sticky_query->have_posts() ) : while ( $sticky_query->have_posts() ) : $sticky_query->the_post();

					?>
					    <article class="sticky <?php echo ( has_post_thumbnail() ) ? 'has-post-thumbnail' : 'no-post-thumbnail' ; ?>">
					            <?php if ( has_post_thumbnail() ) : ?>
					            	<div class="featured-image">
					            		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'large' , array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>"></a>
					            	</div>
					            <?php endif; ?>

					        <div class="entry-container">
					        	<div class="entry-meta">
					        	    <?php if ( pet_business_archive_meta_option( 'hide_date' ) ) : 
						                pet_business_posted_on();
						            endif; ?>
					        	</div><!-- .entry-meta -->

					            <header class="entry-header">
					                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					            </header>

					            <div class="entry-content">
					                <?php the_excerpt(); ?>
					            </div><!-- .entry-content -->
					            <?php 
					            $options = pet_business_get_theme_options();
					            $readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'pet-business' );

					            if ( ! empty( $readmore ) ) : ?>
						            <div class="read-more">
		        						<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo esc_html( $readmore ); ?></a>
						            </div><!-- .read-more -->
					            <?php endif; ?>
					        </div><!-- .entry-container -->
					    </article>
				    <?php endwhile; endif; 
				    wp_reset_postdata(); ?>
				</div><!-- .sticky-post-wrapper -->
			<?php endif; 
			?>
            <div class="posts-wrapper col-2 clear">
				<?php
				if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div>
			<?php  
			/**
			* Hook - pet_business_action_pagination.
			*
			* @hooked pet_business_pagination 
			*/
			do_action( 'pet_business_action_pagination' ); 

			?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<?php  
	if ( pet_business_is_sidebar_enable() ) {
		get_sidebar();
	}
	?>
</div><!-- .wrapper -->

<?php
get_footer();
