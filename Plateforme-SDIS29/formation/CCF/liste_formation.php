<?php 
    @session_start();
    require '../../assets/connexion/verif_connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<title>Liste des frmations</title>
	<link rel="icon" type="image/jpg" href="/images/casque.jpg">
	<link href="/assets/CSS/styleperso.css" rel="stylesheet" type="text/css" />

  </head>
<body>
    <div class="container">
		<div class= "header">
		 	<img class="logog" src="/images/logo.jpg" alt="Logo" width="95%" height="72px"</div>
		 	<img class="logod" src="/images/logosdis29.gif" alt="Logo" width="56px" height="72px">

		</div>
	<div id="nav">
		<?php include '../../assets/affichages/menu.php'; ?>
 	</div>
														


    	<div class="top">
	<img src="images/casque.jpg" alt="" width="75" length="75"> 
	

	<!-- Chercher le nom/pr�nom dans la base de donn�es -->
	<!-- Exemple --> <span class="nom"><?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></span>
	</div>
<hr/>
	<span class="informationliste">
		<div class="caserne">
<br/>
			Voici la lite des formations ci-contre :
			<br/><br/>		
			
			
			<div class="butonperso">
				<button onclick="location.href='ajout_formation.php'" class="butong"> <img  height= "32" width="32" src="/images/plus.png"/>  Ajouter  </button>
				<button onclick="location.href='/fiche_perso.php'" class="butond"><img  height= "32" width="32" src="/images/porte.png"/> Quitter </button>
			</div>
<?php
            require '../../assets/connexion/connectAD.php';
			
			echo "&nbsp;";
        		
        			echo "<br /><br />";
        			if (isset($_GET['message']))
        			    echo $_GET['message'];
        			    else
        			        echo "&nbsp;";
        	?>




		</div>
		
		<div class="separator"></div>
		<div class="fonction">
			<div class = "personnes">
	
	<table>
		<tr class="trtop">
			<td class= "td">Identifiant</td>
			<td class= "td">Debut </td>
			<td class= "tdtopb">Informations</td>
			<td class= "tdtop">Supprimer</td>
		</tr>
	</table>
<?php
		
		

// on va chercher tous les infos de la table test
$sql = "SELECT FOR_ID,FOR_DTE_DEBUT FROM formation;";

// on recupere le resultat sous forme d'un tableau
$results = tableSQL($sql);

//pour chaque ligne du tableau $resultats
foreach ($results as $ligne) {
	//on extrait chaque valeur de la ligne courante
	$ID = $ligne[0];
	$DTE_Debut = $ligne[1];
	$matricule=$ligne[2];
	//on affiche la ligne courante
	echo "<table  border=\"0px\">";
	
	echo"<tr border=\"1px\">";
	
	echo "<td class= \"td\" border=\"1px\" width=\"15%\">".$ID." </td>";
	
	echo "<td class= \"td\" width=\"25%\">".$DTE_Debut."</td>";
	
	
	echo "<form id='' name='' method='post'>";
	   //echo "<td class= \"td2\" width=\"32\"> <a href=\"personnel.php?matricule=$matricule\"><img src=\"images\modifier.png\" title=\"Modifier...\" /></a></td>";
	echo "<input type='hidden' id='matricule' name='FOR_ID' value='$ID'>";
	   echo "<td class= \"td2\" width=\"32\"> <input type='image' src=\"/images\modifier.png\" title=\"Modifier...\" formaction='modif_infos_formation.php'></td>";
	   echo "<td class= \"td3\" width=\"32\"> <input type='image' src=\"/images/delete.png\" title=\"Supprimer...\" formaction='supprime_formation.php'></td>";
	
	   //echo "<td class= \"td3\" width=\"32\"> <a href=\"assets/perso/supprime_perso.php?matricule=$matricule\"> <img src=\"images/delete.png\"  onclick=\"if(!confirm('Voulez-vous Supprimer')) return false;\" title=\"Supprimer...\" /></a><br /></td>";
	echo "</form>";
	
	echo "</tr>";
	echo "</table>";
}
	
?>
		


			</div>
<br/>
			
			

		
		</div>
	</span>
		

		<div id="footer"> 
    			<?php include '../../assets/affichages/footer.php'; ?>
 		</div>
    </div>
	

  </body>

</html>