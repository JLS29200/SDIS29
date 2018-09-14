<?php

    require '../../assets/connexion/connectAD.php';
    
    //-------------------------------------------------------------------------------
    //            On récupère les variables
    //-------------------------------------------------------------------------------

    $ID=$_POST['ID'];
    $FOR_ID=$_POST['FOR_ID'];
    $FCT_ID=$_POST['fonction'];
    $Intitule=$_POST['Intitule'];
    $DTE_DEBUT=$_POST['DTE_DEBUT'];
    $DTE_FIN=$_POST['DTE_FIN'];
    $Capacite=$_POST['Capacite'];
    $Salle=$_POST['Salle'];
    $Adresse=$_POST['Adresse'];
    $CP=$_POST['CP'];
    $Ville=$_POST['Ville'];
    $Description=$_POST['Description'];


    //-------------------------------------------------------------------------------
    //            On modifie les information
    //-------------------------------------------------------------------------------
    $sql="UPDATE formation SET FOR_ID='$FOR_ID', FCT_ID='$FCT_ID',FOR_LIBELLE='$Intitule', FOR_DTE_DEBUT='$DTE_DEBUT',FOR_DTE_FIN='$DTE_FIN',FOR_CAPACITE=$Capacite,FOR_SALLE='$Salle',FOR_ADRESSE='$Adresse',FOR_CP=$CP,FOR_VILLE='$Ville',FOR_DESCRIPTION=\"$Description\" where FOR_ID='$ID';";
    $result=executeSQL($sql);
    echo "<meta http-equiv='refresh' content='0,url=liste_formation.php?message=<font color=green><b>Les changements ont bien &eacute;t&eacute; pris en compte.</b></font>'>";
?>