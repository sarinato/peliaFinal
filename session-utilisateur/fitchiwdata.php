<?php
date_default_timezone_set('Europe/London');
 require("connect.php");
$today = date("l");
echo $today;
$today_date= date("Y-m-d");
$now_time= date("H:i:s");
$select_methode_interval = $bdd->prepare("SELECT temps_prises.nombre_fois , temps_prises.f1, temps_prises.f2, temps_prises.f3, temps_prises.f4,
                                                  temps_prises.dose_medicament1,temps_prises.dose_medicament2,temps_prises.dose_medicament3,temps_prises.dose_medicament4,
                                                  temps_prises.date_fin, jours_prises.methode,
                                                  medicaments.nom_medicament, medicaments.type_medicament,
                                                  users.nom, users.prenom, users.phone
                                FROM jours_prises
                                INNER JOIN temps_prises 
                                    ON jours_prises.id_temps = temps_prises.id_temps
                                INNER JOIN medicaments 
                                    ON  temps_prises.id_medicament = medicaments.id_medicament
                                INNER JOIN users 
                                    ON  temps_prises.id_user = users.id
                                WHERE jours_prises.date_prise=:Aalerter OR jours_prises.$today=1");   
                                $select_methode_interval->execute(array(
                                    'Aalerter' =>$today_date));
$methode_interval = $select_methode_interval->fetchAll(PDO::FETCH_ASSOC);

foreach($methode_interval as $interval){
    print_r($interval);
        echo "<br>";
    if (($today_date < $interval['date_fin']) ){
        $i=$interval['nombre_fois'];
        while($i){
            if($interval['f'.$i] < $now_time && ($interval['f'.$i] > date('H:i:s',time() - 5 * 60)) ){  
                $message = "rebonjour+Mr.".$interval['nom']."+".$interval['prenom']."+vous+devez+prendre+".$interval['dose_medicament'.$i]."+".$interval['type_medicament'] . "+du+m%E8dicament+ ".$interval['nom_medicament'] . "+%E0+" . $interval['f'.$i];
                $user_phone = substr($interval['phone'],1);

                echo "<script type=\"text/javascript\">
                window.open('https://api.smsmode.com/http/1.6/sendSMS.do?accessToken=zop11KQ9jh8XG07lwglb75KBR57RnVUO&message=".$message."&numero=212".$user_phone."', '_blank')
                </script>";
            }
            $i--;
        }
    }
    
}