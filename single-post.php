<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astrid_Innovate
 */

get_header();
?>


	<main id="primary" class="site-main mt-14 mb-14">
		<div class="container mx-auto">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
				?>
				<hr>
				<div class="mt-14 mb-14">
					<?php
					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle bg-logo-2 text-white rounded-md p-2 pl-10 pr-10 mr-3 hover:bg-logo-1">' . esc_html__( 'Previous', 'astrid-innovate' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle bg-logo-2 text-white rounded-md p-2 pl-10 pr-10 mr-3  hover:bg-logo-1">' . esc_html__( 'Next', 'astrid-innovate' ) . '</span> <span class="nav-title">%title</span>',
						)
					);
					?>
				</div>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</div>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
