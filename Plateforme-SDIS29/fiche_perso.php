<?php
    @session_start();
    require 'assets/connexion/verif_connect.php';
    require 'assets/connexion/connectAD.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Personnel</title>
		<link rel="icon" type="image/jpg" href="/images/casque.jpg">
		<link href="assets/CSS/styleperso.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php
		  header('Content-type: text/html; charset=UTF-8');
		?>
		<div class="container">
			<div class= "header">
				<img class="logog" src="images/logo.jpg" alt="Logo" width="95%" height="72px"
			</div>
			<img class="logod" src="images/logosdis29.gif" alt="Logo" width="56px" height="72px">
		</div>
		<div id="nav">
			<?php include 'assets/affichages/menu.php'; ?>
		</div>
		<div class="top">
			<img src="images/casque.jpg" alt="" width="75" length="75">
			<!-- On affiche le nom et le prénom de l'utilisateur connecté -->
			<span class="nom"><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></span>
		</div>
		<hr/>
		<span class="information">
			<div class="info">
			
			<!-- On affiche les données de l'utilisateur connecté -->
			&nbsp;&nbsp;&nbsp;Matricule :
			<div class= "matricule">
				<?php 
				    echo $_SESSION['SP_MATRICULE'];
				    echo "<br/>";
				    echo $_SESSION['CIS_NOM'];
				    echo "<br/>";
				    $matricule=$_SESSION['SP_MATRICULE'];
				    $sql="SELECT DATEDIFF(CURRENT_DATE, SP_DTE_NAISSANCE) AS age from pompier where SP_MATRICULE=$matricule;";
				    $result=champSQL($sql);
				    $age=$result/365.2425;
				    echo round ($age,0)." ans";
				 ?>
				<br/>
			</div>
			<br/>
			<br/>
			<br/>
			<?php 
			     echo "&nbsp;&nbsp;&nbsp;Statut :  ";
			     $matricule=$_SESSION['SP_MATRICULE'];
			     $sql="SELECT STATUT_LIBELLE from pompier, statut WHERE statut.STATUT_ID=pompier.STATUT_ID and SP_MATRICULE=$matricule;";
			     $statut=champSQL($sql);
			     
			     echo $statut;
			     echo "<br/><br/>";
			     echo "&nbsp;&nbsp;&nbsp;Grade : ";
			     
			     $matricule=$_SESSION['SP_MATRICULE'];
			     
			     $sql="SELECT GRA_LIBELLE from pompier,grade WHERE grade.GRA_ID=pompier.GRA_ID and SP_MATRICULE=$matricule;";
			     $grade=champSQL($sql);
			     echo $grade;
			     echo "<br/><br/>";
			     echo "&nbsp;&nbsp;&nbsp;Date de naissance : ";
			     echo $_SESSION['date_Naissance'];//On affiche un mesage éventuelif(isset($_POST['message'])){echo $_POST['message'];}echo "<br/><br/><br/><br/><br/>";//Affichage du BIP de l'utilisateurecho "&nbsp;&nbsp;&nbsp;R&eacute;cepteur d'alerte : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";echo $_SESSION['BIP'];
			 ?>
			 <br/><br/>
			 <div class="centre">
			 	<button onclick="location.href='formation.php'" class="boutonbip">
			 		<img class="centrer" width='32' height=32' src="/images/sac.jpg">Formation</img>
			 	</button>
			 </div>
		</div>
		<div class="separator"></div>
		<div class="fonction">
		
		<!-- Afficher le nom des fonctions du pompier, SELECT -->
		<div class="centre">Fonctions occupées</div>
		<ul>
			<?php
			     $SP_MATRICULE=$_SESSION['SP_MATRICULE'];
			     $sql = "select FCT_LIBELLE from fonction, exercer, pompier where fonction.FCT_ID=exercer.FCT_ID and exercer.SP_MATRICULE=pompier.SP_MATRICULE and pompier.SP_MATRICULE='$SP_MATRICULE';";
			     $nbFonction = compteSQL($sql);
			     $results = tableSQL($sql);
			     $i=0;
			     
			     echo "<br />";
			     
			     while($i< $nbFonction){
			         foreach ($results as $ligne) {
			             $FCT_LIBELLE=$ligne[0];
			             echo "<li>$FCT_LIBELLE</li>";
			             echo "<br />";
			             $i++;
			         }
			     } 
			  ?>
		</ul>
		</div>
	</span>
	<div id="footer">
		<?php include 'assets/affichages/footer.php'; ?>
	</div>
</div>
</body>
</html>

