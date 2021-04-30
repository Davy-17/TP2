<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme4w4
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="galerie">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();?>
			<div class="carte">
				<div class="avant">
					<div class ="image">
					<?php  the_post_thumbnail(array(150, 150));?>
					</div>
				</div>
					<div class="arriere">
					<div class="info">
						<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
						<p><?php echo get_the_content(); ?></p>
						
					</div>
					</div>
			</div>

				<?php endwhile;?>
			</section>

			<?php endif; ?>
		
			
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
