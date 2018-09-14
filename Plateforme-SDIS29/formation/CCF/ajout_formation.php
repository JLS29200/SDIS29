<?php
    @session_start();
    require '../../assets/connexion/connectAD.php';
    require '../../assets/affichages/verif_SF.php';
    
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajout d'une formation</title>
		<link rel="icon" type="image/jpg" href="/images/casque.jpg">
		<link href="/assets/CSS/styleperso.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="container">
			<div class= "header">
				<img class="logog" src="/images/logo.jpg" alt="Logo" width="95%" height="72px">
				<img class="logod" src="/images/logosdis29.gif" alt="Logo" width="56px" height="72px">
			</div>
		
		<div id="nav">
			<?php include '../../assets/affichages/menu.php'; ?>
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
					<label> Identifiant<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Intitul&eacute;<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Date de d&eacute;but<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Date de Fin<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Description<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Capacit&eacute;<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Salle :</label>
					<br/>
					<br/>
					<label> Adresse<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Code Postal<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Ville<span class="asterix">*</span> :</label>
					<br/>
					<br/>
					<label> Fonction Associ&eacute;e :</label>
				</div>
				<form id="modif-perso" name="modif-perso" method="post" action="inscription_formation.php">
					<div class="champ2">
						<input id="FOR_ID" name='FOR_ID' type="text" placeholder="Identifiant" value="">
						<br/>
						<br/>
						<input id="Intitule" name="Intitule" type="text" placeholder="Intitul&eacute;" value="">
						<br/>
						<br/>
						<input id="DTE_DEBUT" name="DTE_DEBUT" type="date" value="">
						<br/>
						<br/>
						<input id="DTE_FIN" name="DTE_FIN" type="date" value="">
						<br/>
						<br/>
						<input id="Description" name="Description" type="text" placeholder="Description" value="">
						<br/>
						<br/>
						<input id="Capacite" name="Capacite" type="number" placeholder="Capacit&eacute;" value="">
						<br/>
						<br/>
						<input id="Salle" name="Salle" type="text" placeholder="Salle" value="NULL">
						<br/>
						<br/>
						<input id="Adresse" name="Adresse" type="text" placeholder="Adresse" value="">
						<br/>
						<br/>
						<input id="CP" name="CP" type="number" placeholder="CP" value="">
						<br/>
						<br/>
						<input id="Ville" name="Ville" type="text" placeholder="Ville" value="">
						<br/>
						<br/>
						<?php require '../../fonction/liste_fonction.php'; ?>
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
					<?php include '../../assets/affichages/footer.php'; ?>
				</div>
			
			</div>
		</body>
	</html>

