<?php
/**
 * Template part for l'affichage des blocs de cours dans font-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 4w4-theme-dmp
 */
global $tPropriete;
?>

<div class="carte">
	<div class="avant">
		<div class ="image">
			<?php  the_post_thumbnail('thumbnail');?>
		</div>
	</div>
		<div class="arriere">
			<div class="info">
				<h2><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h2>
				<p><?php echo get_the_content(); ?></p>

			</div>
		</div>
</div>


