<?php
include("verificationLogin.php");
require("connect.php");
$controles = $bdd->prepare("SELECT * FROM conntroles_medecin 
							JOIN medecin
								ON conntroles_medecin.id_medecin = medecin.id_medecin  
		WHERE conntroles_medecin.id_user=:id_this_user");
$controles->execute(array('id_this_user' =>$id_user));
$controle = $controles->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Liste des Rendez-vous</title>
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
									liste des Rendez-vous
									<span>auquel vous etes alérter</span>
								</a>
							</li>
							</ul>
						</div>
						<div class="medicament-contents bg-medicament">
							<div class="tab-content" id="pills-tabContent">
							<div  class="">
								<!-- Card global popup -->
								
											<!-- Form -->
															<div class="d-flex justify-content-around flex-wrap simple-information">
																<div class="col-md-8">
																	<div class="card form-ajout-medic">
																		<div style="" class="card-body">
																			<h5 class="card-title ">Vos Rendez-vous </h5>
																			
																			<div class="form-group ">
																		
																				<?php

					$i=1;
					foreach( $controle as $key ) { $i++;
						?>
																		
																		

																				<a class="appelSpecifier pop  " href="#controle<?php echo $i; ?>">
																				
																				<img src="img/Rndv1.svg" width="16%" alt="">
																				
																				<div class="NomMed Margin  pic">
																				<h4 class=""><?php echo $key['nom_conntroles']; ?></h4>
																				<span><?php echo $key['date_conntroles']; ?>, <?php echo $key['heure_conntroles']; ?></span>
																				</div></a>	
					<?php
					}
					?>
																			
																			</div>
																			
																		</div>	
																			
																</div>
																		
															</div>
																	
																</div>
																
																</div>
																	
																	</div>
															<div class="d-flex justify-content-center mt-5">
																		<a class="primary-btn contact100-form-btn" href="rendez-vous.php">Ajouter un rendez-vous</a>
															</div>

															<?php
															$s=1;
					foreach( $controle as $key ) { $s++;
						?>


												<div style="width:100%;border-radius:20px max-height:80vh;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn one" id="controle<?php echo $s; ?>">
												
												<div style=" max-width:470px; background:#fff;border-radius:20px; max-height:80vh;">

													<div class="card joursSpicifier ">

                                                    <div style=" padding-bottom: 0;padding-top: 0;" class=" card-header header">	
                                                        <div class="NomMed Margin pic prof">
															<h3 class="NomdeR"><?php echo $key['nom_conntroles']; ?></h3>
																<div  class=" suppButton">
																	<form action="modification.php" method="POST">
																		<input type="text" style="display:none" name="IDRendez" value="<?php echo $key['id_conntroles']; ?>">
																		<button type="submit" name="suprimerRendez"class="" style="background:none; border:none;"><img style="margin-bottom:-18%;" class="supp" src="img/delete.svg" width="4%" alt=""></button>
																	</form>
																</div>

															<p><a class="popup-jours-annuler closeButton" href="#"><img class="closee ferme" src="img/closee.svg" width="7%" alt=""></a></p>
                                                        </div>	
                                                    </div>
													<div class="card-body box-shodw coordonne " id="coordonne">
                                                        
														<div style="margin-top:-7%;" class="form-group checkbox jours Cord affichage" >

														<div class="search-form medecin ">
															<img  src="img/doctor.svg" width="12%" alt="">
                                                            <div class="NomMed Margin pic">
                                                            <h4 class="Nom Margin pic"><?php echo $key['nom_medecin']; ?></h4>
                                                        </div>

														<div style="margin-top:9%;" class="search-form medecin">
															<img  src="img/time.svg" width="7%" alt="">
															<span class=" Margin pic  spanRndv "><?php echo $key['date_conntroles']; ?>, <?php echo $key['heure_conntroles']; ?></span>
														</div>
                                                            
														<div class="search-form medecin ">
															<img  src="img/alarm.svg" width="7%" alt="">
															<span class="Margin pic  spanRndv"><?php echo $key['rappel_text']; ?></span>
														</div>
														<div class="search-form medecin ">
															<img  src="img/adresse.svg" width="7%" alt="">
															<span class="Margin pic spanRndv"><?php echo $key['emplacement']; ?></span>
														</div>

														<div class="search-form medecin ">
															<img  src="img/remarque.svg" width="7%" alt="">
															<span class="Margin pic spanRndv"><?php echo $key['remarque']; ?></span>				
															</div>

                                                        </div>
                                                        
                                                    </div>
													<div class="form-group checkbox jours Cord formModification animated fadeInUp" style="display:none;">
																<form action="modification.php" method="POST">
																<div class="search-form medecin ">
                                                                        <input value="<?php echo $key['nom_conntroles']; ?>" class="typeText search Margin pic" type="text" name="nomRend" required>
                                                                    </div>
                                                                    
																		<div class="input-group dateRendez">
                                                                            <img src="img/rendez.svg" width="7%" alt="">
                                                                            <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                                                            <input class="input--style-2 js-datepicker " type="text" name="dateRendez" value="<?php echo $key['date_conntroles']; ?>">

                                                                        </div>
																		<div class="search-form medecin">
                                                                        <img src="img/time.svg" width="7%" alt="">
                                                                        <div class="form-group unique" id="timeRendez">
                                                                            <input type="text" name="timeRendez" data-toggle="timepicker" class="form-input" autocomplete="off" value="<?php echo $key['heure_conntroles']; ?>">
                                                                        </div>
                                                                    </div>
																	<!-- modifier verssion final: ajouter l'input de changement du temps du rappel -->
																	<div class="search-form medecin ">
																			<img  src="img/alarm.svg" width="7%" alt="">
																			<input type="text" name="timeControle" data-toggle="timepicker" class="form-input" autocomplete="off" value="<?php echo $key['rappel_conntroles']; ?>">
																			<span class="Margin pic  spanRndv"><?php echo $key['rappel_text']; ?></span>
																		</div>
				
																	<div class="search-form medecin ">
                                                                        <img src="img/adresse.svg" width="7%" alt="">
                                                                        <input value="<?php echo $key['emplacement']; ?>" class="typeText search Margin pic" type="text" name="LocMed" >
                                                                    </div>

                                                                    <div class="search-form medecin ">
                                                                        <img src="img/remarque.svg" width="7%" alt="">
                                                                        <input value="<?php echo $key['remarque']; ?>" class="typeText search Margin pic" type="text" name="RemarqueMed" >
                                                                    </div>
						
																		<input type="text" style="display:none" name="IDConntroles" value="<?php echo $key['id_conntroles']; ?>">
																		<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn" type="submit" name="modifierControle">Enregistrer</button>
																	</div>
																	<div class="d-flex justify-content-center mt-5">
																	<a class="primary-btn contact100-form-btn anulerCordonnee" style="color: white;">Annuler</a>
																	</div>
																		</form>
																		</div>
																	
																	<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn modifierCordonnee"><img class="" style="width:1.5rem; margin-right:1rem;" src="img/edit1.svg" width="1rem" alt="">Modifier</button>
																	</div>
                                                   </div>
												</div>
										</div>
							<!-- Material form contact -->
							<!-- popup magnifique with form -->
							<?php
					}
					?>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



		<!--====  End of medicament  ====-->
		<script src="dist/timepicker.min.js"></script>
        <script>
	        document.addEventListener("DOMContentLoaded", function(event)
			{
			    timepicker.load({
			        interval: 15,
			        defaultHour: null
			    });
			});


		</script>
<script>
              
              
                $('.modifierCordonnee').click(function(e){
					$('.formModification').css('display','block');
					$('.modifierCordonnee').css('display','none');
					$('.affichage').css('display','none');

				});
				$('.anulerCordonnee').click(function(e){
					$('.formModification').css('display','none');
					$('.modifierCordonnee').css('display','block');
					$('.affichage').css('display','block');

				});
				
              
            </script>
	<!-- Optional JavaScript -->
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