<?php
    require '../connexion/connectAD.php';
    
    //-------------------------------------------
    //     On récupères les variables
    //-------------------------------------------
    
    $matricule=$_POST['matricule'];
    $Nom=$_POST['Nom'];
    $Prenom=$_POST['Prenom'];
    $dateNAISS=$_POST['dateNAISS'];
    $statut=$_POST['statut'];
    $GRA_ID=$_POST['grade'];
    $date=$_POST['date'];
    $num_Fix=$_POST['num_Fix'];
    $num_Port=$_POST['num_Port'];
    $bip=$_POST['bip'];
    $CIS_ID=$_POST['numero'];
    $profil=$_POST['profil'];
    
    
    //-------------------------------------------
    //     On insères les infos dans la base
    //-------------------------------------------
    
    $sql="INSERT INTO pompier (SP_MATRICULE,SP_NOM, SP_PRENOM,SP_DTE_NAISSANCE,STATUT_ID,SP_TEL_FIXE,SP_TEL_PORTABLE,SP_BIP,CIS_ID,GRA_ID) VALUES ('$matricule','$Nom','$Prenom','$dateNAISS','$statut',$num_Fix,$num_Port,$bip,$CIS_ID,$GRA_ID);";
    $results = executeSQL_GE($sql);
    if($results==true){
    	   $sql="INSERT INTO login (LOG_LOGIN,SP_MATRICULE,LOG_MDP,LOG_NOM, LOG_PRENOM, LOG_PROFIL) VALUES ('$matricule','$matricule','$matricule@$Nom','$Nom','$Prenom',$profil);";
        	$results = executeSQL_GE($sql);
    	   if($results==true){
    	       //-------------------------------------------
    		  //     On Actualise la page
    		  //-------------------------------------------
    		  echo "<meta http-equiv='refresh' content='0,url=/liste_perso.php?message=<font color=green><b>Ajout r&eacute;alis&eacute;</b></font>'>";
    	   }else{
    	       echo "test";
    	   }
    }else{
        //-------------------------------------------
        //     On Actualise la page
        //-------------------------------------------
        echo "<meta http-equiv='refresh' content='0,url=/liste_perso.php?message=<font color=red><b>Ajout impossible ! Vueillez revoir le matricule.</b></font>'>";
    }
    
    

?>