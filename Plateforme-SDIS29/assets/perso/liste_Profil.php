<?php

    $sql ="SELECT PROFIL_ID, PROFIL_LIBELLE FROM profil;";
	$cpt=compteSQL($sql);
	
	//On récupère le profil de l'utilisateur
	$select_profil_user="SELECT LOG_PROFIL FROM login where SP_MATRICULE='$matricule';";
	$profil_user=champSQL($select_profil_user);
			
	if(!isset($_POST["profil"])) $_POST["profil"] = 0;
	
	if ($cpt>0) {
	    $results = tableSQL($sql);
		echo "<select size=\"1\" name=\"profil\" id=\"profil\">";
		
		foreach ($results as $row) {
		    $selected = "";
		    if($profil_user == $row[0]) $selected = "selected='selected'";
			
		    if($profil_user==9){
		        echo "<option $selected value=9>Admin</option>";
		        break;
		    }else{
		        if($row[0]!=9){
		            echo "<option $selected value=$row[0]>$row[1]</option>";
		        }
		    }
		
		}
	} else {
	    
	    echo "<select size=\"1\" name=\"profil\" id=\"profil\" disabled=\"disabled\" >";
		echo "<option>Aucune information...</option>";
	}
	echo "</select>";

?>