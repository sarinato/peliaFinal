<?php
include("verificationLogin.php");
require("connect.php");
$today = date("l");
$today_date= date("Y-m-d");
$now_time= date("H:i:s");
$details_medicaments = $bdd->prepare("SELECT *  FROM temps_prises 
	INNER JOIN medicaments 
		ON temps_prises.id_medicament = medicaments.id_medicament
		INNER JOIN jours_prises 
        ON temps_prises.id_temps = jours_prises.id_temps
        WHERE jours_prises.date_prise=:Aalerter OR jours_prises.$today=1"
        
        );
        $details_medicaments->execute(array(
            'Aalerter' =>$today_date));
$details_medicament = $details_medicaments->fetchAll(PDO::FETCH_ASSOC);

$controles = $bdd->prepare("SELECT * FROM conntroles_medecin 
							JOIN medecin
								ON conntroles_medecin.id_medecin = medecin.id_medecin  
		WHERE conntroles_medecin.id_user=:id_this_user");
$controles->execute(array('id_this_user' =>$id_user));
$controle = $controles->fetchAll(PDO::FETCH_ASSOC);
$medecins = $bdd->prepare("SELECT * FROM medecin 
		WHERE medecin.id_user=:id_this_user");
$medecins->execute(array('id_this_user' =>$id_user));
$medecin = $medecins->fetchAll(PDO::FETCH_ASSOC);

?>

    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>PELIA - Accueil</title>
        <?php
	include "link.php";
	?>
    </head>

    <body>

        <!--================ Start Header Menu Area =================-->
        <?php
	include "header.php";
	?>
            <!--================ End Header Menu Area =================-->

            <div class="site-main">
                <!--================ Start Home Banner Area =================-->
                <section class="home_banner_area common-banner">
                    <div class="banner_inner">
                        <div class="container-fluid no-padding">
                            <div class="row fullscreen">

                            </div>
                        </div>
                    </div>
                </section>

                <!--================ End Home Banner Area =================-->

                <!--==============================
		=            medicament            =
        ===============================-->
        <section class="section medicament">
		<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="medicament-tab">
							<ul class="nav nav-pills text-center">
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill">
									Bonjour Ahmed &#128516;
								</a>
							</li>
							</ul>
						</div>
					</div>
				</div>
		</div>		
		</section>

                <section class="section profil">

                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-md">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="card" id="upcomingEvents">
                                            <div class="card-header">Médicaments<a class="action" href="medicament.php">Voir les détails</a></div>
                                            <ul class="list-group">
                                            <?php
foreach( $details_medicament as $medica )
    {
?>	
													
                                                            <li class="list-group-item">
                                                    <div class="row no-gutters">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="search-form medecin ">

                                                                        <img src="img/comprime.png" width="12%" alt="">

                                                                        <div class="NomMed Margin pic">
                                                                            <h4 class=""><?php echo $medica['nom_medicament']; ?></h4>
                                                                            <span>aujourd'hui, <?php  if($medica['f1'] > $now_time){echo $medica['f1'];} elseif($medica['f2'] > $now_time){echo $medica['f2'];} elseif($medica['f3'] > $now_time){echo $medica['f3'];} elseif($medica['f4'] > $now_time){echo $medica['f4'];} ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                </li>
															<?php

}
?>
                                            
                                            </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card" id="upcomingEvents">
                                                <div class="card-header">Rendez-vous<a class="action" href="ListeRendez-vous.php">Voir les détails</a></div>
                                                <ul class="list-group">
                                                <?php
                                                foreach( $controle as $key ) { 
						?>
																		
																		

																					
                                                                                <li class="list-group-item">
                                                        <div class="row no-gutters">
                                                            <div class="col">
                                                                <div class="search-form medecin ">

                                                                    <img src="img/Rndv1.svg" width="13%" alt="">

                                                                    <div class="NomMed Margin  pic">
                                                                        <h4 class=""><?php echo $key['nom_conntroles']; ?></h4>
                                                                        <span><?php echo $key['date_conntroles']; ?>, <?php echo $key['heure_conntroles']; ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </li>
					<?php } ?>
        
                                                </ul>
                                                </div>
                                                </div>

                                                <!------Medecin------->
                                                <div class="col-md-6">
                                                    <div class="card" id="upcomingEvents">
                                                        <div class="card-header">Médecins<a class="action" href="ListeMedecin.php">Voir les détails</a></div>
                                                        <ul class="list-group">
                                                        <?php

$i=1;
foreach( $medecin as $key ) { $i++;
	?>
														
                                                        <li class="list-group-item">
                                                                <div class="row no-gutters">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="search-form medecin ">

                                                                                    <img src="img/doctor.svg" width="12%" alt="">

                                                                                    <div class="NomMed Margin pic">
                                                                                        <h4 class=""><?php echo $key['nom_medecin']; ?></h4>
                                                                                        <span><?php echo $key['specialite_medecin']; ?></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                            </li>
<?php }?>
                                                            
                                                           
                                                        </ul>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="alert bg-primary text-white">
                                                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                                <div class="row">
                                                                    <div class="col-lg">
                                                                        <div class="row">
                                                                            <div class="col">2015 Innovation Conference</div>
                                                                        </div>
                                                                        <div class="row my-2">
                                                                            <div class="col small text-white">Interesting speakers, delicious food, do not miss this event!</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg signup">
                                                                        <button class="btn btn-secondary" href="#">Sign up Today!</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="card" id="recentActivity">
                                                                <div class="card-header">Programme Journalier</div>
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="row no-gutters">
                                                                            <div class="col">
                                                                                <div class="search-form medecin ">

                                                                                    <img src="img/comprime.png " width="8%" alt="">

                                                                                    <div class="NomMed Margin pic">
                                                                                        <h4 class="">Paracetamol 500mg <span style="opacity:0">hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</span></h4>
                                                                                        <span>Aujourd'hui,09:00</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col right">
                                                                                <div class="row no-gutters justify-content-center align-items-center">

                                                                                    <div class="text-center">Il reste
                                                                                        <br>4 heures</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row no-gutters">
                                                                            <div class="col">
                                                                                <div class="search-form medecin ">

                                                                                    <img src="img/comprime.png " width="8%" alt="">

                                                                                    <div class="NomMed Margin pic">
                                                                                        <h4 class="">Doliprane</h4>
                                                                                        <span>Aujourd'hui,   09:00</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col right">
                                                                                <div class="row no-gutters justify-content-center align-items-center">
                                                                                    <!-- <div class="view">
                        <button class="btn btn-primary">View</button>
                      </div> -->
                                                                                    <div class="text-center">Il reste
                                                                                        <br>4 heures</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li class="list-group-item">
                                                                        <div class="row no-gutters">
                                                                            <div class="col">
                                                                                <div class="search-form medecin ">

                                                                                    <img src="img/comprime.png " width="8%" alt="">

                                                                                    <div class="NomMed Margin pic">
                                                                                        <h4 class="">Paracetamol</h4>
                                                                                        <span>Aujourd'hui,09:00</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col right">
                                                                                <div class="row no-gutters justify-content-center align-items-center">
                                                                                    <!-- <div class="view">
                        <button class="btn btn-primary">View</button>
                      </div> -->
                                                                                    <div class="text-center">Il reste
                                                                                        <br>4 heures</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                </section>

                <!--====  End of medicament  ====-->

                <!-- Optional JavaScript -->
                <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                <script src="js/jquery-3.2.1.min.js"></script>
                <script src="js/popper.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/stellar.js"></script>
                <script src="js/jquery.magnific-popup.min.js"></script>

                <script src="vendors/lightbox/simpleLightbox.min.js"></script>
                <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
                <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
                <script src="vendors/jquery-ui/jquery-ui.js"></script>
                <script src="js/jquery.ajaxchimp.min.js"></script>
                <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
                <script src="vendors/counter-up/jquery.counterup.js"></script>
                <script src="js/mail-script.js"></script>
                <!--gmaps Js-->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
                <script src="js/gmaps.min.js"></script>
                <script src="js/theme.js"></script>
                <script src="js/global.js"></script>

                <!-- Jquery JS-->
                <script src="vendors/jquery/jquery.min.js"></script>
                <!-- Vendor JS-->
                <script src="vendors/select2/select2.min.js"></script>
                <script src="vendors/datepicker/moment.min.js"></script>
                <script src="vendors/datepicker/daterangepicker.js"></script>

                <!-- Main JS-->
                <script src="js/global.js"></script>

    </body>

    </html>