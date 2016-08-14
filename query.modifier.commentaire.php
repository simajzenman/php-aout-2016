<?php

	include('config.inc.php');

	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$date = $_POST['jour'];
	$commentaire= $_POST['commentaire'];
	$id= $_POST['id'];

	$nom = assain($nom);
	$prenom = assain($prenom);
	$date = assain($date);
	$commentaire = assain($commentaire);
	$id = assain($id);

	try{

			$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;";
		    $connexion = new PDO($dsn, $user, $password);

		    $query = "UPDATE commentaires SET nom=:nom,prenom = :prenom,jour = :jour , com = :com WHERE id=:id";
		    $preparedStatement = $connexion->prepare($query);
		    $preparedStatement->bindValue(":nom", $nom);
		    $preparedStatement->bindValue(":prenom", $prenom);
		    $preparedStatement->bindValue(":jour", $date);
		    $preparedStatement->bindValue(":com", $commentaire);
		    $preparedStatement->bindValue(":id", $id);
			$preparedStatement->execute();
			
			
	}catch(PDOException $e){
	    echo $e->getMessage();
	}
	header('location:index.php');
?>