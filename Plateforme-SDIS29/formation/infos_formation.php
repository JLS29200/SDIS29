<?php

    $matricule=$_SESSION['SP_MATRICULE'];

    $sql="SELECT FOR_LIBELLE,FOR_DTE_DEBUT,FOR_DTE_FIN,FOR_SALLE,FOR_ADRESSE,FOR_CP,FOR_VILLE,FOR_DESCRIPTION
           FROM formation, inscrire
           WHERE formation.FOR_ID=inscrire.FOR_ID and SP_MATRICULE='$matricule';";
    $nbFormation = compteSQL($sql);
    $results = tableSQL($sql);
    $i=0;
    $x=0;
    $y=0;
       
?>