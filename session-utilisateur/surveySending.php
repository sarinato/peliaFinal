<?php
    session_start();
    require("connect.php");
    header("Content-type:application/json;charset=utf-8");
    $dataResult = array();
    $dataResult["success"] = 33;
    $premier='';
    $deuxieme='';
    $troixieme='';
    $quatrieme='';
    echo json_encode($dataResult);
    $error = false;
    $id_user = $_SESSION['id'];
    if ($error==false){
     $t= $_POST['BoucleJoures'] ;
$i =0;
if(!empty($_POST['surveillance'. $i .  "0". $t])){
    $premier=$_POST['surveillance'. $i .  "0". $t];
    }
    if(!empty($_POST['surveillance'. $i .  "1". $t])){
        $deuxieme=$_POST['surveillance'. $i .  "1". $t];
        }
if(!empty($_POST['surveillance'. $i .  "2". $t])){
$troixieme=$_POST['surveillance'. $i .  "2". $t];
}
if(!empty($_POST['surveillance'. $i .  "3". $t])){
    $quatrieme=$_POST['surveillance'. $i .  "3". $t];
    }

while($i<= $_POST['boucleMedicament']){
    // $q=0;
    // echo "hello word";

    // while($q <= $_POST['boucleprises']){
            $requete_Ajout_medecin = $bdd->prepare('INSERT INTO questionnaire(`id_user`, `id_temps`,`date_questionaire`,`prise1`, `prise2`,`prise3`,`prise4`) 
            VALUES(:id_user, :id_temps, :date_questionaire, :prise1,:prise2, :prise3, :prise4)');
               if(
            $requete_Ajout_medecin->execute(array(
                    'id_user' => $id_user,
                    'id_temps' => $_POST['idMedicament'.$i],
                    'date_questionaire' => $_POST['idDateQuestionaire'],
                    'prise1' => $premier,
                    'prise2' => $deuxieme,
                    'prise3' => $troixieme,
                    'prise4' => $quatrieme
            ))){
                $dataResult["success"] = 1;
            }else{
                $dataResult["success"] = 0;
            }
        //     $q++;
        // }
            $i++;
        
        }
        }

        
?>