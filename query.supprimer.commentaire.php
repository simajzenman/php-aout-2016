<?php
if(!defined('PATTE_BLANCHE')) {
     die('accès interdit');
  }
	include('config.inc.php');

	try{

			$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;";
		    $connexion = new PDO($dsn, $user, $password);

		    $query = "DELETE FROM commentaires WHERE id=:id";
		    $preparedStatement = $connexion->prepare($query);
		    $preparedStatement->bindValue(":id", $id);
			$preparedStatement->execute();
			
			
	}catch(PDOException $e){
	    echo $e->getMessage();
	}
	header('location:index.php');
?>