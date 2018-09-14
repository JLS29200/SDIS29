<?php
    
	require '../../assets/connexion/connectAD.php';
    
    //-------------------------------------------
    //     On récupères les variables
    //-------------------------------------------
    
    $FOR_ID=$_POST['FOR_ID'];
    
    //-------------------------------------------
    //            Suppréssion de la formation
    //-------------------------------------------
    
   	 	$sql="DELETE FROM formation WHERE FOR_ID=$FOR_ID;";
        $result=executeSQL($sql);
        
        echo "<meta http-equiv='refresh' content='0,url=liste_formation.php?message=<font color=red><b>La suppr�ssion a &eacute;t&eacute; effectu&eacute;e.</b></font>'>";

?>