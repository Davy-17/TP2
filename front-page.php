
<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 4w4-theme-dmp
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

			
			<section class="cours">
			<?php
			/* Start the Loop */
            $precedent = "XXXXXX";
			$chaine_bouton_radio = '';
			while ( have_posts() ) :
				the_post();
				convertirTableau($tPropriete);
                
				if ($tPropriete['typeCours'] != $precedent): 
						if( "XXXXXX" !=$precedent) :?>
							</section>
							<?php if(in_array($precedent, ['Web','Spécifique', 'Jeu', 'Image 2d/3d', 'Conception'])) : ?>
								<div class="ctrl-carrousel"> 
								<?php echo $chaine_bouton_radio; 
								$chaine_bouton_radio = '';
								?>
							</div>

							<?php endif; ?>
						<?php endif; ?>

						<h2><?php echo $tPropriete['typeCours'] ?></h2>
						<section <?php echo class_bloc($tPropriete['typeCours'])  ?>>
				<?php endif; ?>
						
							<?php if (in_array($tPropriete['typeCours'], ['Web', 'Spécifique','Jeu', 'Image 2d/3d', 'Conception']) ) : 
								get_template_part( 'template-parts/content', 'cours-carrousel' );
								$chaine_bouton_radio .= '<input class = "rad-carrousel" type="radio" name ="rad-'.$tPropriete['typeCours'].'">';
							elseif ($tPropriete['typeCours'] == 'Projet' || $tPropriete['typeCours'] == 'Mes projets'):
								get_template_part( 'template-parts/content', 'galerie' );
							
								else :
								get_template_part( 'template-parts/content', 'cours-article' );
							
							endif;
			$precedent = $tPropriete['typeCours'] ;
			endwhile;?>
			</section>

			<!-- Formulaire d'ajout d'un article de catégorie "Nouvelles" -->
			<?php if (current_user_can('administrator')) : ?>

			<section class="admin-rapide">
				<h3>Ajouter un article de catégorie "Nouvelles"</h3>
				<div class="conteneur-bout">
				<input type="text" name="title" placeholder="Titre">
				<textarea name="content" placeholder="Contenu"></textarea>
				<button id="bout-rapide">Créer une nouvelle</button>
			</div>
			</section>

			<?php endif; ?>

			<!-- Les "Nouvelles" -->
			<section class="nouvelles">
				<!--button id="bout_nouvelles">Dernières nouvelles</button-->
				<section></section>
			</section>

		<?php endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

function convertirTableau(&$tPropriete)
{
	/*                $titre = get_the_title();
				//582-1w1 Mise en page Web(75h)
				$sigle = substr($titre, 0, 7);
				$nbHeure = substr($titre, -4, 3);
				$titrePartiel = substr($titre, 8, -6);
                $session = substr($titre, 4, 1);
               // $contenu = get_the_content();
               // $resume = substr($contenu, 0, 200);
				$typeCours = get_field('type_de_cours');*/

				$tPropriete['titre'] = get_the_title();
				$tPropriete['sigle'] = substr($tPropriete['titre'], 0, 7);
				$tPropriete['nbHeure'] = substr($tPropriete['titre'], -4, 3);
				$tPropriete['titrePartiel'] = substr($tPropriete['titre'], 8, -6);
				$tPropriete['session'] = substr($tPropriete['titre'], 4, 1);
				$tPropriete['typeCours'] = get_field('type_de_cours');
}
function class_bloc($typeCours){
	if (in_array($typeCours, ['Web','Spécifique', 'Jeu', 'Image 2d/3d', 'Conception'])){
		return('class = "carrousel-2"');
	} 
	elseif($typeCours == 'Projet' || $typeCours == 'Mes projets'){
		return('class = "galerie"');
}
	else{
		return('class = "bloc"');
}

}
