<?php
define('PATTE_BLANCHE','accepted');
	session_start();
	include('functions.php');
	$error = false;

	if ( count($_POST) > 0) {

		$login = $_POST['login'];
		$motDePasse = $_POST['password'];

		$login = assain($login);
		$motDePasse = assain($motDePasse);

		if ($login != '' && $motDePasse != '') {
			include('query.login.php');
		}

		else{
			$error = true;
		}

	}

	include('login.admin.view.php');

?>

