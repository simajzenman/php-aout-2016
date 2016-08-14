<?php
if(!defined('PATTE_BLANCHE')) {
     die('accès interdit');
  }
	include ('functions.php');

	$id = $_POST['id'];
	$request = $_POST['changement'];

	assain($id);
	assain($request);

	if ($id == '' || $request == '') {
		echo 'not this time buddy';
		
	}

	if ($request == 'supprimer') {
		include('query.supprimer.commentaire.php');
	}

	if ($request == 'modifier'){
		include('query.modifier.commentaire.php');
	}

	else{
		die('error');
	}
?>