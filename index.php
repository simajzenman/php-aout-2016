<?php
	define('PATTE_BLANCHE','accepted');
	error_reporting(0);
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<?php
	include('metas.php');
?>
<body>
<?php
	include('header.view.php');
	if ( $_SESSION['logged_admin'] == 'ok') {
		echo '<h1 class="admin_title">Hello Admin! Vous pouvez modifier les commentaires ci-dessous</h1>';
	}
?>
	<nav class="navigation">
		<ul>
			<li class="button_left"><a class="button" href="commentaire.ajout.php">Ajouter un commentaire</a></li>


			<?php

				if ( $_SESSION['logged_admin'] == 'ok') {
					echo '<li class="button_right"><a class="button" href="logout.php">Déconnexion</a></li>';
				}

				else {
					echo '<li class="button_right"><a class="button button_right" href="admin.connexion.php">Connexion Administrateur</a></li>';
				}
			?>
			
		</ul>
	</nav>
	<ul class="commentaire-container">

		<li>
			<ol>
				<?php 
					include('query.get.commentaires.php');
				?>
		     </ol>
		     <div class="navigation-commentaire">
				 <?php
					
					if ($value !=0) {
						echo '<a class="move-commentaire move-commentaire_left" href="index.php?demande=precedent&value='.$value.'">Commentaires précédents</a>';
					}
					
					
				
					echo '<a class="move-commentaire move-commentaire_right" href="index.php?demande=suivant&value='.$value.'">Commentaires suivant</a>';
				?>
				<p class="page-marqueur"><?php
				echo $indexPage;
				echo '/';
				echo $totalPage;
				?></p>
			</div>
		 </li>
	</ul>


</body>
</html>