<!-- Titre de la page -->
<?php $this->title = $recipe->title(); ?>
<!-- Affichage de message dans un popup -->
<?= $this->session->show('newComment')?> 
<?= $this->session->show('signalComment')?>
<!-- Section d'une recette -->
<section class="single-post spad">
    <?php if ($recipe->namePicture() != ""){ ?>
        <div class="single-post__hero set-bg" data-setbg="/Public/IMG/<?= $recipe->namePicture();?>"></div>
    <?php }else{} ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="single-post__title">
                    <div class="single-post__title__meta">
                        <?= $recipe->dateAdd(); ?>
                    </div>
                    <div class="single-post__title__text">
                        <ul class="label">
                            <li><?= $recipe->categorie(); ?></li>
                        </ul>
                        <h4><?= $recipe->title(); ?></h4>
                        <ul class="widget">
                            <li>Par <?= $recipe->pseudo(); ?></li>
                            <li><?= $commentCount ?> commentaires</li>
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
                                <span><?= $recipe->howManyPeople(); ?></span>
                            </li>
                            <li>
                                <h5><i class="fa fa-clock-o"></i> préparation</h5>
                                <span><?= $recipe->preparationTime(); ?> min</span>
                            </li>
                            <li>
                                <h5><i class="fa fa-clock-o"></i> repos</h5>
                                <?php if ($recipe->cookingTime() != null) { ?>
                                    <span><?= $recipe->cookingTime(); ?> min</span>
                                <?php } else { ?>
                                    <span>--</span>
                                <?php } ?>
                            </li>
                            <li>
                                <h5><i class="fa fa-clock-o"></i> repos</h5>
                                <?php if ($recipe->restTime() != null) { ?>
                                    <span><?= $recipe->restTime(); ?> min</span>
                                <?php } else { ?>
                                    <span>--</span>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
                    <div class="single-post__recipe__details__indegradients">
                        <h5>Ingrédients</h5>
                        <p id="ingsList"><?=nl2br($recipe->ing());?></p>
                    </div>
                    <div class="single-post__recipe__details__direction">
                        <h5><span class="text-uppercase">é</span>tapes</h5>
                        <ul>
                            <p id="stepsList"><?=nl2br($recipe->step());?></p>
                        </ul>
                    </div>
                </div>
                <div class="single-post__next__previous">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <?php if($previousRecipe['id'] !="") { ?>
                                <a href="/recipe/read/<?= $previousRecipe['id'];?>" class="single-post__previous">
                                <h6><span class="arrow_carrot-left"></span> Recette précédente</h6>
                                <div class="single-post__previous__meta">
                                    <?= $previousRecipe['dateAdd'];?>
                                </div>
                                <div class="single-post__previous__text">
                                    <span><?= $previousRecipe['categorie'];?></span>
                                    <h5><?= $previousRecipe['title'];?></h5>
                                </div>
                            </a>
                            <?php } ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <?php if($nextRecipe['id'] !="") { ?>
                                <a href="/recipe/read/<?= $nextRecipe['id'];?>" class="single-post__previous">
                                    <h6 id="nextRecipe">Recette suivante <span class="arrow_carrot-right"></span></h6>
                                    <div class="single-post__next__meta">
                                        <?= $nextRecipe['dateAdd'];?>
                                    </div>
                                    <div class="single-post__next__text">
                                        <span><?= $nextRecipe['categorie'];?></span>
                                        <h5><?= $nextRecipe['title'];?></h5>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div id="comment" class="single-post__comment">
                    <div class="widget__title">
                        <h4><?= $commentCount ?> commentaires</h4>
                    </div>
                    <?php foreach($comments as $comment): ?>
                        <div class="single-post__comment__item">
                            <div class="single-post__comment__item__text">
                                <h5><?= $comment['pseudo']; ?></h5>
                                <span><?= $comment['dateAdd']; ?></span>
                                <p><?= $comment['comment']; ?></p>
                                <?php if ($this->session->get('pseudo')) { ?>
                                    <?php if ($comment['signalComment'] == 1 ) {?>
                                        <a href="/recipe/signalComment/<?= $comment['id']?>"><i class="fas fa-exclamation-circle"></i></a>
                                    <?php } elseif ($comment['signalComment'] == 2 ) { ?>
                                        <p>Ce commentaire a été signalé.</p>
                                    <?php } elseif ($comment['signalComment'] == 3 ) { ?> 
                                        <p>Ce commentaire a été signalé puis validé par l'admin.</p>
                                    <?php } ?>  
                                <?php } ?> 
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="single-post__leave__comment">
                    <div class="widget__title">
                        <h4>Laissez un commentaire</h4>
                    </div>
                    <?php if ($this->session->get('pseudo')) {
                        echo $commentForm ; 
                    } else { ?>
                        <p>Veuillez vous connecter pour laisser un commentaire.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>