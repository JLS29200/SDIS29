<?php
    @session_start();
    require 'assets/affichages/verif_SF.php';
    require 'assets/connexion/connectAD.php';
    require 'assets/perso/elements_perso.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Liste des personnels</title>
		<link rel="icon" type="image/jpg" href="/images/casque.jpg">
		<link href="assets/CSS/styleperso.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="container">
			<div class= "header">
				<img class="logog" src="images/logo.jpg" alt="Logo" width="95%" height="72px">
				<img class="logod" src="images/logosdis29.gif" alt="Logo" width="56px" height="72px">
			</div>
			
			<div id="nav">
				<?php include 'assets/affichages/menu.php'; ?>
			</div>
			<div class="top">
				<img src="images/casque.jpg" alt="" width="75" length="75">
				<!-- On affiche le nom et le prénom de l'utilisateur -->
				<span class="nom"><?php echo $nom." ".$prenom;?></span>
				<!-- On affiche un message s'il y a eu une modification de la base de données -->
				<?php 
				    if(isset($_POST['message'])){
				        echo $_POST['message'];
				    }
				 ?>
			</div>
			<hr/>
			<span class="informationliste">
				<div class="infocentre">
					<br/>
					<div class="champ">
						<label> Matricule :</label>
						<br/>
						<br/>
						<label> Nom :</label>
						<br/>
						<br/>
						<label> Pr&eacute;nom :</label>
						<br/>
						<br/>
						<label> Date de naissance :</label>
						<br/>
						<br/>
						<label> Profil :</label>
						<br/>
						<br/>
						<label> Statut :</label>
						<br/>
						<br/>
						<label> Grade :</label>
						<br/>
						<br/>
						<label> Date d'obtention :</label>
						<br/>
						<br/>
						<label> R&eacute;cepteur d'alerte :</label>
						<br/>
						<br/>
						<label> T&eacute;l&eacute;phone fixe :</label>
						<br/>
						<br/>
						<label> T&eacute;l&eacute;phone portable :</label>
					</div>
					<form id="modif-perso" name="modif-perso" method="post" >
						<div class="champ2">
							<input id="matricule" name='matricule' type="text" value="<?php echo $matricule; ?>">
							<br/>
							<br/>
							<input id="Nom" name="Nom" type="text" value="<?php echo $nom; ?>">
							<br/>
							<br/>
							<input id="Prenom" name="Prenom" type="text" value="<?php echo $prenom; ?>">
							<br/>
							<br/>
							<input id="dateNAISS" name="dateNAISS" type="date" value="<?php echo $dateNAISS; ?>">
							<br/>
							<br/>
							<?php require 'assets/perso/liste_Profil.php';?>
							<br/>
							<br/>
							<?php require 'assets/perso/liste_Statut_Perso.php';?>
							<br/>
							<br/>
							<?php require 'assets/perso/liste_Grade_Perso.php';?>
							<br/>
							<br/>
							<input id="date" name="date" type="date" value="">
							<br/>
							<br/>
							<?php echo $BIP; ?>
							<br/>
							<br/>
							<input id="num_Fix" name="num_Fix" type="tel" value="<?php echo $tel_Fixe; ?>">
							<br/>
							<br/>
							<input id="num_Port" name="num_Port" type="tel" value="<?php echo $tel_Port; ?>">
						</div>
						<div class="divbuton">
							<br/>
							<button formaction="modif_perso.php" type="submit" class="buton"><img src = "/images/ok.jfif"  width="32" height="32">Valider</button>
							<button formaction="personnel.php" type="submit" class="buton"><img src = "/images/cross.png"  width="32" height="32">Annuler</button>
						<br/><br/>
						</div>
					</form>
				</div>
				<div id="footer">
					<?php include 'assets/affichages/footer.php'; ?>
				</div>
			</div>
		</div>
	</body>
</html>

