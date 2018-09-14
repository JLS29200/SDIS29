<?php

    $sql ="SELECT * FROM caserne";
    $cpt=compteSQL($sql);
    
    if(!isset($_POST["numero"])) $_POST["numero"] = 0;
    
    if ($cpt>0) {
        $results = tableSQL($sql);
        echo "<select size=\"1\" name=\"numero\" id=\"numero\">";
        foreach ($results as $row) {
            $selected = "";
            if($_POST["numero"] == $row[0]) $selected = "selected='selected'";
            echo "<option $selected value=$row[0]>$row[1]</option>";
        }
    }else{
        echo "<select size=\"1\" name=\"numero\" id=\"numero\" disabled=\"disabled\" >";
        echo "<option>Aucune information...</option>";
    }
    echo "</select>";
?>