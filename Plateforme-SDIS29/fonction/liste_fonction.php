<?php

$sql ="SELECT FCT_ID, FCT_LIBELLE FROM fonction;";
$cpt=compteSQL($sql);

//On récupère le grade de l'utilisateur
$select_FCT_formation="SELECT FCT_ID FROM formation where FCT_ID='$FCT_ID';";
$fct_formation=champSQL($select_FCT_formation);

if(!isset($_POST["fonction"])) $_POST["fonction"] = 0;

if ($cpt>0) {
	$results = tableSQL($sql);
	echo "<select size=\"1\" name=\"fonction\" id=\"fonction\">";
	
	foreach ($results as $row) {
		$selected = "";
		if($fct_formation== $row[0]) $selected = "selected='selected'";
		
		if($fct_formation!= $row[0]){
			echo "<option $selected value='NULL'>NULL</option>";
		}
		
		echo "<option $selected value=$row[0]>$row[1]</option>";
		
	}
} else {
	
	echo "<select size=\"1\" name=\"fonction\" id=\"fonction\" disabled=\"disabled\" >";
	echo "<option>Aucune information...</option>";
}
echo "</select>";

?>