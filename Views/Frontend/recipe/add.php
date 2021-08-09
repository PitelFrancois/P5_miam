<!-- Titre de la page -->
<?php $this->title = "Ajouter une recette"; ?>
<!-- Section ajout de recette -->
<section class="categories categories-grid spad">
    <div class="categories__post">
        <div class="container">
            <div class="categories__grid__post">
                <div id="row1" class="row">
                    <div id="col1" class="col-lg-8 col-md-8">
                        <div class="categories__list__post__item">
                            <div id="row2" class="row">
                                <div id ="col2" class="col-lg-8 col-md-6">
                                    <div class="contact__form">
                                        <div id="divStep1">
                                            <div class="contact__form__title">
                                                <h2>Ajouter votre recette</h2>
                                                <h4 class="mb-2">1 : Informations générales</h4>
                                                <p>* Champs obligatoires</p>
                                            </div>
                                            <div>
                                                <input type="text" id="title" placeholder="Titre *">
                                                <input type="number" id="preparationTime" placeholder="Temps de préparation *">
                                                <input type="number" id="cookingTime" placeholder="Temps de cuisson">
                                                <input type="number" id="restTime" placeholder="Temps de repos">
                                                <input type="number" id="howManyPeople" placeholder="Pour combien de personne *">
                                                <label>Est-ce que votre recette est vegan ? *</label>
                                                <select id="vegan">
                                                    <option value="oui">Oui</option>
                                                    <option value="non">Non</option>
                                                </select>
                                                <label>Selectionner la catégorie de votre recette : *</label>
                                                <select id="category">
                                                    <option value="Apéritif">Apéritif</option>
                                                    <option value="Entrée">Entrée</option>
                                                    <option value="Plat">Plat</option>
                                                    <option value="Dessert">Dessert</option>
                                                </select>
                                            </div>
                                            <div class="arrowRight">
                                                <i class="fas fa-arrow-circle-right" id="nextStep1"></i>
                                            </div>
                                            <div>
                                                <p id="erreurStep1" style="color:red;margin-top:10px;"></p>
                                            </div>
                                        </div>
                                        <div id="divStep2">
                                            <div class="contact__form__title">
                                                <h2>Ajouter votre recette</h2>
                                                <h4 class="mb-2"> 2 : Préparation de la recette</h4>
                                                <p>* Champs obligatoires</p>
                                            </div>
                                            <div>
                                                <textarea id="recipeStep"></textarea>
                                                <button id="addStep" class="site-btn mt-2 mb-3">Ajouter une étape</button>
                                            </div>
                                            <div class="arrow">
                                                <i class="fas fa-arrow-circle-left" id="previousStep1"></i>
                                                <i class="fas fa-arrow-circle-right" id="nextStep2"></i>
                                            </div>
                                            <h4 class="mt-4">Liste de vos étapes :</h4>
                                            <div id="stepList"></div>
                                            <div>
                                                <p id="erreurStep2" style="color:red;margin-top:10px;"></p>
                                            </div>
                                        </div>
                                        <div id="divStep3">
                                            <div class="contact__form__title">
                                                <h2>Ajouter votre recette</h2>
                                                <h4 class="mb-2"> 3 : Ingrédients de la recette</h4>
                                                <p>* Champs obligatoires</p>
                                            </div>
                                            <div>
                                                <input type="number" id="amount" placeholder="Quantité">
                                                <input type="text" id="unit" placeholder="Unité">
                                                <input type="text" id="nameIng" placeholder="Nom *">
                                                <button id="addIngredient" class="site-btn mt-2 mb-3">Ajouter un ingrédient</button>
                                            </div>
                                            <div class="arrow">
                                                <i class="fas fa-arrow-circle-left" id="previousStep2"></i>
                                                <i class="fas fa-arrow-circle-right" id="nextStep3"></i>
                                            </div>
                                            <h4 class="mt-4 mb-3">Liste de vos ingrédients :</h4>
                                            <div id="editIng" style="display:none;" >
                                                <input id="inputEditIng" type="text" style="width:90%">
                                                <i id="validIng" class="fas fa-check-circle"></i>
                                            </div>
                                            <div id="ingredientList"></div>
                                            <div>
                                                <p id="erreurStep3" style="color:red;margin-top:10px;"></p>
                                            </div>
                                        </div>
                                        <div id="divStep4">
                                            <section id="render" class="single-post spad">
                                                <div id="renderContainer" class="container">
                                                    <div id="row" class="row d-flex justify-content-center">
                                                        <div class="col-lg-8">
                                                            <div class="single-post__title">
                                                                <div id="renderDate" class="single-post__title__meta"></div>
                                                                <div class="single-post__title__text">
                                                                    <ul class="label">
                                                                        <li id="renderCategory"></li>
                                                                    </ul>
                                                                    <h4 id="renderTitle"></h4>
                                                                    <ul class="widget">
                                                                        <li>Par <?= $this->session->get('pseudo'); ?></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="single-post__social__item">
                                                                <ul>
                                                                    <li><a href="https://fr-fr.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                                    <li><a href="https://twitter.com/?lang=fr" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                                    <li><a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                                                    <li><a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                                                    <li><a href="/contact/sendMail"><i class="fa fa-envelope-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="single-post__recipe__details">
                                                                <div class="single-post__recipe__details__option">
                                                                    <ul>
                                                                        <li>
                                                                            <h5><i class="fa fa-user-o"></i> personnes</h5>
                                                                            <span id="renderHowManyPeople"></span>
                                                                        </li>
                                                                        <li>
                                                                            <h5><i class="fa fa-clock-o"></i> préparation</h5>
                                                                            <span id="renderPreparationTime"></span>
                                                                        </li>
                                                                        <li>
                                                                            <h5><i class="fa fa-clock-o"></i> cuisson</h5>
                                                                            <span id="renderCookingTime"></span>
                                                                        </li>
                                                                        <li>
                                                                            <h5><i class="fa fa-clock-o"></i> repos</h5>
                                                                            <span id="renderRestTime"></span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="single-post__recipe__details__indegradients">
                                                                <h5>Ingrédients</h5>
                                                                <ul id="renderIng"></ul>
                                                            </div>
                                                            <div class="single-post__recipe__details__direction">
                                                                <h5><span class="text-uppercase">é</span>tapes</h5>
                                                                <ul id="renderStep"></ul>
                                                            </div>
                                                            <img id="renderPicture2">
                                                            <div>
                                                                <?=$addForm;?>
                                                            </div>
                                                            <div>
                                                                <p id ="erreurStep4" style="color:red;margin-top:10px;"></p></div>
                                                            <div class="arrow">
                                                                <i class="fas fa-arrow-circle-left" id="previousStep3"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div id="nav" class="col-lg-4 col-md-4">
                        <div class="sidebar__item">
                            <div class="sidebar__follow__item">
                                <div class="sidebar__item__title">
                                    <h6>Nous suivre</h6>
                                </div>
                                <div class="sidebar__item__follow__links">
                                    <a href="https://fr-fr.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/?lang=fr" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a>
                                    <a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fa fa-instagram"></i></a>
                                    <a href="/contact/sendMail"><i class="fa fa-envelope-o"></i></a>
                                </div>
                            </div>
                            <div class="sidebar__subscribe__item">
                                <div class="sidebar__item__title">
                                    <h6>S'ABONNER</h6>
                                </div>
                                <p>Abonnez-vous à notre newsletter et recevez nos dernières mises à jour directement dans votre boîte de réception.</p>
                                <form action="#">
                                    <input type="text" class="email-input" placeholder="Votre email">
                                    <label for="s-agree-check">
                                        J'accepte les termes et conditions
                                        <input type="checkbox" id="s-agree-check">
                                        <span class="checkmark"></span>
                                    </label>
                                    <button type="submit" class="site-btn">S'abonner</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>