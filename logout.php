<?php

  session_start();
  //effacer les fichiers stockant la session
  session_destroy();
  // effacer la variable de session
  unset($_SESSION);
  // redirige le navigateur vers la page d'accueil
  header("location:index.php");
?>