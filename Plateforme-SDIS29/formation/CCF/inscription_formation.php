<?php
	require '../../assets/connexion/connectAD.php';
    
    //-------------------------------------------
    //     On récupères les variables
    //-------------------------------------------
    
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
	
    
    
    //-------------------------------------------
    //     On insères les infos dans la base
    //-------------------------------------------
    
	if ($DTE_DEBUT<$DTE_FIN){		
		if ($Capacite!=0){
			$sql="INSERT INTO formation (FOR_ID,FCT_ID,FOR_LIBELLE, FOR_DTE_DEBUT,FOR_DTE_FIN,FOR_CAPACITE,FOR_SALLE,FOR_ADRESSE,FOR_CP,FOR_VILLE,FOR_DESCRIPTION) VALUES ('$FOR_ID','$FCT_ID','$Intitule','$DTE_DEBUT','$DTE_FIN',$Capacite,'$Salle','$Adresse',$CP,'$Ville',\"$Description\");";
			$results = executeSQL_GE($sql);
			if($results==true){
				//-------------------------------------------
				//     On Actualise la page
				//-------------------------------------------
				echo "<meta http-equiv='refresh' content='0,url=liste_formation.php?message=<font color=green><b>Ajout r&eacute;alis&eacute;</b></font>'>";
			}else{
				echo "<meta http-equiv='refresh' content='0,url=liste_formation.php?message=<font color=red><b>Ajout impossible 2 !</b></font>'>";
			}
		}else{
			echo "<meta http-equiv='refresh' content='0,url=liste_formation.php?message=<font color=red><b>Ajout impossible ! La capacite ne peut etre null.</b></font>'>";
		}
	}else{
		echo "<meta http-equiv='refresh' content='0,url=liste_formation.php?message=<font color=red><b>Ajout impossible ! La date de fin doit etre supperieur � la date de debut.</b></font>'>";
	}
	
    

?>