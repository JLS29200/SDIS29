<?php

if(!isset($_POST["matricule"])) $_POST["matricule"] = $matricule=$_GET['matricule'];
else $matricule=$_POST['matricule'];

//$matricule=$_POST['matricule'];

$sql="SELECT SP_NOM, SP_PRENOM,SP_DTE_NAISSANCE,SP_TEL_FIXE,SP_TEL_PORTABLE,SP_BIP,STATUT_ID,GRA_ID FROM pompier WHERE SP_MATRICULE='$matricule';";
$results = tableSQL($sql);
foreach ($results as $ligne) {
    $nom = $ligne[0];
    $prenom = $ligne[1];
    $dateNAISS = $ligne[2];
    $tel_Fixe = $ligne[3];
    $tel_Port = $ligne[4];
    $BIP = $ligne[5];
    $statut = $ligne[6];
    $grade = $ligne[7];
}

$sql="SELECT LOG_PROFIL FROM login WHERE SP_MATRICULE='$matricule';";
$results = tableSQL($sql);
foreach ($results as $ligne) {
    $profil = $ligne[0];
}


?>