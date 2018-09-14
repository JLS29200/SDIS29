<?php
    @session_start();
    require 'assets/affichages/verif_SP.php';
    require 'assets/connexion/connectAD.php';
    require 'assets/perso/elements_perso.php';
    require 'formation/infos_formation_valide_user.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Formations Validées</title>
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
			<span class="nom"><?php echo $nom." ".$prenom; ?></span>
				<!-- On affiche un message s'il y a eu une modification de la base de données -->
				<?php if(isset($_POST['message'])){
				    echo $_POST['message'];
				}
				?>
			</div>
			<hr/>
			<span class="informationforma">
				<div class="infogauche">
					<?php
					   if ($nbFormation==0){
					       echo "Vous n'avez pas encore validé de formation !";
					   }else{
					       echo "<h3>Formations validées :</h3>";
					       echo "<br />";
					   }
					   echo "<ul>";
					   while($i<$nbFormation){
					       foreach ($results as $ligne) {
					           $FOR_LIBELLE=$ligne[0];
					           echo "<li>$FOR_LIBELLE</li>";
					           echo "<br /><br /><br />";
					           $i++;
					       }
					   }
					   echo "</ul>";
					   ?>
					   <br/>
					</div>
						<div class="infodroite">
							<h3>Description de la formation</h3>
							<br/>
							<?php
							echo "<ul>";
							while($x<$nbFormation){
							    foreach ($results as $ligne) {
							        $FOR_DESCRIPTION=$ligne[1];
							        echo "<li>$FOR_DESCRIPTION</li>";
							        echo "<br /><br /><br />";
							        $x++;
							    }
							}
							echo "</ul>";
							?>
							<br/>
						</div>
					</span>
					<div id="footer">
						<?php include 'assets/affichages/footer.php'; ?>
					</div>
				</div>
			</body>
		</html>

