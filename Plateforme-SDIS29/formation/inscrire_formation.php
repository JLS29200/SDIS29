<?php
    @session_start();
    require '../assets/connexion/verif_connect.php';
    require '../assets/connexion/connectAD.php';
    require '../assets/perso/elements_perso.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription aux formations</title>
		<link rel="icon" type="image/jpg" href="../images/casque.jpg">
		<link href="../assets/CSS/styleperso.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="container">
			<div class= "header">
				<img class="logog" src="../images/logo.jpg" alt="Logo" width="95%" height="72px"
			</div>
			<img class="logod" src="../images/logosdis29.gif" alt="Logo" width="56px" height="72px">
		</div>
		<div id="nav">
			<?php include '../assets/affichages/menu.php'; ?>
		</div>
		<div class="top">
			<img src="../images/casque.jpg" alt="" width="75" length="75">
			<!-- On affiche le nom et le prénom de l'utilisateur -->
			<span class="nom"><?php echo $nom." ".$prenom;?></span>
			<!-- On affiche un message s'il y a eu une modification de la base de données -->
		</div>
		<hr/>
		<span class="informationliste">
			<div class="caserne">
				<br/>
				<h1>Inscription aux formations</h1>
				<form id="formulaire" action="inscrire.php" method="post">
					<input type="hidden" id="matricule" name="matricule" value="<?php echo $matricule; ?>">
					<input type="radio" id="choix" name="choix" value="1">
					Inscrire
					<input type="radio" id="choix" name="choix" value="2">
					Supprimer l'inscription
					<br/>
					<br/>
					Veuillez choisir une formation : 
					<br/>
					<br/>
					<?php
					   //On selectionne uniquement les formations adaptées à la fonction de l'utilisateur
					   $sql ="SELECT FOR_ID,FOR_LIBELLE FROM formation, exercer WHERE formation.FCT_ID=exercer.FCT_ID and exercer.SP_MATRICULE=$matricule;";
					   $cpt=compteSQL($sql);
					   
					   if(!isset($_POST["formation"])) $_POST["formation"] = 0;
					   
					   if ($cpt>0) {
					       $results = tableSQL($sql);
					       echo "<select size=\"1\" name=\"formation\" id=\"formation\">";
					       foreach ($results as $row) {$selected = "";
					       
					       if($_POST["formation"] == $row[0]) $selected = "selected='selected'";
					       echo "<option $selected value=$row[0]>$row[1]</option>";
					       }
					   } else {
					       echo "<select size=\"1\" name=\"formation\" id=\"formation\" disabled=\"disabled\" >";
					       echo "<option>Aucune information...</option>";
					   }
					   echo "</select>";
					   echo "&nbsp;";
					   echo "<br/><br/>";
					   
					   if ($cpt>0){
					       echo "<input class=\"selectbutton\" name=\"envoyer\" type=\"submit\" value=\"Valider\" title=\"\" />";
					   }else{
					       echo "<input class=\"selectbutton\" name=\"envoyer\" type=\"submit\" value=\"Valider\" title=\"\" disabled=\"disabled\" />";
					   }
					   echo "<br /><br />";
					   if(isset($_GET['message'])){
					       echo $_GET['message'];
					   } 
					   ?>
					</form>
				</div>
				<div class="separator"></div>
				<div class="fonction">
					<h2>Participes aux formations suivantes :</h2>
					<ul>
						<?php
						  $sql = "select FOR_LIBELLE from formation, inscrire WHERE formation.FOR_ID=inscrire.FOR_ID and SP_MATRICULE='$matricule';";
						  $nbFormation = compteSQL($sql);
						  $results = tableSQL($sql);
						  $i=0;
						  
						  echo "<br />";
						  while($i < $nbFormation){
						      foreach ($results as $ligne) {
						          $FCT_ID=$ligne[0];
						          $FCT_LIBELLE=$ligne[0];
						          echo "<li>$FCT_LIBELLE</li>";
						          echo "<br />";$i++;
						      }
						  }
						  ?>
					</ul>
				</div>
				</span>
				<div id="footer">
					<?php include '../assets/affichages/footer.php'; ?>
				</div>
			</div>
		</body>
	</html>