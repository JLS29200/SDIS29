<?php

    $sql ="SELECT STATUT_ID, STATUT_LIBELLE FROM statut;";
	$cpt=compteSQL($sql);
			
	if(!isset($_POST["statut"])) $_POST["statut"] = 0;
	
	if ($cpt>0) {
	    $results = tableSQL($sql);
		echo "<select size=\"1\" name=\"statut\" id=\"statut\">";
		
		foreach ($results as $row) {
		    $selected = "";
			if($_POST["statut"] == $row[0]) $selected = "selected='selected'";
			
			echo "<option $selected value=$row[0]>$row[1]</option>";
		
		}
	} else {
	    
	    echo "<select size=\"1\" name=\"statut\" id=\"statut\" disabled=\"disabled\" >";
		echo "<option>Aucune information...</option>";
	}
	echo "</select>";

?>