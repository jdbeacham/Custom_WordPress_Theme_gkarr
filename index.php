<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gKarr
 */



get_header();

wp_nav_menu(
	array(
		'theme_location' => 'donate-button',
			'menu_id'        => 'DonateButton-menu'
)
);


wp_nav_menu(
	array(
		'theme_location' => 'social-menu',
		'menu_id'        => 'socialheader-menu'
)
);

?>





	<main id="primary" class="site-main">

	

	<?php

	require 'join.php';
 
 $top_args = array(
	 'post_type' => 'gkarr_top_post',
	 'posts_per_page' => 1
 );
 $gkarr_display_top_post = new WP_Query( $top_args );


while ( $gkarr_display_top_post->have_posts() ) :
	$gkarr_display_top_post->the_post();
?>

		<div id="gkar-top-container"><div id="gkar-quote-image"><?php the_post_thumbnail(); ?></div><div id="gkarr-quote"><?php the_content(); ?></div>
</div>
		<?php

endwhile;

wp_reset_query();

		$po_args = array(
			'orderby'        => 'meta_value_num',
			'meta_key'       => 'gkarr_order_posts',
			'order'          => 'ASC',
			'post_type'      => 'post',
			'post__not_in' => array(212),
		
	);

	$gkarr_order_posts = new WP_Query( $po_args );
	

		if ( $gkarr_order_posts->have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>
			
			<div id="karr-posts-container">
			
				<?php
			/* Start the Loop */
			while ( $gkarr_order_posts->have_posts() ) :
				$gkarr_order_posts->the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		
		?>
	
		</div>

		<?php
	

	get_footer();
?>
		
	
	</main><!-- #main -->

	






