<?php
    $sql ="SELECT GRA_ID, GRA_LIBELLE FROM grade;";
    $cpt=compteSQL($sql);
    
    //On récupère le grade de l'utilisateur
	$select_grade_user="SELECT GRA_ID FROM pompier where SP_MATRICULE=$matricule;";
	$grade_user=champSQL($select_grade_user);
			
	if(!isset($_POST["grade"])) $_POST["grade"] = 0;
	
	if ($cpt>0) {
	    $results = tableSQL($sql);
		echo "<select size=\"1\" name=\"grade\" id=\"grade\">";
		
		foreach ($results as $row) {
		    $selected = "";
			if($grade_user == $row[0]) $selected = "selected='selected'";
			
			echo "<option $selected value=$row[0]>$row[1]</option>";
		}
	} else {
	    
	    echo "<select size=\"1\" name=\"grade\" id=\"grade\" disabled=\"disabled\" >";
		echo "<option>Aucune information...</option>";
	}
	echo "</select>";
?>