<?php

    $sql ="SELECT * FROM formation";
	$cpt=compteSQL($sql);
			
	if(!isset($_POST["formation"])) $_POST["formation"] = 0;
	
	if ($cpt>0) {
	    $results = tableSQL($sql);
		echo "<select size=\"1\" name=\"formation\" id=\"formation\">";
		
		foreach ($results as $row) {
		    $selected = "";
			if($_POST["formation"] == $row[0]) $selected = "selected='selected'";
			
			echo "<option $selected value=$row[0]>$row[1]</option>";
		
		}
	} else {
	    
	    echo "<select size=\"1\" name=\"formation\" id=\"formation\" disabled=\"disabled\" >";
		echo "<option>Aucune information...</option>";
	}
	echo "</select>";

?>