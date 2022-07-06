<?php
/**
 * Loop Name: Content Page Detail
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <div class="entry-content">
        <?php the_content(); ?>
        <?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'donjai' ),
			'after'  => '</div>',
			) );
			?>
    </div>

    <footer class="entry-footer">
        <?php
			edit_post_link(sprintf(
					esc_html__( 'Edit %s', 'donjai' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
				'<span class="edit-link">',
				'</span>'
				);
				?>
    </footer>


</article>