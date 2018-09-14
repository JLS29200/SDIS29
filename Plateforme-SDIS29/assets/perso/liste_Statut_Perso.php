<?php
            $sql ="SELECT STATUT_ID, STATUT_LIBELLE FROM statut;";
			$cpt=compteSQL($sql);
			
			//On récupère le statut de l'utilisateur
			$select_statut_user="SELECT STATUT_ID FROM pompier where SP_MATRICULE=$matricule;";
			$statut_user=champSQL($select_statut_user);
			
			if(!isset($_POST["statut"])) $_POST["statut"] = 0;
			
			
			if ($cpt>0) {
				$results = tableSQL($sql);
				echo "<select size=\"1\" name=\"statut\" id=\"statut\">";
				foreach ($results as $row) {
				    $selected = "";
				    if($statut_user == $row[0]) $selected = "selected='selected'";
				    
				    echo "<option $selected value=$row[0]>$row[1]</option>";
					 
					
													
				}
			} else {
				
				echo "<select size=\"1\" name=\"numero\" id=\"numero\" disabled=\"disabled\" >";
				echo "<option>Aucune information...</option>";
			}
			
			
			echo "</select>";
        	?>