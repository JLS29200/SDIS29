<ul id="menu-deroulant">
	<?php
	   @session_start();
	   //--------------------------------------------------------
	   //    Gestion du menu
	   //--------------------------------------------------------
	
	   //Menu par défaut
	   echo "<li class='nlink'><a href='/index.php'>Accueil</a></li>";
	   //echo "<li class='nlink'><a href='http://mysql.jasonlescour.fr'>Provisoire accès BD</a></li>";
	
	   //--------------------------------------------------------
	   //    Gestion du menu si on est connecté
	   //--------------------------------------------------------
		
	   if ($_SESSION['isConnected()']==true){
	       //On récupère le profil
	       $profil=$_SESSION['profil'];
	       //echo $profil;
	       
	       //Gestion du menu en fonction du profil
	       switch ($profil[0]) {
	        
	           case 1 :
	               //SP
	               $_SESSION['SP']=true;
	               echo "<li class='nlink'><a href='/fiche_perso.php'>Espace Perso</a></li>";
	               echo "<li class='nlink'><a href='/formation.php'>Formation</a></li>";
	               echo "<li class='nlink'><a href='/formation_valide.php'>Formation Validées</a></li>";
	               break;
	            
	           case 2 :
	                //CTA
	               $_SESSION['CTA']=true;
	                echo "<li class='nlink'><a href='/fiche_perso.php'>Espace Perso</a></li>";
	                break;
	            
	           case 3 :
	               //SF
	               $_SESSION['SF']=true;
	               echo "<li class='nlink'><a href='/fiche_perso.php'>Espace Perso</a></li>";
	               echo '
<li class="nlink"><a href="/liste_perso.php">Catalogue</a>
		<ul>
			<li><a href="/liste_perso.php">Liste du Personnel</a></li>
			<li><a href="/formation/CCF/liste_formation.php">Liste des Formations</a></li>
		</ul>

</li>';
	               echo '<li class="nlink"><a href="/validation_formation.php">Validation</a></li>';
	               break;
	               
	           case 9 :
	               //Admin
	               $_SESSION['admin']=true;
	               echo "<li class='nlink'><a href='/fiche_perso.php'>Espace Perso</a></li>";
	               echo "<li class='nlink'><a href='/formation.php'>Formation</a></li>";
	               echo "<li class='nlink'><a href='/formation_valide.php'>Formation Validées</a></li>";
	               echo '
<li class="nlink"><a href="/liste_perso.php">Catalogue</a>
		<ul>
			<li><a href="/liste_perso.php">Liste du Personnel</a></li>
			<li><a href="/formation/CCF/liste_formation.php">Liste des Formations</a></li>
		</ul>
	               		
</li>';
	               echo '<li class="nlink"><a href="/formation/validation_formation.php">Validation</a></li>';
	               echo '<li class="nlink"><a href="http://mysql.jasonlescour.fr">Base de Données</a></li>';
	               break;
	            
	           default :
	               echo "Une erreur est survenue, vueillez nous excuser pour la gène occasionnée.";
	               break;
	       }
	   
	       //Affichage du bouton déconnexion lorsque l'on est connecté
            echo '<li class="nlink" style="float: right"><a href="/assets/connexion/deconnexion.php">DECONNEXION</a></li>';
        }

        else{
        
            //Affichage du bouton connexion lorsque l'on est déconnecté
            echo '<li class="nlink" style="float: right"><a href="/fiche_connect.php">CONNEXION</a></li>';
        }
    
    ?>
</ul>