<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Perch_Test
 */

get_header();
?>

<div class="section">
	<div class="container">
		<div class="row justify-content-center">

			<div class="col-md-12 col-lg-10">
				<main id="primary" class="site-main">

<div style="background-color:<?php the_field('background_color'); ?>">
test
</div>

					<?php
						while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_type() );
						
						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'perchtest' ) . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'perchtest' ) . '</span> <span class="nav-title">%title</span>',
							)
						);

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						endwhile; // End of the loop.
					?>
					
				</main><!-- #main -->
			</div>
			
		</div>
	</div>
</div>

<?php

get_footer();
