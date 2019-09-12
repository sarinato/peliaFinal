<?php
 session_start();
 require("connect.php");
 $id_user = $_SESSION['id'];
 $dataResult = array();
 $error = false;

 $nbrFois = $_POST["nbrFois"];
 $nbr_fois_form = $_POST["manyTimes"];

 $frequenceJ1 = $_POST["frequenceJ1"];
 $doseFreq1 = $_POST["doseFreq1"];
 $frequenceJ2 = $_POST["frequenceJ2"];
 $doseFreq2 = $_POST["doseFreq2"];
 $frequenceJ3 = $_POST["frequenceJ3"];
 $doseFreq3 = $_POST["doseFreq3"];
 $frequenceJ4 = $_POST["frequenceJ4"];
 $doseFreq4 = $_POST["doseFreq4"];

 for($x=0;$x<$nbr_fois_form;$x++){
    'frequenceJ'.$i = $_POST["frequenceJ1"];
    $doseFreq1 = $_POST["doseFreq1"];
 }
 
 for($i=1;$i<=4;$i++){
     if(empty($frequenceJ."$i")){
         $dataResult["frequenceJ"."$i"] = 1;
         $error = true;
     }
     if(empty($doseFreq."$i")){
        $dataResult["doseFreq"."$i"] = 1;
        $error = true;
    }
 }

 if(empty($nbrFois)){
    $dataResult['nbrFois'] = 1;
    $error = true;
 }

 
 if ($error == false){
    print_r($_POST);
        $requete_temps = $bdd->prepare("UPDATE temps_prises 
        SET nombre_fois=:nombre_fois, f1= :f1, f2= :f2, f3= :f3, f4= :f4, dose_medicament1=:dos1, dose_medicament2=:dos2, dose_medicament3=:dos3, dose_medicament4=:dos4
        WHERE id_temps=:idTemps");
            $requete_temps->execute(array(
                'nombre_fois' => $_POST["nbrFois"],
                'f1' => $_POST["frequenceJ1"],
                'dos1' => $_POST["doseFreq1"],
                'f2' => $_POST["frequenceJ2"],
                'dos2' => $_POST["doseFreq2"], 
                 'f3' => $_POST["frequenceJ3"],
                'dos3' => $_POST["doseFreq3"],  
                'f4' => $_POST["frequenceJ4"],
                'dos4' => $_POST["doseFreq4"],
                'idTemps' => $_POST["IDTemps"]

        ));

 }
 echo json_encode($dataResult);
 ?>