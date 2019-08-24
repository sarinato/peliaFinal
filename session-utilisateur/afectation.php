<?php
 session_start();
 require("connect.php");
 header("Content-type:application/json;charset=utf-8");

    $dataResult = array();
    $NumeroMedecin = $_POST['NumeroMedecin'];
    $error = false;
    if(empty($NumeroMedecin)){
        $dataResult['NumeroMedecin'] = 1;
        $error = true;
    }
 $id_user = $_SESSION['id'];
 if ($error ==false){
    print_r($_POST);
    $i=1;
    $t=0;
    $incrementation = $_POST["incrementation"];
   
    while($t < $incrementation){
        if(isset($_POST["selected_medic".$i])){
        $medic_afected =  $_POST['idMedAjout'.$i];
        $requete_temps = $bdd->prepare('  UPDATE temps_prises 
        SET id_medecin= :idMedecin
        WHERE id_temps=:idTemps');
            $requete_temps->execute(array(
                'idMedecin' => $_POST["idMedecin"],
                'idTemps' => $_POST["idTempsPrise".$i]
        ));
        }
        $i++;
        $t++;
    }
 }
 if (isset($_POST['modifierCordonnee'])){
    $requette_medecin = $bdd->prepare('  UPDATE medecin 
    SET numero_telephone= :numero,email= :email,adresse= :adresse
    WHERE id_medecin=:idMedecin');
        $requette_medecin->execute(array(
            'numero' => $_POST["NumeroMedecin"],
            'email' => $_POST["emailMedecin"],
            'adresse' => $_POST["adresseMedecin"],
            'idMedecin' => $_POST["IDMedecin"]
    ));
 }
 if (isset($_POST['suprimerMedecin'])){


    
$medic_medecin = $bdd->prepare("SELECT * FROM temps_prises 
JOIN medecin
	ON temps_prises.id_medecin = medecin.id_medecin 
	WHERE medecin.id_user=:id_this_user AND temps_prises.id_medecin=:id_this_med");
$medic_medecin->execute(array('id_this_user' =>$id_user,
							'id_this_med'=>$_POST["IDMedecin"]	));
	
$medi_this_medecin = $medic_medecin->fetchAll(PDO::FETCH_ASSOC);
$defaultIdMedecin=0;

foreach( $medi_this_medecin as $one_medec) { 	
	
    $requete_temps = $bdd->prepare('  UPDATE temps_prises 
    SET id_medecin= :idMedecin
    WHERE id_temps=:idTemps');
        $requete_temps->execute(array(
            'idMedecin' => $defaultIdMedecin,
            'idTemps' => $one_medec["id_temps"]
    ));
 }
 $requette_supression_medecin = $bdd->prepare('DELETE FROM medecin 
 WHERE id_medecin = :idMedecin ');
     $requette_supression_medecin->execute(array(
        
         'idMedecin' => $_POST["IDMedecin"]
 ));
}
echo json_encode($dataResult);

?>

 