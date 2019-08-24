<?php
include("verificationLogin.php");
require("connect.php");
$medecins = $bdd->prepare("SELECT * FROM medecin 
		WHERE medecin.id_user=:id_this_user");
$medecins->execute(array('id_this_user' =>$id_user));
$medecin = $medecins->fetchAll(PDO::FETCH_ASSOC);


$medic_user = $bdd->prepare("SELECT * FROM temps_prises 
							JOIN medecin
								ON temps_prises.id_medecin = medecin.id_medecin  
							JOIN medicaments
								ON temps_prises.id_medicament = medicaments.id_medicament
								WHERE medecin.id_user=:id_this_user");
$medic_user->execute(array('id_this_user' =>$id_user));
								
$medi_this_user = $medic_user->fetchAll(PDO::FETCH_ASSOC);
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
	<link rel="stylesheet" href="css/medecin.css">
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
									liste des médecins
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
														<h5 class="card-title ">Vos médecins </h5>
														
														<div class="form-group ">
<?php

$i=1;
foreach( $medecin as $key ) { $i++;
	?>
														<a class="appelMedecin pop" href="#medecin<?php echo $i; ?>">     
															<div class="search-form medecin ">
																<img  src="img/doctor.svg" width="12%" alt="">
																<div class="NomMed Margin pic">
																<h4 class=""><?php echo $key['nom_medecin']; ?></h4>
																<span><?php echo $key['specialite_medecin']; ?></span>
																</div>	
															</div>
														</a>
<?php
}
?>
													
												</div>
												
											</div>
											<!-- END Card liste medecin -->

											</div>



											<div class="d-flex justify-content-center mt-5">
															<a class="primary-btn contact100-form-btn" href="medecin.php">Ajouter un médecin</a>
											</div>
											<!-- END Card principale -->
	
										</div>
										<?php
										$i=1;
foreach( $medecin as $key ) { $i++;?>
												<div style="width:100%;border-radius:20px; max-height:80vh;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn one" id="medecin<?php echo $i; ?>">
												
													<div style=" max-width:470px; background:#fff;border-radius:20px">

														<div class="card joursSpicifier">

																<div class=" card-header header">	
																	<div class="NomMed Margin pic prof">

																		<img  src="img/doctor.svg" width="10%" alt="">
																		<div class="NomMed Margin pic" style="width:100%;">
																			<h5 class="h4"><?php echo $key['nom_medecin']; ?></h5>
																			<span><?php echo $key['specialite_medecin']; ?></span>
																		</div>
																		<form action="afectation.php" method="POST">
																		<input type="text" style="display:none" name="IDMedecin" value="<?php echo $key['id_medecin']; ?>">
																		<button type="submit" name="suprimerMedecin"class="" style="background:none; border:none;"><img class="supp" src="img/delete.svg" width="4%" alt=""></button>

																			
																		</form>
																		<p><a class="popup-jours-annuler closeButton" href="#"><img class="closee" src="img/closee.svg" width="7%" alt=""></a></p>
																	</div>
																
																	<div class="pagin">
																		<a class="lien CoordonneLink" href="#coordonne"><label class="un border1" for="count">Coordonnées</label> </a>
																		<a class="lien MedicamentLink" href="#medic"><label class="un border2" for="count">Médicaments</label> </a>
																		<a class="lien RndvLink" href="#rndv"><label class="un border3" for="count">Rendez-vous</label> </a>
																	</div>	
																</div>
																<div class="card-body box-shodw coordonne" id="coordonne">
																	
																	<div class="form-group checkbox jours Cord affchageCordonne" >

																		<div class="search-form medecin ">
																			<img  src="img/phone3.svg" width="6%" alt="">
																			<h4 class="Margin pic"><?php echo $key['numero_telephone']; ?></h4>
																		</div>

																		<div class="search-form medecin ">
																			<img  src="img/email3.svg" width="6%" alt="">
																			<h4 class="Margin pic"><?php echo $key['email']; ?></h4>
																		</div>
																		
																		<div class="search-form medecin ">
																			<img  src="img/adresse3.svg" width="6%" alt="">
																			<h4 class="Margin pic"><?php echo $key['adresse']; ?></h4>
																		</div>

																	</div>
																	<div class="form-group checkbox jours Cord formModification animated fadeInUp" style="display:none;">
																<form action="afectation.php" method="POST" id="medecinForm">
																		<div class="search-form medecin validate-input" id ="NumeroMedecin" data-validate="entrez le nom de medecin">
																			<img  src="img/phone3.svg" width="6%" alt="">
																			<input type="text"  class="typeText input100"  name="NumeroMedecin" value="<?php echo $key['numero_telephone']; ?>">
																		</div>

																		<div class="search-form medecin validate-input" id="emailMedecin" data-validate="entrez le nom de medecin">
																			<img  src="img/email3.svg" width="6%" alt="">
																			<input type="text" class="typeText input100"  name="emailMedecin" value="<?php echo $key['email']; ?>">

																		</div>

																		<div class="search-form medecin validate-input" id="adresseMedecin" data-validate="entrez le nom de medecin">
																			<img  src="img/adresse3.svg" width="6%" alt="">
																			<input type="text" class="typeText input100"  name="adresseMedecin" value="<?php echo $key['adresse']; ?>">

																		</div>
																		<input type="text" style="display:none" name="IDMedecin" value="<?php echo $key['id_medecin']; ?>">

																		<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn" type="submit" id="submit" name="submit">Enregistrer</button>
																	</div>
																		</form>

																		<!-- AJAX FOR THE FORM ABOVE -->
													
													<script type="text/javascript">
														$(document).ready(function() {

															$('#submit').click(function(e){
																e.preventDefault();						
																var form = $("#medecinForm")[0];
																var formdata = new FormData(form)
																$.ajax({
																	type:'POST',																	
																	url: "./afectation.php",
																	cache:false,
																	data: formdata,
																	dataType: "json",
																	processData: false,
																	contentType: false,
																	success:function (data){
																		if(data.NumeroMedecin == "1"){
																			$("#NumeroMedecin").addClass('alert-validate');
																			$("#NumeroMedecin").removeClass('true-validate');																																			
																		}
																		else{
																			$("#NumeroMedecin").removeClass('alert-validate');
																			$("#NumeroMedecin").addClass('true-validate');
																		}																
																	}
																	});									
															});
														});
													</script>
																						
																		</div>
																	
																	<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn modifierCordonnee"><img class="" style="width:1.5rem; margin-right:1rem;" src="img/edit1.svg" width="1rem" alt="">Modifier</button>
																	</div>
																	
																</div>
                                                    

																<div class="card-body box-shodw medicam" style="display:none;" id="medic">
																	
																	<div class="form-group checkbox jours Cord" >
			<?php

$medic_medecin = $bdd->prepare("SELECT * FROM temps_prises 
JOIN medecin
	ON temps_prises.id_medecin = medecin.id_medecin  
JOIN medicaments
	ON temps_prises.id_medicament = medicaments.id_medicament
	WHERE medecin.id_user=:id_this_user AND temps_prises.id_medecin=:id_this_med");
$medic_medecin->execute(array('id_this_user' =>$id_user,
							'id_this_med'=>$key['id_medecin']	));
	
$medi_this_medecin = $medic_medecin->fetchAll(PDO::FETCH_ASSOC);

foreach( $medi_this_medecin as $one_medec) { 	
	?>	
																		<div class="search-form medecin ">
																			<img  src="img/comprime.png" width="12%" alt="">
																			<div class="NomMed Margin pic">
																			<h4 class=""><?php echo $one_medec['nom_medicament']; ?></h4>
																			</div>
																		</div>
<?php
}
?>
																	<div class="d-flex justify-content-center mt-5">
																	<button class="primary-btn contact100-form-btn SelectButton" type="submit" name="submit">Sélectionnez les médicaments</button>
																	</div>
																		
																	</div>

																</div>	
                                                    
                                                    
																<div class="card-body box-shodw rndv" style="display:none;" id="rndv">
																	
																	<div class="form-group checkbox jours Cord" >
				
																		<div class="search-form medecin ">
																				<img  src="img/calendar.svg" width="12%" alt="">
																			<div class="NomMed Margin pic">
																				<h4 class="">Lundi</h4>
																			</div>
					
																		</div>

																	</div>
															
																</div>
																<div class="card-body box-shodw jeudi" style="display:none;" id="jeudi">
																	<form action="afectation.php" method="POST">
																	<div class="form-group checkbox jours Cord" >
																		<h4 style="text-align:center">Sélectionnez les médicaments prescrits par ce médecin</h4>
																		<?php

	
$t=1;
foreach( $medi_this_user as $one_medic) { ?>	
																		<div class="search-form medecin ">
																			<img  src="img/comprime.png" width="12%" alt="">
																			<div class="NomMed Margin pic">
																				<h4 class=""><?php echo $one_medic['nom_medicament']; ?></h4>
																			</div>

																			<div class="primary-switch">
																				<input type="checkbox" id="default-switch<?php echo $t; ?>" name="selected_medic<?php echo $t; ?>" <?php  $finTraitement = ($one_medic["id_medecin"]== $key['id_medecin']) ? "checked disabled" :" "; echo $finTraitement; ?>>
																				<label for="default-switch<?php echo $t; ?>"></label>
																				<input type="text" style="display:none" name="idMedAjout<?php echo $t; ?>" value="<?php echo $one_medic['id_medicament']; ?>">
																				<input type="text" style="display:none" name="idMedecin" value="<?php echo $key['id_medecin']; ?>">
																				<input type="text" style="display:none" name="idTempsPrise<?php echo $t;?>" value="<?php echo $one_medic['id_temps']; ?>">

																				<input type="text" style="display:none" name="incrementation" value="<?php echo $t; ?>">

																			</div>
																		</div>															
<?php $t++; } ?>											
																		<div class="d-flex justify-content-center mt-5">
																				<button class="primary-btn contact100-form-btn" type="submit" name="affectation_medicament">Terminer</button>
																		</div>

																	</div>
																	</form>
																</div>
														</div>


														<?php
}
?>
													
												<!-- End card vue d'ensemble page -->

													</div>
										

										<!-- END Form -->

									</div>
							<!-- Material form contact -->

							<!-- popup magnifique with form -->
							
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



		<!--====  End of medicament  ====-->
    <script>
    $(".MedicamentLink").click(function(e){
        $(".coordonne").css("display","none");
        $(".medicam").css("display","block");
        $(".border2").css("color","#00F260");
        $(".border1").css("color","#fff");
        $(".border3").css("color","#fff");
        $(".rndv").css("display","none");
		$(".jeudi").css("display","none");
    })
    $(".CoordonneLink").click(function(e){
        $(".coordonne").css("display","block");
        $(".medicam").css("display","none");
        $(".border2").css("color","#fff");
        $(".border1").css("color","#00F260");
        $(".border3").css("color","#fff");
        $(".rndv").css("display","none");
		$(".jeudi").css("display","none");
    })
    $(".RndvLink").click(function(e){
        $(".coordonne").css("display","none");
        $(".medicam").css("display","none");
        $(".rndv").css("display","block");
        $(".border2").css("color","#fff");
        $(".border1").css("color","#fff");
        $(".border3").css("color","#00F260");
		$(".jeudi").css("display","none");
    })
	$(".modifierCordonnee").click(function(e){
		$(".modifierCordonnee").css("display","none");
		$(".formModification").css("display","block");
		$(".affchageCordonne").css("display","none");
	})
	$(".SelectButton").click(function(e){
		$(".jeudi").css("display","block");
		$(".medicam").css("display","none");
	})
	$(".Terminer").click(function(e){
		$(".jeudi").css("display","none");
		$(".medicam").css("display","block");
	})
	
    </script>
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
	<script src="./medecin.js"></script>
	
</body>

</html>