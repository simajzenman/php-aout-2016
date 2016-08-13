<?php
	include('config.inc.php');
	include('functions.php');

	$demande = $_GET['demande'];

	$value = 0;

	$indexPage = 1;
	$totalPage = 0;

	try{
		$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;";
		$connexion = new PDO($dsn, $user, $password);
		$query = "SELECT COUNT(*) FROM commentaires";
	    $preparedStatement = $connexion->prepare($query);
		$preparedStatement->execute();
		while($result = $preparedStatement->fetch(PDO::FETCH_ASSOC)){
		    $totalPage = $result['COUNT(*)'];
		}

		$totalPage = $totalPage / 3 ;
		if (is_float ( $totalPage )) {
			$totalPage = floor($totalPage);
		}
	}


	catch(PDOException $e){
	    echo $e->getMessage();
	}



	if ($demande != '' ) {

		$value = $_GET['value'];
		$demande=assain($demande);
		$value=assain($value);

		if ($demande == '' || $value == '' || is_numeric($value) == false || !($demande == 'suivant' || $demande == 'precedent')) {

			die('error');
			
		}

	}

	try{

	$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;";
    $connexion = new PDO($dsn, $user, $password);

    $liste_commentaires = array();
    $index = 0;


    if ($demande == 'suivant') {
    	$value = $value+4;
		
	}

	if ($demande == 'precedent' && $value !=0 &&  $value != '') {
    	$value = $value-4;
		
	}



    $query = "SELECT * FROM commentaires ORDER BY id DESC LIMIT $value,4";
    $preparedStatement = $connexion->prepare($query);
	$preparedStatement->execute();
	// Cette boucle parcourera tous les résultats de la requète.
	while($result = $preparedStatement->fetch(PDO::FETCH_ASSOC)){
	    $liste_commentaires[$index] = $result;
	    $index++;
	}

	foreach ($liste_commentaires as $commentaire_presci) {

		echo '<li class="comentaire">';

		echo '<form class="form" action="admin.changement.php" method="post">';

		echo '<fieldset>
		    	<legend>commentaire</legend>
		      	<ol>';

		echo '<li>';
		echo '<label for"nom">Nom:</label>';
		echo '<input type="text" name="nom" value="'.$commentaire_presci['nom'].'"';
		desabler();
		echo '>';
		echo '</li>';

		echo '<li class="input_right">';
		echo '<label for"prenom">Prénom:</label>';
		echo '<input type="text" name="prenom" value="'.$commentaire_presci['prenom'].'"';
		desabler();
		echo '>';
		echo '</li>';

		echo '<li class="commentaire_text">';
		echo '<label for"com">Commentaire:</label>';
		echo '<textarea name="commentaire"';
		desabler();
		echo '>'.$commentaire_presci['com'].'</textarea>';
		echo '</li>';

		echo '<li class="date">';
		echo '<label class="destroy" for"jour">Date</label>';
		echo '<input type="text" name="jour" value="'.$commentaire_presci['jour'].'"';
		desabler();
		echo '>';
		echo '</li>';

		echo '<li class="destroy">';
		echo '<label for"id">id</label>';
		echo '<input type="text" name="id" value="'.$commentaire_presci['id'].'"';
		desabler();
		echo '>';
		echo '</li>';

		if ($_SESSION['logged_admin']=='ok') {
			echo '<li>';
			echo '<label for"modifier" class="destroy">modifier le commentaire</label>';
			echo '<input type="submit" name="changement" value="modifier" class="changing">';
			echo '</li>';

			echo '<li>';
			echo '<label for"supprimer" class="destroy">supprimer le commentaire</label>';
			echo '<input type="submit" name="changement" value="supprimer">';
			echo '</li>';
		}

		echo '</ol>';
		echo '</fieldset>';
		echo '</form>';

		echo '</li>';



	}

	$indexPage = $value / 4 +1;


	}catch(PDOException $e){
	    echo $e->getMessage();
	}
?>