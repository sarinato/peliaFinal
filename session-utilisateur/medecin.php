<?php
include("verificationLogin.php");

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Ajouter un médicament</title>
	<?php
	include "link.php";
	?>
	<link rel="stylesheet" href="css/json.css">
	<link rel="stylesheet" href="css/medecin.css">
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
							<h1>Ajouter un médecin</h1>
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
				<!-- <div class="row">
					<div class="col-12">
						<div class="section-title">
							<h3>Event <span class="alternate">medicament</span></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusm tempor incididunt ut labore mise en oeuvre d'un suivis appropriée</p>
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-12">
						<div class="medicament-tab">
							<ul class="nav nav-pills text-center">
							<li class="nav-item">
								<a class="nav-link" data-toggle="pill">
									Ajouter des médecins
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
										<form class="" action="requetteAjoutMedecin.php" method="POST" id="theForm">
										<div class="d-flex justify-content-around flex-wrap simple-information">
											<div class="col-md-8">
												<div class="card">
													<div style="" class="card-body">
														<h5 class="card-title ">Ajouter un médecin</h5>
														<div class="form-group ">
															<div class="search-form medecin validate-input" id="nomMed" data-validate="entrez le nom de medecin">
															<img  src="img/doctor.svg" width="12%" alt="">
															<input  placeholder="Nom du médecin" class="typeText search Margin pic input100" type="text" name="nomMed"  required>															
															</div>
															<div class="search-form medecin validate-input" id ="SpecMed" data-validate="specifier le medicament">
															<input  placeholder="Spécialité" class="typeText search Margin specialite input100" type="text" name="SpecMed" required>															
															</div>
															<div class="search-form medecin validate-input" id="numMed" data-validate="le numero de medecin">
															<img  src="img/phone1.svg" width="7%" alt="">
															<input  placeholder="Numéro de téléphone" class="typeText search Margin pic input100" type="text" name="numMed"  required>															
															</div>

															<div class="search-form medecin validate-input" id="emailMed" data-validate="saisir l'email">
															<img  src="img/email.svg" width="7%" alt="">
															<input  placeholder="Email" class="typeText search Margin pic input100" type="email" name="emailMed"  required>															
															</div>

															<div class="search-form medecin validate-input"  id="adresseMed" data-validate="entrz votre adresse" >
															<img  src="img/adresse.svg" width="7%" alt="">
															<input  placeholder="Adresse" class="typeText search Margin pic input100" type="text" name="adresseMed"  required>															
															</div>
														</div>	
													</div>		
													</div>
												</div>
											</div>
											<div class="d-flex justify-content-center mt-5">
												<button class="primary-btn contact100-form-btn" type="submit" name="submit" id="submit">Ajouter</button>
											</div>
												
											</div>
											
												
												</div>
												
										</form>

										<!-- END Form -->
										<script type="text/javascript">
					$(document).ready(function() {

						$('#submit').click(function(e){
						e.preventDefault();						
							var form = $("#theForm")[0];
							var formdata = new FormData(form)
							$.ajax({
								type:'POST',
								//method:'post',
								url: "./requetteAjoutMedecin.php",
								cache:false,
								data: formdata,
								dataType: "json",
								processData: false,
								contentType: false,
								success:function (data){
									if(data.nomMed == "1"){
										$('#nomMed').addClass("alert-validate");
										$('#nomMed').removeClass("true-validate");
									}
									else{
										$('#nomMed').removeClass("alert-validate");
										$('#nomMed').addClass("true-validate");
									}
									if(data.SpecMed == "1"){
										$('#SpecMed').addClass("alert-validate");
										$('#SpecMed').removeClass("true-validate");
									}
									else{
										$('#SpecMed').removeClass("alert-validate");
										$('#SpecMed').addClass("true-validate");
									}
									if(data.numMed == "1"){
										$('#numMed').addClass("alert-validate");
										$('#numMed').removeClass("true-validate");
									}
									else{
										$('#numMed').removeClass("alert-validate");
										$('#numMed').addClass("true-validate");
									}
									if(data.emailMed == "1"){
										$('#emailMed').addClass("alert-validate");
										$('#emailMed').removeClass("true-validate");
									}
									else{
										$('#emailMed').removeClass("alert-validate");
										$('#emailMed').addClass("true-validate");
									}
									if(data.adresseMed == "1"){
										$('#adresseMed').addClass("alert-validate");
										$('#adressMed').removeClass("true-validate");
									}						
									else{
										$('#adresseMed').removeClass("alert-validate");
										$('#adresseMed').addClass("true-validate");
									}
									if(data.success==1){
										alert ("success");
									}
								}
								});									
						});
					});
				</script>

									</div>							
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>



		<!--====  End of medicament  ====-->
		

	<script>
		var btn=document.getElementsByClassName('btnDose');
		var dose= document.getElementsByClassName('dose');
		var count= document.getElementsByClassName('countDose');
		
		btn[0].addEventListener('click',function(e){
			dose[0].innerHTML=count[0].value;
		})
		btn[1].addEventListener('click',function(e){
			dose[1].innerHTML=count[0].value;
		})
		btn[2].addEventListener('click',function(e){
			dose[2].innerHTML=count[0].value;
		})
		btn[3].addEventListener('click',function(e){
			dose[3].innerHTML=count[0].value;
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
	<script>
																		const endpoint = 'https://api.myjson.com/bins/14j8qp';

																		const cities = [];
																		fetch(endpoint)
																		.then(blob => blob.json())
																		.then(data => cities.push(...data));

																		function findMatches(wordToMatch, cities) {
																		return cities.filter(place => {
																			// here we need to figure out if the city or state matches what was searched
																			const regex = new RegExp(wordToMatch, 'gi');
																			return place.title.match(regex)
																		});
																		}

																		function numberWithCommas(x) {
																		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
																		}

																		function displayMatches() {
																			
																		const matchArray = findMatches(this.value, cities);
																		const html = matchArray.map(place => {
																			
																			
																			var array = place.composition[0].components;
																			var keyNames = Object.keys(array);
																			// const stateName = place.state.replace(regex, `<span class="hl">${this.value}</span>`);
																			return `
																			<li>
																				<span class="name">${keyNames[0]}</span>
																				
																			</li>
																			`;
																		}).join('');
																		suggestions.innerHTML = html;
																		
																		
																		}

																		var searchInput = document.querySelector('.search');
																		const suggestions = document.querySelector('.suggestions');
																		// const li =document.querySelector('li');
																		searchInput.addEventListener('change', displayMatches);
																		searchInput.addEventListener('keyup', displayMatches);
																		const name =document.querySelector('.name');
																		name.addEventListener('click',function(e){
																			searchInput.value=e.target.innerHTML;
																			suggestions.style.display="none";
																			searchInput.addEventListener('keyup',function(e){
																				if(searchInput.value==e.target.innerHTML){
																				suggestions.style.display="none";
																			}
																			else{
																				suggestions.style.display="block";
																			}
																			})
																			
																			
																		})
																		
																		
																		
																		

																</script>
	
</body>

</html>