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
				    if(isset($_GET['message'])){
				        echo $_GET['message'];
				    }
				?>
			</div>
			<hr/>
			<div class="informationliste">
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
							<?php
							     echo "<input id='matricule' name='matricule' type='hidden' value='$matricule'>";
							     echo $matricule;
							     echo "<br/><br/>";
							     echo $nom;
							     echo "<br/><br/>";
							     echo $prenom;
							     echo "<br/><br/>";
							     echo $dateNAISS;
							     echo "<br/><br/>";
							     $select_profil_user="SELECT PROFIL_LIBELLE FROM profil, login where profil.PROFIL_ID=login.LOG_PROFIL and SP_MATRICULE='$matricule';";
							     $profil_user=champSQL($select_profil_user);
							     echo $profil_user;
							     echo "<br/><br/>";
							     $sql="SELECT STATUT_LIBELLE FROM pompier,statut where statut.STATUT_ID=pompier.STATUT_ID and SP_MATRICULE=$matricule;";
							     echo $result=champSQL($sql);
							     echo "<br/><br/>";
							     $sql="SELECT GRA_LIBELLE FROM pompier,grade where grade.GRA_ID=pompier.GRA_ID and SP_MATRICULE=$matricule;";
							     echo $result=champSQL($sql);
							?>
							<br/>
							<br/>
							<input id="date" name="date" type="date" value="">
							<br/>
							<br/>
							<?php 
							     echo $BIP;
							     echo "<br/><br/>";
							     echo $tel_Fixe;
							     echo "<br/><br/>";
							     echo $tel_Port;?>
							     <br/>
						</div>
					
				</div>
						
						<div class="divbuton2">
							<hr/>
								<button formaction="/formation_valide_user.php" class="boutonbip"><img class="centrer" width='32' height=32' src="/images/sac.jpg">Formation Validées</img></button>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button formaction="/formation/inscrire_formation.php" class="boutonbip"><img class="centrer" width='32' height=32' src="/images/sac.jpg">Formation Inscription</img></button>
							<br/><br/>								
								<button formaction="/fonctions_perso.php" class="buton"><img src = "/images/cross.png"  width="32" height="32">Fonctions</button>
							<br/><br/>							
								<button formaction="/modif_infos_user.php" class="buton"><img src = "/images/cross.png"  width="32" height="32">Modifier</button>
						</div>
					</form>

				
				<div id="footer">
					<?php include 'assets/affichages/footer.php'; ?>
				</div>
			</div>
		</body>
	</html>

