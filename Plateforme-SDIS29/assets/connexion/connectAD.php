<?php
require "AccesDonnees.php";

$ip=explode(".",$_SERVER['SERVER_ADDR']);

/*echo $_SERVER['SERVER_ADDR'];

echo "IP : $ip[0]<br />"; */

switch ($ip[0]) {
    
    case 192 :
        //local
        $host = "82.64.36.41"; //IP LOCAL : 192.168.0.10  //IP PUBLIC : 82.64.36.41
        $user = "SDIS29";
        $password = "Iroise29";
        $dbname = "SDIS29";
        $port="3307";
        break;
        
    case 31 :
        //hostinger
        $host = "mysql.hostinger.fr";
        $user = "************";
        $password = "*********";
        $dbname = "*********";
        $port="3306";
        break;
        
    case 212 :
        //free
        $host="localhost";
        $user = "root";
        $password = "Iroise29";
        $dbname = "SDIS29";
        $port="3306";
        break;
        
    default :
        exit ("Serveur non reconnu...");
        break;
}



$connexion=connexion($host,$port,$dbname,$user,$password);

/*
 * echo "host : $host - user : $user - pssword : $password <br />";
 * if ($connexion) {
    echo "Connexion reussie $host:$port<br />";
    echo "Base $dbname selectionnee... <br />";
    echo "Mode acces : $modeacces<br />";
}
else
	echo "<br />Pb cnx...";
*/

//deconnexion();
?>

