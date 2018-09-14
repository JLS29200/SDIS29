<?php
@session_start();
if(!$_SESSION['isConnected()']==true) {
  header("Location: /index.php"); //Si l'utilisateur n'est pas connécté il sera redirigé sur la page d'accueil
  exit();
}else{
	/*
	* Permet à l'utilisateur d'utiliser les boutons retours du navigateur sans message de la d'erreur de la part du navigateur 
	* Votre document a expiré ...
	*/
	header('Cache-Control: private_no_expire, must-revalidate');  
}

?>