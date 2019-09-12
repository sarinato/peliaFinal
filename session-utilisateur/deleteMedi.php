<?php 

    session_start();
    require("connect.php");
    $id_user = $_SESSION['id'];
    header("Content-type:application/json;charset=utf-8");    
    $dataResult = array();

// if (isset($_POST['suprimerMedicament'])){
    // $requette_supression_observance = $bdd->prepare('DELETE FROM questionnaire 
    // WHERE id_temps = :IDMedicament ');
    //     $requette_supression_observance->execute(array(   
    //         'IDMedicament' => $_POST["IDMedicament"]
    // ));

    $dataResult['success'] = 1;
    $requette_supression_jours = $bdd->prepare('DELETE FROM jours_prises 
    WHERE id_temps = :IDMedicament ');
        $requette_supression_jours->execute(array(   
            'IDMedicament' => $_POST["IDMedicament"]
    ));
    $requette_supression_temps = $bdd->prepare('DELETE FROM temps_prises 
    WHERE id_temps = :IDMedicament ');
        $requette_supression_temps->execute(array(
            'IDMedicament' => $_POST["IDMedicament"]
    ));
// }
echo json_encode($dataResult);