<!-- Titre de la page -->
<?php $this->title = "Modifier votre recette"; ?>
<!-- Section ajout de recette -->
<section class="categories categories-grid spad">
    <div class="categories__post">
        <div class="container">
            <div class="categories__grid__post">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="categories__list__post__item">
                            <div class="row">
                                <div class="col-lg-8 col-md-6">
                                    <div class="contact__form">
                                        <div class="contact__form__title">
                                            <h2>Modifier votre recette</h2>
                                        </div>
                                        <?= $addUpdate; ?>
                                        <p id="erreurAdd" style="color:red;margin-top:10px;"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="col-lg-4 col-md-4">
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
                            <div class="sidebar__item__categories">
                                <div class="sidebar__item__title">
                                    <h6>Categories</h6>
                                </div>
                                <ul>
                                    <li><a href="/recipe/aperitif">Apéritif <span><?=$aperitifCount;?></span></a></li>
                                    <li><a href="/recipe/entree">Entrée <span><?=$entranceCount;?></span></a></li>
                                    <li><a href="/recipe/plat">Plat <span><?=$mainCount;?></span></a></li>
                                    <li><a href="/recipe/dessert">Dessert <span><?=$dessertCount;?></span></a></li>
                                </ul>
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