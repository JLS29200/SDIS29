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
		<title>Validations des formations</title>
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
			<!-- On affiche le nom et le prénom de l'utilisateur connecté -->
			<span class="nom"><?php echo $_SESSION['nom']."".$_SESSION['prenom']; ?></span>
			<!-- On affiche un message s'il y a eu une modification de la base de données -->
			<?php
			     if(isset($_POST['message'])){
			         echo $_POST['message'];
			     }
			?>
		</div>
		<hr/>
		<span class="informationliste">
			<div class="caserne">
				<br/>
				<h1>Validation des formations</h1>
				<form id="formulaire" action="validation_formation.php" onchange="this.submit();" method="post">
					<input type="hidden" id="matricule" name="matricule" value="<?php echo $matricule; ?>">
					Veuillez choisir une formation : 
					<br/>
					<br/>
					<?php
					       //On sélectionne uniquement les formations où des personnes ont été inscrite pour faciliter l'utilisation
					       $sql ="SELECT distinct inscrire.FOR_ID,FOR_LIBELLE FROM formation,inscrire WHERE formation.FOR_ID=inscrire.FOR_ID;";
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
					</form>
				</div>
				<div class="separator"></div>
				<div class="fonction">
					<h2>Personnels Inscrits</h2>
					<table>
						<tr class="trtop">
							<td class= "td">
								Nom
							</td>
							<td class= "td">
								Pr&eacute;nom
							</td>
							<td class= "tdtopb">
								Validation
							</td>
						</tr>
					</table>
					<form id='validation' name='validation' action="validation.php" method='get'>
						<?php
						      $formation=$_POST['formation'];
						      $sql = "select inscrire.SP_MATRICULE, SP_NOM, SP_PRENOM from pompier, inscrire WHERE inscrire.SP_MATRICULE=pompier.SP_MATRICULE and FOR_ID='$formation';";
						      $results = tableSQL($sql);
						      //$result1 = afficheRequete($sql);
						      echo "<input id='id_form' name='id_form' type='hidden' value='$formation'>";
						      //pour chaque ligne du tableau 
						      foreach ($results as $ligne) {
						          //on extrait chaque valeur de la ligne courante
						          $matricule = $ligne[0];
						          $nom = $ligne[1];
						          $prenom = $ligne[2];
						          //on affiche la ligne courante
						          echo "<table  border=\"0px\">";
						          echo"<tr border=\"1px\">";
						          echo "<td class= \"td\" border=\"1px\" width=\"15%\">".$nom." </td>";
						          echo "<td class= \"td\" width=\"25%\">".$prenom."</td>";
						          //echo "<input id='matricule' name='matricule' type='hidden' value='$matricule'>";
						          echo "<td class= \"td2\" width=\"32\"> <input name='validation[]' type='checkbox' value='$matricule'></td>";
						          echo "</tr>";
						          echo "</table>";
						      }
						 ?>
						<div class="divbuton">
							<br/>
							<br/>
							<button type="submit" class="buton"><img src = "/images/ok.jfif"  width="32" height="32">Valider</button>
							<button type="reset" class="buton"><img src = "/images/cross.png"  width="32" height="32">Annuler</button>
						</div>
					</form>
				</div>
			</span>
			<div id="footer">
				<?php include '../assets/affichages/footer.php'; ?>
			</div>
		</div>
	</body>
</html>

