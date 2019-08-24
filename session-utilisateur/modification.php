

<?php
 session_start();
 require("connect.php");
 $id_user = $_SESSION['id'];
 if (isset($_POST['modifierFreq'])){
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



 if (isset($_POST['modifierDuree'])){
    print_r($_POST);
    $requette_medecin = $bdd->prepare(' UPDATE temps_prises 
    SET date_fin= NOW()+INTERVAL :fin  DAY
    WHERE id_temps=:idTemps');
        $requette_medecin->execute(array( 'fin' => $_POST["interval_prise"], 'idTemps' => $_POST["IDTemps"]));
 }


 if (isset($_POST['modifierJours'])){
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
        $requette_medecin = $bdd->prepare('  UPDATE jours_prises 
    SET methode= :methode, Monday= :lundi, Tuesday= :mardi, Wednesday= :mercredi , Thursday= :jeudi , Friday= :vendredi,Saturday= :samedi, Sunday= :dimanche 
    WHERE id_temps=:IDTemps');
        $requette_medecin->execute(array(
            'methode' => $methode,
            'lundi' => $lundi,
            'mardi' => $mardi,
            'mercredi' => $mercredi,
            'jeudi' => $jeudi,
            'vendredi' => $vendredi,
            'samedi'=>$samedi,
            'dimanche'=>$dimanche,
            'IDTemps' => $_POST['IDTemps']
        ));
    } elseif($jours_selection == "interval") {
        $methode = 1;
        print_r($_POST);
        echo $methode;
        $interval = $_POST['interval_prise'];
        $date_debut = $_POST['dateDebut'];
        $requette_medecin = $bdd->prepare('  UPDATE jours_prises 
        SET methode= :methode,date_debut= :datededebut, date_prise= :datededebut +INTERVAL :interval  DAY
        WHERE id_temps=:IDTemps');
            $requette_medecin->execute(array(
                'methode' => $methode,
                'datededebut' => $date_debut,
                'interval' => $interval = $_POST['interval_prise'],
                'IDTemps' => $_POST["IDTemps"]
        ));
    }
   
 }


 if (isset($_POST['suprimerMedicament'])){
     echo "hey condition";
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
}

    if (isset($_POST['modifierControle'])){
    echo "pret a modifier le controle";
    $nom_conntroles=$_POST['nomRend'];
    $id_conntrole=$_POST['IDConntroles'];
    $date_conntroles=$_POST['dateRendez'];
    $heure_conntroles=$_POST['timeRendez'];

    // $rappel_conntroles=$_POST['timerappel'];
    $emplacement=$_POST['LocMed'];
    $remarque=$_POST['RemarqueMed'];
    $requette_medecin = $bdd->prepare(' UPDATE conntroles_medecin 
    SET  nom_conntroles= :nom_conntroles, date_conntroles= :date_conntroles, heure_conntroles= :heure_conntroles,  emplacement= :emplacement, remarque= :remarque
    WHERE id_conntroles=:IDTemps');
        $requette_medecin->execute(array(
            'nom_conntroles' => $nom_conntroles,
            'date_conntroles' => $date_conntroles,
            'heure_conntroles' => $heure_conntroles,
            // 'rappel_conntroles' => $rappel_conntroles,
            'emplacement' => $emplacement,
            'remarque' => $remarque,
            'IDTemps' => $_POST["IDConntroles"]
        ));
    }

    if (isset($_POST['suprimerRendez'])){
   echo "hy condition";
   echo $_POST['IDRendez'];
    $requette_supression_rendez = $bdd->prepare('DELETE FROM conntroles_medecin 
    WHERE id_conntroles = :IDRendez ');
        $requette_supression_rendez->execute(array(
            'IDRendez' => $_POST["IDRendez"]
    ));
   }
?>

