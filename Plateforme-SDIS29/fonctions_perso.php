<?php
    @session_start();
    require 'assets/connexion/verif_connect.php';
    require 'assets/connexion/connectAD.php';
    require 'assets/perso/elements_perso.php';
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title>Fonctions du personnel</title>
	<link rel="icon" type="image/jpg" href="/images/casque.jpg">
	<link href="assets/CSS/styleperso.css" rel="stylesheet" type="text/css" />

  </head>
<body>
    <div class="container">
		<div class= "header">
		 	<img class="logog" src="images/logo.jpg" alt="Logo" width="95%" height="72px"</div>
		 	<img class="logod" src="images/logosdis29.gif" alt="Logo" width="56px" height="72px">

		</div>
	<div id="nav">
		<?php include 'assets/affichages/menu.php'; ?>
 	</div>
														


    	<div class="top">
	<img src="images/casque.jpg" alt="" width="75" length="75"> 
	

	   <!-- On affiche le nom et le prénom de l'utilisateur -->
	<span class="nom"><?php echo $nom." ".$prenom;?></span>
	</div>
<hr/>
	<span class="informationliste">
		<div class="caserne">
<br/>
			Voici les fonctions occupées par : <?php echo $nom." ".$prenom;?><br/>
<br/>			
			
			
			<h4>Ajouter une fonction</h4>
				<form id="formulaire" action="validation_formation.php" method="post">
					<input type="hidden" id="matricule" name="matricule" value="<?php echo $matricule; ?>">
					Veuillez choisir une fonction : 
					<br/>
					<br/>
					<?php
					       //On sélectionne uniquement les formations où des personnes ont été inscrite pour faciliter l'utilisation
					       $sql ="SELECT distinct FCT_ID,FCT_LIBELLE FROM fonction;";
					       $cpt=compteSQL($sql);
					       
					       if(!isset($_POST["fonction"])) $_POST["fonction"] = 0;
					       
					       if ($cpt>0) {
					           $results = tableSQL($sql);
					           echo "<select size=\"1\" name=\"fonction\" id=\"fonction\">";
					           
					           foreach ($results as $row) {
					               $selected = "";
					               if($_POST["fonction"] == $row[0]) $selected = "selected='selected'";
					               echo "<option $selected value=$row[0]>$row[1]</option>";
					           }
					       } else {
					           echo "<select size=\"1\" name=\"fonction\" id=\"fonction\" disabled=\"disabled\" >";
					           echo "<option>Aucune information...</option>";
					       }
					       echo "</select>";
					       
					       echo "<input type='hidden' id='matricule' name='matricule' value='$matricule'>";
					   ?>
					   
					   <br><br>
					   <div class="butonperso">
							<button formaction='fonction/ajout_fonction.php'" class="butong"> <img  height= "32" width="32" src="/images/plus.png"/>  Ajouter  </button>
							<button formaction='liste_perso.php' class="butond"><img  height= "32" width="32" src="/images/porte.png"/> Quitter </button>
						</div>
			</form>
			
			<!-- On affiche un message s'il y a eu une modification de la base de données -->
				<?php
				    if(isset($_GET['message'])){
				        echo $_GET['message'];
				    }
				?>




		</div>
		
		<div class="separator"></div>
		<div class="fonction">
			<div class = "personnes">
	
	<table>
		<tr class="trtop">
			<td class= "tdtopb">Fonctions ID</td>
			<td class= "td">Foctions Libelle</td>
			<td class= "tdtopb">Supprimer</td>
		</tr>
	</table>
<?php
		
		

// on va chercher tous les infos de la table test
$sql = "SELECT fonction.FCT_ID,FCT_LIBELLE FROM exercer, fonction WHERE exercer.FCT_ID = fonction.FCT_ID AND exercer.SP_MATRICULE ='$matricule';";
$nbFonction=compteSQL($sql);
if ($nbFonction==0){
    echo "<br />&nbsp;&nbsp;&nbsp;&nbsp;<font color=red><b>Vous n'avez aucune foncions pour le moment !</b></font>";
}
// on recupere le resultat sous forme d'un tableau
$results = tableSQL($sql);

//pour chaque ligne du tableau $resultats
foreach ($results as $ligne) {
	//on extrait chaque valeur de la ligne courante
	$ID_Fonction = $ligne[0];
	$fonction = $ligne[1];
	//on affiche la ligne courante
	echo "<table  border=\"0px\">";
	
	echo"<tr border=\"1px\">";
	
	echo "<td class= \"td2\" border=\"1px\" width=\"15%\">".$ID_Fonction." </td>";
	
	echo "<td class= \"td\" width=\"25%\">".$fonction."</td>";
	
	
	echo "<form id='' name='' method='post'>";
	   echo "<input type='hidden' id='matricule' name='matricule' value='$matricule'>";
	   echo "<input type='hidden' id='fonction' name='fonction' value='$ID_Fonction'>";
	   echo "<td class= \"td2\" width=\"32\"> <input type='image' src=\"images/delete.png\" title=\"Supprimer...\" formaction='fonction/supprime_fonction.php'></td>";
	echo "</form>";
	
	echo "</tr>";
	echo "</table>";
}
	
?>
		


			</div>
		
		</div>
	</span>
		

		<div id="footer"> 
    			<?php include 'assets/affichages/footer.php'; ?>
 		</div>
    </div>
	

  </body>

</html>