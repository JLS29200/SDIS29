<?php 

if(!$_SESSION['SF']==true) {
    if(!$_SESSION['admin']==true){
        header("Location: index.php");
        exit();
    }
}else{
	/*
	* Permet à l'utilisateur d'utiliser les boutons retours du navigateur sans message de la d'erreur de la part du navigateur 
	* Votre document a expiré ...
	*/
	header('Cache-Control: private_no_expire, must-revalidate');  
}

?>