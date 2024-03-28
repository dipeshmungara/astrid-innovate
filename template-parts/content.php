<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Astrid_Innovate
 */

?>

<div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden mb-6 p-6">


    <div class="w-full md:w-auto">
		<div class="w-full mb-5 h-64  rounded-md overflow-hidden">
			<?php astrid_innovate_post_thumbnail(); ?>
		</div>

        <article id="post-<?php the_ID(); ?>" <?php //post_class(); ?>>
            <header class="entry-header ">
                <?php
                if (is_singular()) :
                    the_title('<h1 class=" bg-slate-300/50 p-3  rounded-md entry-title text-2xl font-bold mb-4">', '</h1>');
                else :
                    the_title('<h2 class="entry-title text-xl font-bold mb-4 bg-slate-300/50 p-3 rounded-md "><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;

                if ('post' === get_post_type()) :
                ?>
                    <div class="entry-meta text-gray-600 italic">
                        <?php
							astrid_innovate_posted_on();
							astrid_innovate_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-content text-gray-800">
                <?php
					$content = get_the_content();
					$trimmed_content = wp_trim_words($content, 60); // Change 30 to the desired number of words
					echo wp_kses(
						$trimmed_content,
						array(
							'span' => array(
								'class' => array(),
							),
						)
					);

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'astrid-innovate'),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer text-gray-600 mt-4 hidden">
                <?php astrid_innovate_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->
    </div>

</div>


