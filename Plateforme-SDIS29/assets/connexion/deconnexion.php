<?php 
    include 'connectAD.php';
    @session_start();
    session_destroy();
    echo"<meta http-equiv='refresh' content='0, url=/fiche_connect.php?message=<font color=green><b>Vous &ecirc;tes d&eacute;connect&eacute;.</b></font>'>";
?>