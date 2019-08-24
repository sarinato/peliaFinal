

<?php
    session_start();
    require("connect.php");
    $id_user = $_SESSION['id'];
    $id_medecin = $_POST['medecinSelected'];
    
        if (isset($_POST['ajoutControle'])){
            print_r($_POST);
            $nom_conntroles=$_POST['nomRend'];
            $date_conntroles=$_POST['dateRendez'];
            $heure_conntroles=$_POST['timeRendez'];
            $rappel_conntroles=$_POST['heureRappel'];
            $emplacement=$_POST['LocMed'];
            $remarque=$_POST['RemarqueMed'];
            if(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "30 minutes avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (30 * 60));
            }
            elseif(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "1 heure avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (60 * 60));
            }
            elseif(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "2 heure avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (2 * 60 * 60));
            }
            elseif(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "3 heure avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (3 * 60 * 60));
            }
            elseif(isset($_POST["heureRappel"]) && ($_POST["heureRappel"]== "4 heure avant")){
                $timestamp = strtotime($heure_conntroles.":00");
                $rappel_heure = date("H:i:s",$timestamp - (4 * 60 * 60));
            }
            $requete_Ajout_medecin = $bdd->prepare('INSERT INTO conntroles_medecin(`id_user`,`id_medecin`, `nom_conntroles`,`date_conntroles`,`heure_conntroles`, `rappel_conntroles`,`emplacement`,`remarque`, `rappel_text`) 
            VALUES(:id_user,:id_medecin, :nom_conntroles, :date_conntroles, :heure_conntroles,:rappel_heure, :emplacement,:remarque,:rappel_conntroles)');
               if(
            $requete_Ajout_medecin->execute(array(
                    'id_user' => $id_user,
                    'id_medecin' => $id_medecin,
                    'nom_conntroles' => $nom_conntroles,
                    'date_conntroles' => $date_conntroles,
                    'heure_conntroles' => $heure_conntroles,
                    'rappel_conntroles' => $rappel_conntroles,
                    'emplacement' => $emplacement,
                    'remarque' => $remarque,
                    'rappel_heure'=>$rappel_heure
            ))){
                echo "hello word";
            }else{
                echo "khawartiha al9owad";
            }
    
        }



    

?>