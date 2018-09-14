<?php

    @session_start();
    require '../assets/connexion/verif_connect.php';
    require '../assets/connexion/connectAD.php';
    
    //--------------------------------------------------
    //   On récupère les variables
    //--------------------------------------------------
    
    $formation=$_GET['id_form'];
    $matricule=$_GET['validation'];
    
    //--------------------------------------------------
    //   On établi la requête si $validation = True
    //--------------------------------------------------
    if(isset($_GET['validation'])){ //sera vrai si au moins un moins un checkbox a ÃƒÂ©tÃƒÂ© cochÃƒÂ©
        
        foreach($_GET['validation'] as $matricule){
            $sql="INSERT INTO valide (FOR_ID,SP_MATRICULE) VALUES ('$formation','$matricule');";
            $result=executeSQL($sql);
            $sql="DELETE FROM inscrire WHERE FOR_ID='$formation' and SP_MATRICULE='$matricule';";
            $result=executeSQL($sql);
            echo "<meta http-equiv='refresh' content='0, url=/formation/inscrire_formation.php?matricule=$matricule&message=<font color=green><b>Validation acceptée.</b></font>'>";
        }
    }
    
?>