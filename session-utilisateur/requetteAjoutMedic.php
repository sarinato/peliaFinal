<?php
 session_start();
 require("connect.php");
$id_user = $_SESSION['id'];

// All the variables are here

    header("Content-type:application/json;charset=utf-8");
   $f1 = '';
   $d1 = '';
   $f2 = '';
   $d2 = '';
   $f3 = '';
   $d3 = '';
   $f4 = '';
   $d4 = '';
   $nomMedic = $_POST['nomMedic'];    
   $typeMedic = $_POST['typeMedic'];
   $finTraitement = ($_POST["limiter_seleted"] == 'limiter' ? $_POST['dureeTraitement'] : 99999);
   $permanant = $_POST['permanant'];
   $maladie = $_POST['maladie'];
   $nombre_fois = $_POST['fDay'];
   $f1=$_POST['frequenceJ1'];
   $d1=$_POST['doseF1'];
   $f2=$_POST['frequenceJ2'];
   $d2=$_POST['doseF2'];
   $f3=$_POST['frequenceJ3'];
   $d3=$_POST['doseF3'];
   $f4=$_POST['frequenceJ4'];
   $d4=$_POST['doseF4'];
   $jours_selection = $_POST['jour_selectionne'];
   $anId2_seleted = $_POST['anId2_seleted'];
   $lundi = $_POST["lundi"];
   $mardi = $_POST["mardi"] ;
   $mercredi = $_POST["mercredi"] ;
   $jeudi = $_POST["jeudi"] ;
   $vendredi = $_POST["vendredi"];
   $samedi = $_POST["samedi"];
   $dimanche = $_POST["dimanche"];
   $interval = $_POST['interval_prise'];
   $typeJour = $_POST['typeJour'];
   $date_debut = $_POST['dateDebut'];
   $stockMedic = $_POST['stockMedic'];
   $error = false;
   $dataResult = array();

    // The Conditions:

    // echo $nombre_fois;
    if(empty($nomMedic)){
        $dataResult['nomMedic'] = 1;                    
        $error = true;
    }
    if($typeMedic == "select"){
        $dataResult['typeMedic'] = 2;                    
        $error = true;
    }
    if(empty($maladie)){
        $dataResult['maladie'] = 3;                    
        $error = true;
    }

    if($typeJour == 'all'){
        $dataResult['typeJour'] = 100;                    
        
    }
    if($typeJour == 'specifique'){        
        if($lundi == 'yes' || $mardi == 'yes' || $mercredi == 'yes' || $jeudi == 'yes' || $vendredi == 'yes' || $samedi == 'yes' || $dimanche == 'yes'){
            $dataResult['typeJour'] = 200;                    
        }
        else{
            $dataResult['typeJour'] = 202;
            $error = true;
        }
    }
    if($typeJour == 'interval'){
        if(empty($date_debut)){
            $dataResult['typeJour'] = 300;                    
            $error = true;
        }        
    }
    if(empty($stockMedic)){
        $dataResult['stockMedic'] = 4;
        $error = true;
    }
    if($finTraitement == -1){
        $dataResult['finTraitement'] = 5;
        $error = true;     
    }    

    // Frequence
    $doses = [$f1,$d1,$f2,$d2,$f3,$d3,$f4,$d4];

    $nbr = intval($nombre_fois);
    // echo("\n".$nbr."!!!!!!!!!!!!!!!!!!!!!!!!!!!!\n");    
        // echo "\n111111111111111111111111";
        for($i = 0;$i< $nbr*2; $i++){
            if(($doses[$i] == "")){            
                $dataResult['fDay'] = 4;
                $error = true;            
            }    
        } 
    
    // if($nbr == "2"){
    //     // echo "\n222222222222222222222";
    //     for($i = 0;$i< 4; $i++){
    //         if(($doses[$i] == "")){            
    //             $dataResult['fDay'] = 4;
    //             $error = true;            
    //         }    
    //     } 
    // }
    // if($nbr == "3"){
    //     // echo "\n333333333333333333333";
    //     for($i = 0;$i< 6; $i++){
    //         if(($doses[$i] == "")){            
    //             $dataResult['fDay'] = 4;
    //             $error = true;            
    //         }    
    //     } 
    // }
    // if($nbr == "4"){
    //     // echo "\n444444444444444444";
    //     for($i = 0;$i< 8; $i++){
    //         if(($doses[$i] == "")){            
    //             $dataResult['fDay'] = 4;
    //             $error = true;            
    //         }    
    //     } 
    // }                                           
    if ($error == false){
        $dataResult['sent'] = 1;
        // print_r($_POST);
        $select_medic = $bdd->prepare("SELECT id_medicament FROM medicaments WHERE nom_medicament = :medic AND type_medicament=:type_medic");   
        $select_medic->execute(array(
            ':medic' =>$_POST['nomMedic'],
            ':type_medic'=>$_POST['typeMedic']
        ));
        $id_medic1 = $select_medic->fetch(PDO::FETCH_ASSOC);
        $id_medic = $id_medic1['id_medicament'];
        $id_medecin = 0;
        $finTraitement = (isset($_POST["limiter_seleted"])) ? $_POST['dureeTraitement'] : 99999;

        $nombre_fois = $_POST['frequenceJourn'];

        $f1=$_POST['frequenceJ1'];
        $d1=$_POST['doseF1'];

        $f2=$_POST['frequenceJ2'];
        $d2=$_POST['doseF2'];

        $f3=$_POST['frequenceJ3'];
        $d3=$_POST['doseF3'];

        $f4=$_POST['frequenceJ4'];
        $d4=$_POST['doseF4'];
       
        $requete_temps = $bdd->prepare('INSERT INTO temps_prises(`id_medicament`, `id_user`,`id_medecin`,`nombre_fois`, `f1`,`dose_medicament1`, `f2`,`dose_medicament2`, `f3`,`dose_medicament3`, `f4`,`dose_medicament4`,`date_insertion`,`date_fin`) 
        VALUES(:id_medic, :id_user,:id_medecin,:nombre_fois, :f1,:dose_medicament1, :f2,:dose_medicament2, :f3,:dose_medicament3, :f4,:dose_medicament4,NOW(),NOW()+INTERVAL :fin  DAY)');
            $requete_temps->execute(array(
                'id_medic' => $id_medic,
                'id_user' => $id_user,
                'id_medecin' => $id_medecin,
                'nombre_fois' => $nombre_fois,
                'f1' => $f1,
                'dose_medicament1' => $d1,
                'f2' => $f2,
                'dose_medicament2' => $d2,
                'f3' => $f3,
                'dose_medicament3' => $d3,
                'f4' => $f4,
                'dose_medicament4' => $d4,
                'fin' => $finTraitement 
        ));


        $select_medic_user = $bdd->prepare("SELECT id_temps FROM temps_prises WHERE id_medicament = :medic AND id_user=:id_user");   
        $select_medic_user->execute(array(
            ':medic' =>$id_medic,
            ':id_user'=>$id_user
        ));
        $select_id_temps = $select_medic_user->fetch(PDO::FETCH_ASSOC);
        
       
        $id_temps = $select_id_temps['id_temps'];
        $jours_selection = $_POST['jour_selectionne'];
        $lundi=$mardi=$mercredi=$jeudi=$vendredi=$samedi=$dimanche=0;
  
        if($jours_selection == "all" || $jours_selection == "specifique") {
            $methode = 0;
            if($jours_selection == "all"){
                $lundi=$mardi=$mercredi=$jeudi=$vendredi=$samedi=$dimanche=1;
            }
            else{
                $lundi = (isset($_POST["lundi"])) ? 1 : 0;
                $mardi = (isset($_POST["mardi"])) ?  1 : 0;
                $mercredi = (isset($_POST["mercredi"])) ?  1 : 0;
                $jeudi = (isset($_POST["jeudi"])) ?  1 : 0;
                $vendredi = (isset($_POST["vendredi"])) ? 1 : 0;
                $samedi = (isset($_POST["samedi"])) ? 1 : 0;
                $dimanche = (isset($_POST["dimanche"])) ? 1 : 0;
            }
            $requete_jours = $bdd->prepare("INSERT INTO jours_prises(`id_temps`, `methode`,`Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`,`Saturday`,`Sunday`) 
            VALUES(:id_temps, :methode,:lundi, :mardi, :mercredi, :jeudi, :vendredi,:samedi,:dimanche)");
            $requete_jours->execute(array(
                'id_temps' => $id_temps,
                'methode' => $methode,
                'lundi' => $lundi,
                'mardi' => $mardi,
                'mercredi' => $mercredi,
                'jeudi' => $jeudi,
                'vendredi' => $vendredi,
                'samedi'=>$samedi,
                'dimanche'=>$dimanche
            ));
        }
        elseif($jours_selection == "interval")  {
            $methode = 1;
            $interval = $_POST['interval_prise'];
            $date_debut = $_POST['dateDebut'];
            $requete_jours = $bdd->prepare("INSERT INTO jours_prises(`id_temps`,`methode`, `date_debut`, `date_prise`) 
            VALUES(:id_temps, :methode,:datededebut ,:datededebut +INTERVAL :interval  DAY)");
            $requete_jours->execute(array(
                'id_temps' => $id_temps,
                'methode' => $methode,
                'datededebut'=>$date_debut,
                'interval'=>$interval
            ));
        }
    
    }
    else if($error == true){
        $dataResult['error'] = 1;
    }
    echo json_encode($dataResult);
    ?>
  