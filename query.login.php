<?php
include ('config.inc.php');

	try{



			$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;";
		    $connexion = new PDO($dsn, $user, $password);

		    $liste_users = array();
		    $index = 0;

		    $query = "SELECT * FROM users";
		    $preparedStatement = $connexion->prepare($query);
			$preparedStatement->execute();
			// Cette boucle parcourera tous les résultats de la requète.
			while($result = $preparedStatement->fetch(PDO::FETCH_ASSOC)){
			    $liste_users[$index] = $result;
			    $index++;
			}

			foreach ($liste_users as $user) {


				if ($user['login'] === $login && $user['password'] === crypt($motDePasse,'toto') ) {

					if ($user['role'] == 'admin') {
						$_SESSION['logged_admin'] = 'ok';
						header('location:index.php');
					}

				}

				else{
					$error = true;
				}
			}
			
		}catch(PDOException $e){
	    echo $e->getMessage();
		}
?>

