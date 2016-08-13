<?php
include('config.inc.php');

$mois = array(
	'January' => 'Janvier',
	'February' => 'Février',
	'March' => 'Mars',
	'April' => 'Avril',
	'May' => 'Mai',
	'June' => 'Juin',
	'July' => 'Juillet',
	'August' => 'Août',
	'September' => 'Septembre',
	'October' => 'Octobre',
	'November' => 'Novembre',
	'December' =>'Décembre'
);

$date = getdate();

foreach ($mois as $english => $french) {
	if ($date['month'] === $english) {
		$date['month'] = $french;
	}
}

$date = $date['mday'].' '.$date['month'].' '.$date['year'];
$ip = $_SERVER['REMOTE_ADDR'];


try{

	$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8;";
    $connexion = new PDO($dsn, $user, $password);

    $query = "INSERT INTO commentaires (nom,prenom,email,ip,com,jour) VALUES (:nom,:prenom,:email,:ip,:com,:jour)";
	
	$preparedStatement = $connexion->prepare($query);
	$preparedStatement->bindValue(":nom", $nom);
	$preparedStatement->bindValue(":prenom", $prenom);
	$preparedStatement->bindValue(":email", $email);
	$preparedStatement->bindValue(":ip", $ip);
	$preparedStatement->bindValue(":com", $commentaire);
	$preparedStatement->bindValue(":jour", $date);
	$preparedStatement->execute();

	header('location:index.php');


}catch(PDOException $e){
    echo $e->getMessage();
}

?>