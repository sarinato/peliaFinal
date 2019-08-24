<?php
include("verificationLogin.php");
require("connect.php");

$details_medicaments = $bdd->query('SELECT *  FROM temps_prises 
	INNER JOIN medicaments 
		ON temps_prises.id_medicament = medicaments.id_medicament
		INNER JOIN jours_prises 
		ON temps_prises.id_temps = jours_prises.id_temps'
		);
$details_medicament = $details_medicaments->fetchAll(PDO::FETCH_ASSOC);
$m=0;
$i=0;
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Ajouter médicament</title>
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
		<section class="home_banner_area common-banner Medicc">
			<div class="banner_inner">
				<div class="container-fluid no-padding">
					<div class="row fullscreen">

					</div>
				</div>
			</div>
		</section>

		
		<!-- Start banner bottom -->
		<div class="row banner-bottom common-bottom-banner align-items-center justify-content-center">
			<div class="col-lg-8 offset-lg-4">
				<div class="banner_content">
					<div class="row d-flex align-items-center">
						<div class="col-lg-7 col-md-12">
							<h1>Liste des médecins</h1>
							<p>hello word "texte pour decrire une liste des médicament. mentinné la modification l'ajout et la supression d'un medicament dans la listes".</p>
						</div>
						<div class="col-lg-5 col-md-12">

								<!-- popup magnifique Html -->
								
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End banner bottom -->
	
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
									liste des médicaments
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
												<div class="card ">
													<div style="" class="card-body">
														<h5 class="card-title ">Vos médicaments </h5>
														
														<div class="form-group ">
														<?php
foreach( $details_medicament as $medica )
    {
?>	
														<a class="appelMedic pop" href="#medicament<?php echo $i; ?>"><div class="search-form medecin ">
														<div class="search-form medecin ">
																<img  src="img/doctor.svg" width="12%" alt="">
																<div class="NomMed Margin pic">
																<h4 class=""><?php echo $medica['nom_medicament']; ?></h4>
																<span><?php echo $medica['type_medicament']; ?></span>
																</div>
															</div>
															</a>
															<?php
$i++;
}
?>				
												
															</div>	
														
													</div>
													
												</div>
												
											</div>
											
											</div>
											<div class="d-flex justify-content-center mt-5 mb-5">
												<a class="primary-btn contact100-form-btn" href="ajoutMedicament.php">Ajouter un médicament</a>
											</div>	
												</div>
<?php

foreach( $details_medicament as $medic )
    {
?>
												<div style="width:100%;border-radius:20px max-height:80vh;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn one" id="medicament<?php echo $m; ?>">
												
												<div style=" max-width:470px; background:#fff;border-radius:20px;max-height:80vh;">

													<div class="card joursSpicifier">

                                                    <div class=" card-header header">	
                                                        <div class="NomMed Margin pic prof">
																<img  src="img/doctor.svg" width="10%" alt="">
																<div class="NomMed Margin pic">
																	<h5 class="h4"><?php echo $medic['nom_medicament']; ?></h5>
																	<span><?php echo $medic['type_medicament']; ?></span>
																</div>
																<div style="border:1px solid red;">
																	<form action="modification.php" method="POST">
																		<input type="text" style="display:none" name="IDMedicament" value="<?php echo $medic['id_temps']; ?>">
																		<button type="submit" name="suprimerMedicament"class="" style="background:none; border:none;"><img class="supp" src="img/delete.svg" width="4%" alt=""></button>
																	</form>
																</div>
															<p><a class="popup-jours-annuler closeButton" href="#"><img class="closee" src="img/closee.svg" width="7%" alt=""></a></p>
                                                        </div>
														
                                                        <div class="d-flex justify-content-around">
                                                            <a class="lien frquence"><label class="un border1 colorSelected" >fréquence</label> </a>
                                                            <a class="lien  duree"><label class="un border2" >durée</label> </a>
                                                            <a class="lien joursSelect"><label class="un border3" >les jours</label> </a>
                                                        </div>	
                                                    </div>
													<div class="card-body box-shodw frequenceDetail" id="coordonne">
														<div class="form-group checkbox jours Cord" >
															<div class="afichageFreq">
																<?php 
																$nbr_fois= 1;
																while($nbr_fois<= $medic['nombre_fois']){
																	?>
																	<div class="search-form medecin">
																<img  src="img/comprime.png" width="12%" alt="">
																<div class="NomMed Margin pic">
																	<h4 class=""><?php echo $medic['f'.$nbr_fois]; ?></h4>
																	<span class=""><?php echo $medic['dose_medicament'.$nbr_fois]; ?></span>	
																</div>
																</div>
																	<?php
																	$nbr_fois++;
																} ?>
																</div>
																<div class="form-group frequenceModification animated fadeInUp" style="display:none;">
														<form action="modification.php" method="POST">
																<div class="">
																	<label for="nbrFois">nombre de fois par jours</label>
																			<input type="text" class="typeText" id="nbrFois" name="nbrFois" value="<?php echo $medic['nombre_fois']; ?>">
																		</div>	
																		<div class="mt-4">
																		<label for="">temps des prises</label>
																		</div>
																<?php 
																$nbr_fois_form= 1;
																while($nbr_fois_form<= $medic['nombre_fois']){
																	?>
															<div class="form-group unique">
																<input type="text" name="frequenceJ<?php echo $nbr_fois_form; ?>" data-toggle="timepicker" class="form-input time" autocomplete="off" value="<?php echo $medic['f'.$nbr_fois_form]; ?>">
															</div>
															<div class="form-group unique">
																			<input type="text" class="typeText" name="doseFreq<?php echo $nbr_fois_form; ?>" value="<?php echo $medic['dose_medicament'.$nbr_fois_form]; ?>">
																		</div>															
																		<?php
																	$nbr_fois_form++;
																} ?>
																<input type="text" style="display:none" name="IDTemps" value="<?php echo $medic['id_temps']; ?>">

																<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn" type="submit" name="modifierFreq">Enregistrer</button>
																	</div>
														</form>
																		</div>
															<div class="d-flex justify-content-center mt-5">
																<button class="primary-btn contact100-form-btn modifierFreq"><img class="" style="width:1.5rem; margin-right:1rem;" src="img/edit1.svg" width="1rem" alt="">Modifier</button>
															</div>
														</div>
                                                    </div>
                                                    

                                                    <div class="card-body box-shodw dureeDetail" style="display:none;" id="medic">
                                                        
													<div class="form-group checkbox jours Cord" >

															<div class="search-form medecin ">
                                                                <img  src="img/calendar.svg" width="12%" alt="">
                                                            <div class="NomMed Margin pic afichageDuree">
																<h4 class=""><?php
																$today_date= date("Y-m-d");
																$datefin=$medic['date_fin'];
																$date1=date_create($today_date);
																$date2=date_create($datefin);
																$nbjour= date_diff($date1, $date2);
																$chi = $nbjour->format("%a");
																if($chi>365){
																	echo "traitement alongé";
																}else{
																 echo $nbjour->format("%a jours"); 
																}
																?></h4>
															</div>
															<div class="form-group dureeModification animated fadeInUp" style="display:none;">
															<form action="modification.php" method="POST">
																<?php
																if($chi>365){?>
																	<input id="count" type="text" class="typeText" name="interval_prise" placeholder="ajouter une durée du traitement">
																	<?php
																}else {
																	?>
																	<input id="count" type="text" class="typeText" name="interval_prise" value="<?php echo $chi; ?>">
																	<?php	
																}?>	
																<input type="text" style="display:none" name="IDTemps" value="<?php echo $medic['id_temps']; ?>">
																<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn" type="submit" name="modifierDuree">Enregistrer</button>
																	</div>
															</form>
															</div>

														</div>
													<div class="d-flex justify-content-center mt-5">
													<button class="primary-btn contact100-form-btn modifierDuree"><img class="" style="width:1.5rem; margin-right:1rem;" src="img/edit1.svg" width="1rem" alt="">Modifier</button>

													</div>
                                                        
													</div>

                                                    </div>	
                                                    
                                                    
                                                    <div class="card-body box-shodw joursDetail" style="display:none;" id="rndv">
                                                        
														<div class="form-group checkbox jours Cord" >
    
															<div class="search-form medecin afichageJours">
																	<img  src="img/calendar.svg" width="12%" alt="">
																<div class="NomMed Margin pic " style="width:80%;">
																		<?php if($medic['methode']==0){
																			$Lundi = ($medic['Monday']==1) ? "Lundi, " : "";
																			$Mardi = ($medic['Tuesday']==1) ? "Mardi, " : "";
																			$Mercredi = ($medic['Wednesday']==1) ? "Mercredi, " : "";
																			$Jeudi = ($medic['Thursday']==1) ? "Jeudi, " : "";
																			$Vendredi = ($medic['Friday']==1) ? "Vendredi, " : "";
																			$Samedi = ($medic['Saturday']==1) ? "Samedi, " : "";
																			$Dimanche = ($medic['Sunday']==1) ? "Dimanche " : "";
																			echo "<h4>". $Lundi .$Mardi .$Mercredi .$Jeudi .$Vendredi .$Samedi .$Dimanche."</h4>" ;
																			if($Lundi ==1 && $Mardi ==1 && $Mercredi ==1 && $Jeudi ==1 && $Vendredi ==1 && $Samedi ==1 && $Dimanche ==1){
																				echo "tous les jours";
																			}
																		}else{
																			$dateD= date_create($medic['date_debut']);
																			$dateP=date_create($medic['date_prise']);
																			$nbjour= date_diff($dateP, $dateD);
																			echo $nbjour->format("interval entre chaque prise %a jours <br>");
																			echo "prochaine prise ". $medic['date_prise'];
																			?>
																			<h4></h4>
																			<?php
																		}
																		 ?>
																</div>
															</div>
															<div class="form-group JoursModificat animated fadeInUp" style="display:none;">
															<form action="modification.php" method="POST">
																<input type="checkbox" id="quotidien" name="jours" value="all"/>
																<label class="quotidienShow" for="quotidien"><span class="chk-span" ></span>Quotidien</label>
																<input type="checkbox" name="jour_selectionne" id="quotidien_seleted_modif" value="all"/>
																<br>		
																<input type="checkbox" name="jours" id="specifier" value="specifique"/>
																<label class="specifierShow" for="specifier" > <span class="chk-span"> </span>Jours spécifiques de la semaine</label>
																<input type="checkbox" name="jour_selectionne" id="specifier_seleted_modif" value="specifique"/>
																<br>
																<input type="checkbox" name="jours" id="interval" value="interval"/>
																<label class="intervalShow" for="interval"><span class="chk-span" >  </span>Interval de (X) jours </label>
																<input type="checkbox" name="jour_selectionne" id="interval_seleted_modif" value="interval"/>

																<div class="form-group checkbox jours changeJours animated fadeInUp" style="display:none;">
																	<input type="checkbox" name="lundi" id="jr1" value="lundi"/>
																	<label  for="jr1" class="jrs"><span class="chk-span " ></span>Lundi </label>
																										
																	<input type="checkbox" name="mardi" id="jr2" value="mardi"/>
																	<label for="jr2" class="jrs"><span class="chk-span" > </span>Mardi</label>

																	<input type="checkbox" name="mercredi" id="jr3" value="mercredi"/>
																	<label for="jr3" class="jrs"><span class="chk-span" > </span>Mercredi</label>

																	<input type="checkbox" id="jr4" name="jeudi" value="jeudi"/>
																	<label  for="jr4" class="jrs"><span class="chk-span" ></span>Jeudi</label>
																										
																	<input type="checkbox" name="venredi" id="jr5" value="venredi"/>
																	<label for="jr5" class="jrs"><span class="chk-span" > </span>Vendredi</label>

																	<input type="checkbox" name="samedi" id="jr6" value="samedi"/>
																	<label for="jr6" class="jrs"><span class="chk-span" > </span>Samedi</label>

																	<input type="checkbox" name="dimanche" id="jr7" value="dimanche"/>
																	<label for="jr7" class="jrs"><span class="chk-span" > </span>Dimanche</label>
																</div>

																<div class="reservation-form__count interval intervalChange animated fadeInUp" style="display:none;">
																	<label for="count">Date de début de traitement</label><br>
																	<div class="input-group">
																		<input class="input--style-2 js-datepicker" type="text" placeholder="Date début" name="dateDebut">
																		<i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
																	</div>
																	
																	<label for="count">Interval entre prises de médicament</label><br>

																	<button id="btn-minus" class="btn-minus-interval_modif" type="button">-</button>
																	<input id="count" type="text" name="interval_prise" class="count_modif" value="3">
																	<button id="btn-plus" class="btn-plus-interval_modif" type="button">+</button>
																</div>

																<input type="text" style="display:none" name="IDJours" value="<?php echo $medic['id_jours']; ?>">
																<input type="text" style="display:none" name="IDTemps" value="<?php echo $medic['id_temps']; ?>">
																<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn" type="submit" name="modifierJours">Enregistrer</button>
																	<button class="primary-btn contact100-form-btn">annuler</button>

																	</div>
															</form>
															</div>
															<div class="d-flex justify-content-center mt-5">
																<button class="primary-btn contact100-form-btn modifierJour"><img class="" style="width:1.5rem; margin-right:1rem;" src="img/edit1.svg" width="1rem" alt="">Modifier</button>

															</div>
														</div>
									
													</div>
											
												</div>

										<!-- END Form -->

									</div>
							<!-- Material form contact -->

							<!-- popup magnifique with form -->
							
							
							</div>
<?php
$m++;
}
?>
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
