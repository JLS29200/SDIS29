<?php

    $matricule=$_SESSION['SP_MATRICULE'];

    $sql="SELECT FOR_LIBELLE,FOR_DESCRIPTION
           FROM formation, valide
           WHERE formation.FOR_ID=valide.FOR_ID and SP_MATRICULE='$matricule';";
    $nbFormation = compteSQL($sql);
    $results = tableSQL($sql);
    $i=0;
    $x=0;
    $y=0;
       
?>