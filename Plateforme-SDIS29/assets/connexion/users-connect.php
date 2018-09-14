<?php

	include 'connectAD.php';
	
	//-------------------------------------------------------------------------------
	//            On récupère les variables
	//-------------------------------------------------------------------------------
	$login=$_POST['login'];
	$mdp=$_POST['mdp'];

	//-------------------------------------------------------------------------------
	//            Paramètres de connexion
	//-------------------------------------------------------------------------------
	// on va chercher tous les infos de la table test
	$sql = "SELECT SP_MATRICULE, LOG_PROFIL FROM login WHERE LOG_LOGIN = '$login' and LOG_MDP = '$mdp';";
 
	// on compte les données ayant ses éléments
	$compte = compteSQL($sql);

	if ($compte==0){
		//On vérifie si le login est bon pour vérifier si l'erreur provient du mot de passe.
		$sql = "SELECT LOG_LOGIN FROM login WHERE LOG_LOGIN = '$login';";
		$compte = compteSQL($sql);if($compte==1){
			echo "<meta http-equiv='refresh' content='0, url=/fiche_connect.php?login=$login&message=<font color=red><b>Le mot de passe est &eacute;ronn&eacute;.</b></font>'>";
		}else{
			echo "<meta http-equiv='refresh' content='0, url=/fiche_connect.php?message=<font color=red><b>Connexion refus&eacute;e.</b></font>'>";
		}
	}else{
		//Connexion valide.
		//Enregistrement en mode cookies
		$memo_connect=$_POST['memo_connect'];
		
		if ($memo_connect==True){
			//echo "L'information de connexion vaut : ".$memo_connect;
			setcookie('$login', $log, (time()+60*60*24*365));
			setcookie('$mdp', $mot_passe, (time()+60*60*24*365));
		}

        @session_start();
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
    
        $results = tableSQL($sql);
        foreach ($results as $ligne) {
       	    $SP_MATRICULE=$ligne[0]; //Matricule
       	    $profil=$ligne[1]; //Profil
        }
        $_SESSION['SP_MATRICULE']=$SP_MATRICULE;
        $_SESSION['profil']=$profil;
        $_SESSION['isConnected()']=true;
        require 'infos_connect.php';
        echo "<meta http-equiv='refresh' content='0, url=/fiche_perso.php' >";
}
?>
