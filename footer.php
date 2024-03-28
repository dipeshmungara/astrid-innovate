<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astrid_Innovate
 */

?>

	<footer id="colophon" class="site-footer bg-logo-1 p-5 text-center text-logo-2">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'astrid-innovate' ) ); ?>" class="text-logo-2">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'astrid-innovate' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( '%1$s by %2$s.', 'astrid-innovate' ), 'Design & Developed', '<a  href="https://astridtechnology.com/">Astrid Technology</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
