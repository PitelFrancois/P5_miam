<!-- Titre de la page -->
<?php $this->title = "Home"; ?>
<!-- Messages -->
<?= $this->session->show('registerMemberOk') ?>
<!-- Section des dernières recettes par catégorie -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__item">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 p-0">
                        <a href="/recipe/read/<?= $lastMain->id();?>">
                            <div class="hero__inside__item hero__inside__item--wide set-bg"
                            data-setbg="/Public/IMG/<?= $lastMain->namePicture();?>">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta">
                                        <?= $lastMain->dateAdd();?>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li><?= $lastMain->categorie();?></li>
                                        </ul>
                                        <h4><?= $lastMain->title();?></h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6  p-0">
                        <a href="/recipe/read/<?= $lastAperitif->id();?>">
                            <div class="hero__inside__item hero__inside__item--small set-bg"
                            data-setbg="/Public/IMG/<?= $lastAperitif->namePicture();?>">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta">
                                        <?= $lastAperitif->dateAdd();?>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li><?= $lastAperitif->categorie();?></li>
                                        </ul>
                                        <h5><?= $lastAperitif->title();?></h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="/recipe/read/<?= $lastEntrance->id();?>">
                            <div class="hero__inside__item hero__inside__item--small set-bg"
                            data-setbg="/Public/IMG/<?= $lastEntrance->namePicture();?>">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta">
                                        <?= $lastEntrance->dateAdd();?>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li><?= $lastEntrance->categorie();?></li>
                                        </ul>
                                        <h5><?= $lastEntrance->title();?></h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6  p-0">
                        <a href="/recipe/read/<?= $lastDessert->id();?>">
                            <div class="hero__inside__item set-bg" data-setbg="/Public/IMG/<?= $lastDessert->namePicture();?>">
                                <div class="hero__inside__item__text">
                                    <div class="hero__inside__item--meta">
                                        <?= $lastDessert->dateAdd();?>
                                    </div>
                                    <div class="hero__inside__item--text">
                                        <ul class="label">
                                            <li><?= $lastDessert->categorie();?></li>
                                        </ul>
                                        <h5><?= $lastDessert->title();?></h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section des catégories -->
<section class="categories spad">
    <div class="container">
        <h1 class="text-center mb-2">Miam</h1>
        <h4 class="text-center mb-3">Miam est un site pour les passionnés de cuisine.</h4>
        <h4 class="text-center mb-5">Que vous soyez amateur ou professionnel, venez partager vos recettes.</h4>
        <div class="row mt-5">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 class="text-center text-success mb-2">Apéritifs</h3>
                <a href="/recipe/aperitif">
                    <div class="categories__item set-bg" data-setbg="/Public/IMG/categories/cat-1.jpg">
                        <div class="categories__hover__text">
                            <h5>Apéritifs</h5>
                            <p><?= $countAperitif; ?> recettes</p>
                        </div>
                    </div>
                </a>    
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 class="text-center text-success mb-2">Entrées</h3>
                <a href="/recipe/entree">
                    <div class="categories__item set-bg" data-setbg="/Public/IMG/categories/cat-4.jpg">
                        <div class="categories__hover__text">
                            <h5>Entrées</h5>
                            <p><?= $countEntrance; ?> recettes</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 class="text-center text-success mb-2">Plats</h3>
                <a href="/recipe/plat">
                    <div class="categories__item set-bg" data-setbg="/Public/IMG/categories/cat-2.jpg">
                        <div class="categories__hover__text">
                            <h5>Plats</h5>
                            <p><?= $countMain; ?> recettes</p>
                        </div>
                    </div>
                </a>    
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <h3 class="text-center text-success mb-2">Desserts</h3>
                <a href="/recipe/dessert">
                    <div class="categories__item set-bg" data-setbg="/Public/IMG/categories/cat-3.jpg">
                        <div class="categories__hover__text">
                            <h5>Desserts</h5>
                            <p><?= $countDessert; ?> recettes</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>