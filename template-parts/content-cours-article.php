<?php
/**
 * Template part for l'affichage des blocs de cours dans font-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 4w4-theme-dmp
 */
?>

<article>
	
	
	<a href="<?php echo get_permalink() ?>"><!--<?php the_post_thumbnail('thumbnail'); ?>--></a>
	<div class="galerie_info">
	<?php the_title();?>
	</div>
</article>

