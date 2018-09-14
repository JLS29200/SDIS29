<?php
    
    require '../connexion/connectAD.php';
    
    //-------------------------------------------
    //     On récupères les variables
    //-------------------------------------------
    
    $matricule=$_POST['matricule'];
    
    //-------------------------------------------
    //            Suppréssion de la personne
    //-------------------------------------------
    
    if($matricule==1){
        echo "<meta http-equiv='refresh' content='0,url=../../liste_perso.php?message=<font color=red><b>Vous ne pouvez supprimer l administrateur du SDIS29.</b></font>'>";
    }else{
        $sql="DELETE FROM pompier WHERE SP_MATRICULE=$matricule;";
        $result=executeSQL($sql);
        $sql="DELETE FROM login WHERE SP_MATRICULE=$matricule;";
        $result=executeSQL($sql);
        $sql="DELETE FROM exercer WHERE SP_MATRICULE=$matricule;";
        $result=executeSQL($sql);
        $sql="DELETE FROM valide WHERE SP_MATRICULE=$matricule;";
        $result=executeSQL($sql);
        $sql="DELETE FROM inscrire WHERE SP_MATRICULE=$matricule;";
        $result=executeSQL($sql);
        echo "<meta http-equiv='refresh' content='0,url=../../liste_perso.php?message=<font color=red><b>La suppréssion a &eacute;t&eacute; effectu&eacute;e.</b></font>'>";
    }

?>