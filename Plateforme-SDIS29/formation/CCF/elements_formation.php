<?php

if(!isset($_POST["FOR_ID"])) $_POST["FOR_ID"] = $FOR_ID=$_GET['FOR_ID'];
else $FOR_ID=$_POST['FOR_ID'];


$sql="SELECT FOR_ID,FCT_ID,FOR_LIBELLE, FOR_DTE_DEBUT,FOR_DTE_FIN,FOR_CAPACITE,FOR_SALLE,FOR_ADRESSE,FOR_CP,FOR_VILLE,FOR_DESCRIPTION FROM formation WHERE FOR_ID='$FOR_ID';";
$results = tableSQL($sql);
foreach ($results as $ligne) {
	$FOR_ID= $ligne[0];
	$FCT_ID= $ligne[1];
	$FOR_LIBELLE= $ligne[2];
	$FOR_DTE_DEBUT= $ligne[3];
	$FOR_DTE_FIN= $ligne[4];
	$FOR_CAPACITE= $ligne[5];
	$FOR_SALLE= $ligne[6];
	$FOR_ADRESSE= $ligne[7];
	$FOR_CP= $ligne[8];
	$FOR_VILLE= $ligne[9];
	$FOR_DESCRIPTION= $ligne[10];
}


?>