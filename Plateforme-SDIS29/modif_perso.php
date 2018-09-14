<?php

    require 'assets/connexion/connectAD.php';
    
    //-------------------------------------------------------------------------------
    //            On récupère les variables
    //-------------------------------------------------------------------------------

    $matricule=$_POST['matricule'];
    $Nom=$_POST['Nom'];
    $Prenom=$_POST['Prenom'];
    $dateNAISS=$_POST['dateNAISS'];
    $statut=$_POST['statut'];
    $grade=$_POST['grade'];
    $date=$_POST['date'];
    $num_Fix=$_POST['num_Fix'];
    $num_Port=$_POST['num_Port'];
    $profil=$_POST['profil'];


    //-------------------------------------------------------------------------------
    //            On modifie les information
    //-------------------------------------------------------------------------------
    $sql="UPDATE pompier SET SP_NOM='$Nom', SP_PRENOM='$Prenom',SP_DTE_NAISSANCE='$dateNAISS', SP_TEL_FIXE='$num_Fix',SP_TEL_PORTABLE='$num_Port',STATUT_ID='$statut',GRA_ID=$grade where SP_MATRICULE=$matricule;";
    $result=executeSQL($sql);
    $sql="UPDATE login SET LOG_NOM='$Nom', LOG_PRENOM='$Prenom', LOG_PROFIL=$profil where SP_MATRICULE=$matricule;";
    $result=executeSQL($sql);
    echo "<meta http-equiv='refresh' content='0,url=personnel.php?matricule=$matricule&message=<font color=green><b>Les changements ont bien &eacute;t&eacute; pris en compte.</b></font>'>";
?>