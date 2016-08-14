<?php
define('PATTE_BLANCHE','accepted');
  error_reporting(0);
  if ($_POST['pseudo']) {
    die('you are a fucking bot');
  }

  $errors = array();
  include ('functions.php');


  if ( count($_POST) > 0) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $commentaire = $_POST['commentaire'];

    $nom = assain($nom);
    $prenom = assain($prenom);
    $commentaire = assain($commentaire);

    add_error($nom,$errors,'nom','Le nom n\'est pas valide');
    add_error($prenom,$errors,'prenom','Le prénom n\'est pas valide');
    add_error($commentaire,$errors,'commentaire','Le commentaire n\'est pas valide');


    if (strlen($email) != 0) {
      if (is_valid_email($email) == false) {
       $errors['email'] = 'L\'email n\'est pas valide';
      }
    }

    if (count($errors) === 0) {
        include('query.add.commentaire.php');
    }
    
  }
?>
<!DOCTYPE html>
<html lang="fr">
<?php
	include('metas.php');
?>
<body>
<?php include('header.view.php') ?>

<h2 class="second-title">Ajouter un commentaire</h2>
<form method='post' action="#" class="form form_add-commentaire">
   <fieldset>
    	<legend>Commentaire</legend>
      	<ol>
			<li>
        <?php
          message_erreur($errors, 'nom');
        ?>
				<label for='nom'>Nom *</label>
				<input type='text' name='nom' id='nom' placeholder="Votre nom" required>
			</li>
			<li>
        <?php
          message_erreur($errors, 'prenom');
        ?>
        	<label for='prenom'>Prénom *</label>
        	<input type='text' name='prenom' id='prenom' placeholder="Votre prénom" required>
			</li>
      <li class="pseudo">
        <label for='pseudo'>Pseudo</label>
        <input type='text' name='pseudo' id='pseudo' placeholder="Votre pseudo">
      </li>
      <li>
          <?php
              message_erreur($errors, 'email');
             ?>
            <label for='email'>E-mail (facultatif)</label>
            <input type='email' name='email' placeholder="Votre adresse email" id='email'>
      </li>
      <li class="commentaire_text">
        <?php
              message_erreur($errors, 'commentaire');
          ?>
            <label for='commentaire'>Commentaire *</label>
            <textarea name='commentaire' id='commentaire' class="text_add-commentaire" placeholder="Tapez votre commentaire" required></textarea>
      </li>
			<li>
         		<input type='submit' name='submit' value='ajouter un commentaire'>
       </li>
     	</ol>
     </fieldset>
</form>
<a href="index.php" class="back-home"> < Retourner aux commentaires</a>
</body>
</html>