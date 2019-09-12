<?php
include("verificationLogin.php");
require("connect.php");
function dateSimple( $format, $date) {
    return date($format, strtotime($date) ) ;
}
$medicaments = $bdd->prepare("SELECT * FROM temps_prises
                            JOIN medicaments
                                ON  temps_prises.id_medicament = medicaments.id_medicament
		WHERE temps_prises.id_user=:id_this_user");
$medicaments->execute(array('id_this_user' =>$id_user));
$xyz=0;
$valeur_un_jour='0';
$moyen_mensuel = '0';
$valeur_tous_medic='';
$verif=1;
while($xyz < 30){
$today_date_table= dateSimple("Y-m-d","now - ".$xyz . 'Day');
$questionnaires_allMedic = $bdd->prepare("SELECT * FROM questionnaire 
							JOIN temps_prises
								ON questionnaire.id_temps = temps_prises.id_temps 
        WHERE temps_prises.id_user=:id_this_user AND questionnaire.date_questionaire=:dateQues");
        if(
$questionnaires_allMedic->execute(array('id_this_user' =>$id_user,'dateQues'=>$today_date_table))
){
$questionnaireallMedic = $questionnaires_allMedic->fetchAll(PDO::FETCH_ASSOC);



$valeur_un_jour='';
foreach($questionnaireallMedic as $elemntOfChart){
    
    if($elemntOfChart['prise1'] != ''){
        $medicament=($elemntOfChart['prise1']+$elemntOfChart['prise2']+$elemntOfChart['prise3']+$elemntOfChart['prise4'])/$elemntOfChart['nombre_fois'];
        $moyen_mensuel = $moyen_mensuel . '+'. $medicament;
        $valeur_un_jour = $valeur_un_jour . '+'. $medicament;
    }
$verif++;
}
}
$valeur_un_jour = "0" . $valeur_un_jour;
eval( "\$valeur_un_jour = $valeur_un_jour;" );

$Moyenne_journalier = $valeur_un_jour / $verif;

$valeur_tous_medic = $valeur_tous_medic . '"'. $Moyenne_journalier.'",';

$xyz++;
if($xyz == 29){
    
    eval( "\$chihaja3 = $moyen_mensuel;" );
    
}
}
trim($valeur_tous_medic, " ,");
$Moyenne_mensuelle = $chihaja3 / $verif;

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Questionnaire</title>
	<?php
	include "link.php";
    ?>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/json.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

	<!--================ Start Header Menu Area =================-->
	<?php
	include "header.php";
	?>
<div class="container section schedule">

<canvas style="margin-bottom:5%;" id="line-chart" width="800" height="500"></canvas>
</div>

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/stellar.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


	<script src="vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="vendors/jquery-ui/jquery-ui.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/theme.js"></script>
	<script src="js/global.js"></script>
	

	 <!-- Jquery JS-->
	 <script src="vendors/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

	


    <!-- Main JS-->
	<script src="js/global.js"></script>


     <!-- chart JS-->
	<script>

var X = 5267;
new Chart(document.getElementById("line-chart"), {

    type: 'line',
    data: {
        labels: ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30"],
        datasets: [
           
           
        <?php
        $i=1;
        

        $medicament = $medicaments->fetchAll(PDO::FETCH_ASSOC);
        $couleurs = array (
            "1"  => "rgba(60, 186, 159, 1)",
            "2" => "rgba(60, 220, 159, 1)",
            "3"   => "rgba(60, 186, 200, 1)"
        );
        
foreach($medicament as $chihaja2){
    $i_one_medic = 0;
    $valeur_one_medic='';
    while($i_one_medic < 30){
        $today_date_table= dateSimple("Y-m-d","now - ".$i_one_medic . 'Day');
        $questionnaires = $bdd->prepare("SELECT * FROM questionnaire 
							JOIN temps_prises
								ON questionnaire.id_temps = temps_prises.id_temps 
		WHERE temps_prises.id_user=:id_this_user AND temps_prises.id_temps=:id_this_temps AND questionnaire.date_questionaire=:dateQues");
        $questionnaires->execute(array('id_this_user' =>$id_user,'id_this_temps'=>$chihaja2['id_temps'],'dateQues'=>$today_date_table));
        $questionnaire = $questionnaires->fetchAll(PDO::FETCH_ASSOC);
       
        $medicament = '0';
        
        foreach($questionnaire as $elemntOfChart){
            $medicament=($elemntOfChart['prise1']+$elemntOfChart['prise2']+$elemntOfChart['prise3']+$elemntOfChart['prise4'])/4;
           
        }
        $valeur_one_medic = $valeur_one_medic . '"'. $medicament.'",';
        trim($valeur_one_medic, " ,");
        $i_one_medic++;
    }
        ?>
        
        
        {
            data: [<?php echo $valeur_one_medic ?>],
            label: "<?php echo $chihaja2['nom_medicament']; ?>",
            borderColor: "<?php echo $couleurs[$i]; ?>",
            fill: false,
            backgroundColor: [
                '<?php echo $couleurs[$i]; ?>',
                '<?php echo $couleurs[$i]; ?>',
                '<?php echo $couleurs[$i]; ?>',
                '<?php echo $couleurs[$i]; ?>',
                '<?php echo $couleurs[$i]; ?>'
            ],
        },
<?php
$i++;
}
?>

        {
            data: [<?php echo $valeur_tous_medic;  ?>],
            label: "tous les medicament",
            borderColor: 'rgba(0, 0, 0, 1)',
            fill: false,
            backgroundColor: [
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)',
                'rgba(0, 0, 0, 1)'
            ],
        }]
    },
    axisY: {
        interval: 10,
        suffix: "%"
    },
    toolTip: {
        shared: true
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Vorte Observance',
            fontSize: 20,
            fontColor: '#000',
        },
        legend: {
            labels: {
                fontSize: 16,
                fontFamily: "'Roboto', sans-serif",
                fontColor: '#000',
                fontStyle: '500'
            }
        },
        
        scales: {
            
            yAxes: [{

                ticks: {
                    min: 0,
                    max: 100,
                    callback: function (value) {
                        return value + "%"
                    },
                    fontSize: 16,
                    fontFamily: "'Roboto', sans-serif",
                    fontColor: '#000',
                    fontStyle: '500',

                },
                scaleLabel: {
                    display: true,
                    labelString: 'Percentage',
                },
            }],
            xAxes: [{
                
                    ticks: {
                        fontSize: 16,
                        fontFamily: "'Roboto', sans-serif",
                        fontColor: '#000',
                        fontStyle: '500'
                    },
                },

            ]

        }
    }

});
</script>
	
</body>

</html>