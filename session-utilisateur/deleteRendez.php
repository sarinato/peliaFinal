<?php 
     session_start();
     require("connect.php");
     $id_user = $_SESSION['id'];
     header("Content-type:application/json;charset=utf-8");

     $dataResult = array();    
//    echo "hy condition";
//    echo $_POST['IDRendez'];
    $requette_supression_rendez = $bdd->prepare('DELETE FROM conntroles_medecin 
    WHERE id_conntroles = :IDRendez ');
        $requette_supression_rendez->execute(array(
            'IDRendez' => $_POST["IDRendez"]
    ));

    echo json_encode($dataResult)
?>