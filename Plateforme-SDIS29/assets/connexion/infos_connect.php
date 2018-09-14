<?php 

@session_start();

$login=$_SESSION['login'];
$mdp=$_SESSION['mdp'];

//-------------------------------------------------------------------------------
//            On récupère les informations importantes
//-------------------------------------------------------------------------------

//----------------------------------------------
//             Table login
//----------------------------------------------
$sql = "SELECT * FROM login WHERE LOG_LOGIN='$login' and LOG_MDP ='$mdp';";
$results = tableSQL($sql);
foreach ($results as $ligne) {
    $SP_MATRICULE=$ligne[1]; //Matricule
    $nom=$ligne[3]; //Nom de famille
    $prenom=$ligne[4]; //Prénom
    $profil=$ligne[5]; //Profil
}
$_SESSION['SP_MATRICULE']=$SP_MATRICULE;
$_SESSION['nom']=$nom;
$_SESSION['prenom']=$prenom;
$_SESSION['profil']=$profil;


//----------------------------------------------
//             Table pompier
//----------------------------------------------
$sql = "SELECT * FROM pompier WHERE SP_MATRICULE=$SP_MATRICULE;";
$results = tableSQL($sql);
foreach ($results as $ligne) {
    $date_Naissance=$ligne[4]; //Date de naissance
    $num_Fixe=$ligne[5]; //Num Fixe
    $num_Port=$ligne[6]; //Num Port
    $BIP=$ligne[7];  //BIP
    $SP_STATUT=$ligne[8]; //Statut
    $CIS_ID=$ligne[12]; //ID Caserne
    
}
$_SESSION['date_Naissance']=$date_Naissance;
$_SESSION['num_Fixe']=$num_Fixe;
$_SESSION['num_Port']=$num_Port;
$_SESSION['BIP']=$BIP;
$_SESSION['SP_STATUT']=$SP_STATUT;
$_SESSION['CIS_ID']=$CIS_ID;


//----------------------------------------------
//             Table caserne
//----------------------------------------------
$sql = "SELECT * FROM caserne, pompier WHERE caserne.CIS_ID=pompier.CIS_ID and pompier.CIS_ID=$CIS_ID;";
$results = tableSQL($sql);
foreach ($results as $ligne) {
    //$CIS_ID=$ligne[0]; //Date de naissance
    $CIS_NOM=$ligne[1];  //Nom de la caserne
    
}
$_SESSION['CIS_NOM']=$CIS_NOM;

?>