<?php

include("verificationLogin.php");
require("connect.php");
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
        <title>Ajouter un rendez-vous</title>
        <?php
	include "link.php";
	?>
            <link rel="stylesheet" href="css/json.css">
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
									Ajouter des Rendez-vous
									<span>auquel vous etes alérter</span>
								</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="medicament-contents bg-medicament">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="VR">
                                            <!-- Card global popup -->

                                            <!-- Form -->
                                            <form class="" action="requetteAjoutRendez.php" method="POST">
                                                <div class="d-flex justify-content-around flex-wrap simple-information">
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div class="card-body VR">
                                                                <h5 class="card-title ">Ajouter un rendez-vous</h5>

                                                                <div class="form-group">
                                                                    <div class="search-form medecin ">
                                                                        <input placeholder="Nom du rendez-vous" class="typeText search Margin pic" type="text" name="nomRend" required>
                                                                    </div>
                                                                    
                                                                    <div class="form-group col-md-12 selectt ">
                                                                        
                                                                             <div id="app-cover">
                                                                                <div id="select-box">
                                                                                    <input type="checkbox" class="frequenceInput" id="options-view-button" value="0">
                                                                                    <div id="select-button" class="brd">
                                                                                        <div id="selected-value">
                                                                                            <span>Choisissez un medecin</span>
                                                                                        </div>
                                                                                        <div id="chevrons">
                                                                                            <i class="fa fa-chevron-up"></i>
                                                                                            <i class="fa fa-chevron-down"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div id="options">
                                                                                        <div class="option">
                                                                                            <input class="s-c top" type="checkbox" name="medecinSelected" value="1">
                                                                                            <input class="s-c bottom frequenceInput" type="checkbox" name="medecinSelected" value="1">
                                                                                            <span class="label">Aucun médecin</span>
                                                                                            <span class="opt-val">Aucun médecin</span>
                                                                                        </div>
                                                                                        <?php

                    $i=1;
                    foreach( $medecin as $key ) { $i++;
                        ?>
                                                                                        <div class="option">
                                                                                            <input class="s-c top" type="checkbox" name="medecinSelected" value="2">
                                                                                            <input class="s-c bottom frequenceInput" type="checkbox"  name="medecinSelected" value="<?php echo $key['id_medecin']; ?>">
                                                                                            <span class="label"><?php echo $key['nom_medecin']; ?></span>
                                                                                            <span class="opt-val"><?php echo $key['nom_medecin']; ?></span>
                                                                                        </div>
                    <?php
                    }
                    ?>
                                                                                    
                                                                                        <div class="option">
                                                                                            <input class="s-c top " type="checkbox" name="medecinSelected" value="3">
                                                                                            <input class="s-c bottom frequenceInput ajouterMedecin" type="checkbox" name="medecinSelected" value="3">
                                                                                            <span class="label">Ajouter un medecin</span>
                                                                                            <span class="opt-val">Ajouter un medecin</span>
                                                                                        </div>
                                                                                        
                                                                                        <div id="option-bg"></div>
                                                                                    </div>
                                                                                </div>

														                    </div>
                                                                            <!-- FIN DU SELECT BOX -->
                                                                        </div>

                                                                    </div>
                                                                    <div class="search-form medecin">

                                                                        <div class="input-group dateRendez">
                                                                            <img src="img/rendez.svg" width="7%" alt="">
                                                                            <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                                                            <input class="input--style-2 js-datepicker " type="text" placeholder="Date de Rendez-vous" name="dateRendez">

                                                                        </div>
                                                                    </div>
                                                                    <div class="search-form medecin">
                                                                        <img src="img/time.svg" width="7%" alt="">
                                                                        <div class="form-group unique" id="timeRendez">
                                                                            <input type="text" name="timeRendez" data-toggle="timepicker" class="form-input" autocomplete="off" placeholder="12:00">
                                                                        </div>
                                                                    </div>

                                                                    <div class="search-form medecin ">
                                                                    <span >Vous serez rappelez la nuitiez du rendez-vous par votre controle à 21 heures</label><br>
                                                                        <img src="img/alarm.svg" width="7%" alt="">
                                                                        
                                                                        <a class="appelRapelReminder reminder" href="#rappel"><span class="Margin pic lesRappel">ajouter d'autres rappel</span></a>
                                                                        <input type="text" style="display:none" name="heureRappel" class="inputeureRappel" value="">

                                                                    </div>

                                                                    <div class="search-form medecin ">
                                                                        <img src="img/adresse.svg" width="7%" alt="">
                                                                        <input placeholder="Ajouter un emplacement" class="typeText search Margin pic" type="text" name="LocMed" required>
                                                                    </div>

                                                                    <div class="search-form medecin ">
                                                                        <img src="img/remarque.svg" width="7%" alt="">
                                                                        <input placeholder="Ajouter des remarques" class="typeText search Margin pic" type="text" name="RemarqueMed" required>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                <div style="width:100%;display:none;" class="mfp-hide white-popup-block d-flex justify-content-center animated zoomIn" id="rappel">
													
												<div class="card joursSpicifier" style="max-width:350px;">
														<div class="card-header">
                                                        Ajouter d'autres rappel
														</div>
														<div class="card-body box-shodw">
														<label class="Titre-jours" >Vouliez vous ajouter d'autres rappel</label><br>

															<div class="form-group checkbox one-choice rappelControll" >

																<input type="checkbox" class="rappelTime" name="heureRappel" id="jr2" value="30 minutes avant"/>
																<label for="jr2" class="jrs"><span class="chk-span" > </span>30 minutes avant</label>

																<input type="checkbox" class="rappelTime" name="heureRappel" id="jr3" value="1 heure avant"/>
																<label for="jr3" class="jrs"><span class="chk-span" > </span>1 heure avant</label>
																
																<input type="checkbox" id="jr4" class="rappelTime" name="heureRappel" value="2 heure avant"/>
																<label  for="jr4" class="jrs"><span class="chk-span" ></span>2 heure avant</label>
																									
																<input type="checkbox" class="rappelTime" name="heureRappel" id="jr5" value="3 heure avant"/>
																<label for="jr5" class="jrs"><span class="chk-span" > </span>3 heure avant</label>

																<input type="checkbox" class="rappelTime" name="heureRappel" id="jr6" value="4 heure avant"/>
																<label for="jr6" class="jrs"><span class="chk-span" > </span>4 heure avant</label>

															</div>
															<div class="d-flex justify-content-around">
																<p><a class="popup-rapelCont-enreg primary-btn" href="#">Enregistrer</a></p>
																<p><a class="popup-rapelCont-annuler primary-btn" href="#">Annuler</a></p>
															</div>
														</div>
													</div>
												</div>
                                                <div class="d-flex justify-content-center mt-5">
                                                    <button class="primary-btn contact100-form-btn" type="submit" name="ajoutControle">Ajouter</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
									<div class="VM" style="display:none">
                                            <!-- Card global popup -->

                                            <!-- Form -->
                                            <form class="" action="requetteAjoutMedic.php" method="POST">
                                                <div class="d-flex justify-content-around flex-wrap simple-information">
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div class="card-body VM">
                                                                <h5 class="card-title ">Ajouter un médecin</h5>

                                                                <div class="form-group ">
                                                                    <div class="search-form medecin ">
                                                                        <img src="img/doctor.svg" width="12%" alt="">
                                                                        <input placeholder="Nom du médecin" class="typeText search Margin pic" type="text" name="nomMed" required>
                                                                    </div>
                                                                    <div class="search-form medecin ">
                                                                        <input placeholder="Spécialité" class="typeText search Margin specialite" type="text" name="SpecMed" required>
                                                                    </div>
                                                                    <div class="search-form medecin ">
                                                                        <img src="img/phone1.svg" width="7%" alt="">
                                                                        <input placeholder="Numéro de téléphone" class="typeText search Margin pic" type="text" name="numMed" required>
                                                                    </div>

                                                                    <div class="search-form medecin ">
                                                                        <img src="img/email.svg" width="7%" alt="">
                                                                        <input placeholder="Email" class="typeText search Margin pic" type="email" name="emailMed" required>
                                                                    </div>

                                                                    <div class="search-form medecin ">
                                                                        <img src="img/adresse.svg" width="7%" alt="">
                                                                        <input placeholder="Adresse" class="typeText search Margin pic" type="text" name="adresseMed" required>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="d-flex justify-content-center mt-5">
                                                    <button class="primary-btn contact100-form-btn VMbtn" type="submit" name="submit">Ajouter</button>
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

          

            <script type="text/javascript">
                $('.clockpicker').clockpicker({
                    placement: 'top',
                    align: 'left',
                    donetext: 'Done'
                });
            </script>
            <script src="dist/timepicker.min.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
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

    </body>

    </html>