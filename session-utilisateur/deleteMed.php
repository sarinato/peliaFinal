<?php 
    session_start();
    require("connect.php");
    header("Content-type:application/json;charset=utf-8");
    $id_user = $_SESSION['id'];
?>

<?php
//  if (isset($_POST['suprimerMedecin'])){

$dataResult = array();    
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
// }
$dataResult['deleted'] = 1;
echo json_encode($dataResult);
?>