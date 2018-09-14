<?php
    @session_start();
    require 'assets/affichages/verif_SP.php';
    require 'assets/connexion/connectAD.php';
    require 'formation/infos_formation.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formations</title>
		<link rel="icon" type="image/jpg" href="/images/casque.jpg">
		<link href="assets/CSS/styleperso.css" rel="stylesheet" type="text/css" >
	</head>
	<body>
		<div class="container">
			<div class= "header">
				<img class="logog" src="images/logo.jpg" alt="Logo" width="95%" height="72px"/>
				<img class="logod" src="images/logosdis29.gif" alt="Logo" width="56px" height="72px"/>
			</div>
			<div id="nav">
				<?php require 'assets/affichages/menu.php'; ?>
			</div>
			<div class="top">
				<img src="images/casque.jpg" alt="" width="75" length="75">
				<!-- On affiche le nom et le prénom de l'utilisateur connecté -->
			<span class="nom"><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></span>
				<!-- On affiche un message s'il y a eu une modification de la base de données -->
				<?php if(isset($_POST['message'])){
				    echo $_POST['message'];
				}
				?>
			</div>
			<hr/>
			<span class="informationforma">
				<div class="infogaucheforma">
					<br/>
					<br/>
					<?php
					   if ($nbFormation==0){
					       echo "Vous ne participez, pour le moment, à aucune formation !";
					   }
					   echo "<ul>";
					   while($i<$nbFormation){
					       foreach ($results as $ligne) {
					           $FOR_LIBELLE=$ligne[0];
					           echo "<li>$FOR_LIBELLE</li>";
					           echo "<br /><br /><br /><br /><br />";
					           $i++;
					       }
					   }
					   echo "</ul>";
					   ?>
					   <br/>
					</div>
						<div class="infodroiteforma">
							<br/>
							<br/>
							<?php
							while($x<$nbFormation){
							    foreach ($results as $ligne) {
							        $FOR_DTE_DEBUT=$ligne[1];
							        $FOR_DTE_FIN=$ligne[2];
							        $FOR_SALLE=$ligne[3];
							        $FOR_ADRESSE=$ligne[4];
							        $FOR_CP=$ligne[5];
							        $FOR_VILLE=$ligne[6];
							        $FOR_DESCRIPTION=$ligne[7];
							        echo "Du $FOR_DTE_DEBUT au $FOR_DTE_FIN <br /> $FOR_SALLE, $FOR_ADRESSE <br /> $FOR_CP $FOR_VILLE";
							        echo "<br /> $FOR_DESCRIPTION";
							        echo "<br /><br /><br />";
							        $x++;
							    }
							}
							?>
							<br/>
						</div>
						<div class="divbuton3">
							<br/>
								<button onclick="location.href='fiche_perso.php'" class="buton"><img src = "/images/cross.png"  width="32" height="32"> &nbsp;  Annuler</button>
						</div>
					</span>
					<div id="footer">
						<?php include 'assets/affichages/footer.php'; ?>
					</div>
				</div>
			</body>
		</html>

