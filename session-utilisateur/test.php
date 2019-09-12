                                                                        <form action="changeDay.php"  id="<?php echo 'dayForm'.$s ?>" method="POST">
                                                                            <input type="checkbox" id="quotidien" name="jours" value="all" />
                                                                            <label class="quotidienShow" for="quotidien"><span class="chk-span"></span>Quotidien</label>
                                                                            <input type="checkbox" name="jour_selectionne" id="quotidien_seleted_modif" value="all" />
                                                                            <br>
                                                                            <input type="checkbox" name="jours" id="specifier" value="specifique" />
                                                                            <label class="specifierShow" for="specifier"> <span class="chk-span"> </span>Jours spécifiques de la semaine</label>
                                                                            <input type="checkbox" name="jour_selectionne" id="specifier_seleted_modif" value="specifique" />
                                                                            <br>
                                                                            <input type="checkbox" name="jours" id="interval" value="interval" />
                                                                            <label class="intervalShow" for="interval"><span class="chk-span">  </span>Interval de (X) jours </label>
                                                                            <input type="checkbox" name="jour_selectionne" id="interval_seleted_modif" value="interval" />

                                                                            <div class="form-group checkbox jours changeJours animated fadeInUp" style="display:none;">
                                                                                <input type="checkbox" name="lundi" id="jr1" value="lundi" />
                                                                                <label for="jr1" class="jrs"><span class="chk-span "></span>Lundi </label>

                                                                                <input type="checkbox" name="mardi" id="jr2" value="mardi" />
                                                                                <label for="jr2" class="jrs"><span class="chk-span"> </span>Mardi</label>

                                                                                <input type="checkbox" name="mercredi" id="jr3" value="mercredi" />
                                                                                <label for="jr3" class="jrs"><span class="chk-span"> </span>Mercredi</label>

                                                                                <input type="checkbox" id="jr4" name="jeudi" value="jeudi" />
                                                                                <label for="jr4" class="jrs"><span class="chk-span"></span>Jeudi</label>

                                                                                <input type="checkbox" name="venredi" id="jr5" value="venredi" />
                                                                                <label for="jr5" class="jrs"><span class="chk-span"> </span>Vendredi</label>

                                                                                <input type="checkbox" name="samedi" id="jr6" value="samedi" />
                                                                                <label for="jr6" class="jrs"><span class="chk-span"> </span>Samedi</label>

                                                                                <input type="checkbox" name="dimanche" id="jr7" value="dimanche" />
                                                                                <label for="jr7" class="jrs"><span class="chk-span"> </span>Dimanche</label>
                                                                            </div>

                                                                            <div class="reservation-form__count interval intervalChange animated fadeInUp" style="display:none;">
                                                                                <label for="count">Date de début de traitement</label>
                                                                                <br>
                                                                                <div class="input-group">
                                                                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Date début" name="dateDebut">
                                                                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                                                                </div>

                                                                                <label for="count">Interval entre prises de médicament</label>
                                                                                <br>

                                                                                <button id="btn-minus" class="btn-minus-interval_modif" type="button">-</button>
                                                                                <input id="count" type="text" name="interval_prise" class="count_modif" value="3">
                                                                                <button id="btn-plus" class="btn-plus-interval_modif" type="button">+</button>
                                                                            </div>

                                                                            <input type="text" style="display:none" name="IDJours" value="<?php echo $medic['id_jours']; ?>">
                                                                            <input type="text" style="display:none" name="IDTemps" value="<?php echo $medic['id_temps']; ?>">
                                                                            <div class="d-flex justify-content-center mt-5">
                                                                                <button class="primary-btn contact100-form-btn" type="submit" id="<?php echo 'modifierJours'.$s ?>" name="modifierJours">Enregistrer</button>
                                                                                <button class="primary-btn contact100-form-btn">annuler</button>

                                                                            </div>
                                                                        </form>