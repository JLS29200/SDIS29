<?php 

    require '../assets/connexion/connectAD.php';
    
    //-------------------------------------------
    //     On récupères les variables
    //-------------------------------------------
    
    $matricule=$_POST['matricule'];
    $fonction=$_POST['fonction'];
    
    //---------------------------------------------------
    //    Suppréssion de la fonction de l'utilisateur
    //---------------------------------------------------
    
    $sql="DELETE FROM exercer WHERE SP_MATRICULE=$matricule and FCT_ID='$fonction';";
    $result=executeSQL($sql);
    
    echo "<meta http-equiv='refresh' content='0,url=../fonctions_perso.php?matricule=$matricule&message=<font color=red><b>Modification prise en compte.</b></font>'>";

?>