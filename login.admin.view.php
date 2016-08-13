<!DOCTYPE html>
<html lang="fr">
<head>
	<?php include('metas.php') ?>
</head>
<body>
<?php
	include('header.view.php');
?>

<h2 class="second-title">Connexion administrateur</h2>

<form method='post' action="#" class="form form-admin">
   <fieldset>
    	<legend>admin</legend>
    	<?php
    		if ($error) {
    			echo '<p class="error">Login ou mot de passe invalide</p>';
    		}
    	?>
      	<ol>
			<li>
				<label for='login'>Login *</label>
				<input type='text' name='login' placeholder="Votre login" required>
			</li>
			<li>
        		<label for='password'>Password *</label>
        		<input type='password' name='password' placeholder="Votre password" required>
			</li>

			<li>
	         	<input type='submit' name='submit' value='connexion'>
	       </li>
     	</ol>
     </fieldset>
</form>

<a href="index.php" class="back-home"> < Retourner aux commentaires</a>
</body>
</html>
