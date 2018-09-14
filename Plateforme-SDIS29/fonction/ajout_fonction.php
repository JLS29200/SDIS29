<?php
    require '../assets/connexion/connectAD.php';
    
    //-------------------------------------------
    //     On récupères les variables
    //-------------------------------------------
    
    $matricule=$_POST['matricule'];
    $fonction=$_POST['fonction'];
    
    
    //-------------------------------------------
    //     On insères les infos dans la base
    //-------------------------------------------
    
    $sql="INSERT INTO exercer (SP_MATRICULE,FCT_ID) VALUES ('$matricule','$fonction');";
    $results = executeSQL_GE($sql);
    
    if ($results==True){
        //-------------------------------------------
        //     On Actualise la page
        //-------------------------------------------
        echo "<meta http-equiv='refresh' content='0,url=/fonctions_perso.php?matricule=$matricule&message=<font color=green><b>Ajout r&eacute;alis&eacute;</b></font>'>";
    }else{
        echo "<meta http-equiv='refresh' content='0, url=/fonctions_perso.php?matricule=$matricule&message=<font color=red><b>Cet utilisateur dispose déjà de cette fonction.</b></font>'>";
    }
    
    
?>