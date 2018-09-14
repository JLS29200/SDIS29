<?php
    @session_start();
    require 'assets/connexion/connectAD.php';
    require 'assets/affichages/verif_SF.php';
    
    $matricule=$_POST['matricule'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajout d'un utilisateur</title>
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
			<!-- On affiche le nom et le prénom de l'utilisateur connecté -->
			<span class="nom"><span class="asterix">*</span> Champs obligatoires</span>
			<!-- Affichage d'un éventuel message -->
			<?php
			     if(isset($_POST['message'])){
			         echo $_POST['message'];
			     }
			?>
		</div>
		<hr/>
		<span class="informationliste2">
			<div class="infocentre">
				<br/>
				<div class="champ">
					<label> Matricule<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Nom<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Pr&eacute;nom<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Date de naissance<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Profil<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Statut<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Grade<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Date d'obtention :</label>
					<br/>
					<br/>
					<label> R&eacute;cepteur d'alerte<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> T&eacute;l&eacute;phone fixe :</label>
					<br/>
					<br/>
					<label> T&eacute;l&eacute;phone portable :</label>
					<br/>
					<br/>
					<label> CIS<span class="asterix">*</span> :</label>
				</div>
				<form id="modif-perso" name="modif-perso" method="post" action="assets/perso/inscription_perso.php">
					<div class="champ2">
						<input id="matricule" name='matricule' type="number" placeholder="Matricule" value="">
						<br/>
						<br/>
						<input id="Nom" name="Nom" type="text" placeholder="Nom" value="">
						<br/>
						<br/>
						<input id="Prenom" name="Prenom" type="text" placeholder="Prénom" value="">
						<br/>
						<br/>
						<input id="dateNAISS" name="dateNAISS" type="date" value="">
						<br/>
						<br/>
						<?php require 'assets/perso/liste_Profil.php';?>
						<br/>
						<br/>
						<?php require 'assets/perso/liste_Statut_Ajout.php';?>
						<br/>
						<br/>
						<?php require 'assets/perso/liste_Grade_Ajout.php';?>
						<br/>
						<br/>
						<input id="date" name="date" type="date" value="">
						<br/>
						<br/>
						<input id="bip" name="bip" type="number" placeholder="N° BIP" value="">
						<br/>
						<br/>
						<input id="num_Fix" name="num_Fix" type="tel" placeholder="Téléphone Fixe" value="NULL">
						<br/>
						<br/>
						<input id="num_Port" name="num_Port" type="tel" placeholder="Téléphone Portable" value="NULL">
						<br/>
						<br/>
						<?php require 'liste_CIS.php'; echo "<br/>";?>
					</div>
					<div class="divbuton">
						<br/>
						<br/>
						<button type="submit" class="buton"><img src = "/images/ok.jfif"  width="32" height="32">Valider</button>
						<button type="reset" class="buton"><img src = "/images/cross.png"  width="32" height="32">Annuler</button>
					</div>
				</form>
				</div>
				
				<div id="footer">
					<?php include 'assets/affichages/footer.php'; ?>
				</div>
			
			</div>
		</body>
	</html>

