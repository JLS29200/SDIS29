<?php
    require '../assets/connexion/connectAD.php';

    //----------------------------------------
    //    On récupère les variables
    //----------------------------------------
    
    $matricule=$_POST['matricule'];
    $choix=$_POST['choix'];
    $formation=$_POST['formation'];
    
    
    //----------------------------------------
    //    Script correspondant au choix
    //----------------------------------------
    
    switch ($choix[0]) {
        
        case 1 :
            //Inscription
            $sql="INSERT INTO inscrire (FOR_ID,SP_MATRICULE) VALUES ($formation,'$matricule');";
            $result=executeSQL_GE($sql);
            if($result==true){
            	echo "<meta http-equiv='refresh' content='0, url=/formation/inscrire_formation.php?matricule=$matricule&message=<font color=green><b>Fromation ajout&eacute;e</b></font>'>";
            }else{
            	echo "<meta http-equiv='refresh' content='0, url=/formation/inscrire_formation.php?matricule=$matricule&message=<font color=red><b>Utilisateur déjà inscrit à cette formation.</b></font>'>";
            }
            break;
            
        case 2 :
            //Désistement
            $sql="DELETE FROM inscrire WHERE FOR_ID=$formation and SP_MATRICULE='$matricule';";
            $result=executeSQL($sql);
            echo "<meta http-equiv='refresh' content='0, url=/formation/inscrire_formation.php?matricule=$matricule&message=<font color=red><b>La formation à bien &eacute;t&eacute; retir&eacute;e.</b></font>'>";
            break;
            
        default :
            //exit ("Choix utilisateur non reconnu ...");
            echo "<meta http-equiv='refresh' content='0, url=/formation/inscrire_formation.php?message=<font color=red><b>Veuillez cocher la case inscription ou la case désistement.</b></font>'>";
            break;
    }

?>