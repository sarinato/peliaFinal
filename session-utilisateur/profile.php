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
	<title>Profile</title>
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
    <section class="home_banner_area common-banner Medd">
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
									Votre Profile
								</a>
							</li>
							</ul>
						</div>
						<div class="medicament-contents bg-medicament">
							<div class="tab-content" id="pills-tabContent">
							<div  class="">
								<!-- Card global popup -->
								
											<!-- Form -->
										<form class="" action="requetteAjoutMedic.php" method="POST">
										
											
											</div>
												
												</div>
												<div style="width:100%;border-radius:20px;display:block" class=" white-popup-block d-flex justify-content-center animated zoomIn one" id="specifier">
												
												<div style=" max-width:470px; background:#fff;border-radius:20px">

													<div class="card joursSpicifier">

                                                    <div style=" padding-bottom: 0;padding-top: 0;" class=" card-header header">
                                                            <div class="Photo">
															<img style="border-radius:50%;margin-left:32%;margin-top:2%;" class="main-img img-circle wow bounceIn animated"  src="img/me.jpg" width="35%" alt="">
                                                            <a class=" modifierPhoto" href="">Modifier la photo</a>
                                                            </div>
                                                        </div>
													<div class="card-body box-shodw coordonne" id="coordonne">
                                                        
														<div style="margin-top:-7%;" class="form-group checkbox jours Cord" >
                                            <div style="" class="card-body">
                                            <div class="form-group ">
															<div class="search-form medecin ">
															<img  src="img/User.svg" width="8%" alt="">
															<input  placeholder="Prenom" class="typeText search Margin pic" type="text" name="PrenomProf" value="Ahmed"  required>
															</div>
															<div class="search-form medecin ">
                                                            <img  src="img/User.svg" width="8%" alt="">
															<input  placeholder="Nom" class="typeText search Margin pic" type="text" name="NomProf" value="KHACHIA ERRAHMAN" required>
                                                            </div>
                                                            <div class="search-form medecin ">
															<img  src="img/email.svg" width="7%" alt="">
															<input  placeholder="Email" class="typeText search Margin pic" type="email" name="EmailProf" value="Ahmedkhachia17@gmail.com"  required>
															</div>
															<div class="search-form medecin ">
															<img  src="img/phone1.svg" width="7%" alt="">
															<input  placeholder="Numéro de téléphone" class="typeText search Margin pic" type="text" name="NumProf" value="0671445870"  required>
															</div>
															<div class="search-form medecin ">
															<img  src="img/sexe.svg" width="7%" alt="">
															<input  placeholder="Sexe" class="typeText search Margin pic" type="text" name="SexeProf" value="Masculin" required>
                                                            </div>
                                                            <div class="search-form medecin ">
															<img  src="img/Age.svg" width="10%" alt="">
															<input  placeholder="Age" class="typeText search Margin pic" type="text" name="AgeProf" value="22" required>
															</div>
                                                        </div>
                                                        <div class="d-flex justify-content-center mt-5">
																<button class="primary-btn contact100-form-btn" type="submit" name="submit">Enregistrer</button>
												</div>
                                                    </div> 
                                                    
                                                    </div>
                                                        </div>
                                                </div>
                                               
										</form>

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