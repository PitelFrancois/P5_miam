<!-- Footer -->
<footer class="footer">
    <div class="container-fluid">
        <div class="footer__instagram">
            <div class="footer__instagram__avatar">
                <div class="footer__instagram__avatar--pic">
                    <img src="/Public/IMG/footer/instagram-avatar.jpg" alt="image d'instagram">
                </div>
                <div class="footer__instagram__avatar--text">
                    <h5>@ miam</h5>
                    <span>23,7k follower</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg" data-setbg="/Public/IMG/footer/ip-1.jpg"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg" data-setbg="/Public/IMG/footer/ip-2.jpg"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg" data-setbg="/Public/IMG/footer/ip-3.jpg"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg" data-setbg="/Public/IMG/footer/ip-4.jpg"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg" data-setbg="/Public/IMG/footer/ip-5.jpg"></div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-6">
                    <div class="footer__instagram__item set-bg" data-setbg="/Public/IMG/footer/ip-6.jpg"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__text">
                    <div class="footer__logo">
                        <a href="/"><img src="/Public/IMG/logo-Miamm.png" alt="Image du logo"></a>
                    </div>
                    <div class="footer__social">
                        <a href="https://fr-fr.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/?lang=fr" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a>
                        <a href="/contact/sendMail"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
                <div class="footer__copyright">
                    <a href="/mentionsLegales"><p>Mentions légales</p></a>
                    <p>Ce site a été crée dans le cadre d'un projet Openclassroom.</p>
                    <p>Certaines photos viennent du site <a target="_blank" href="https://www.cuisineaz.com/tous-en-cuisine-avec-cyril-lignac-les-recettes-en-direct-p395">CuisineAZ</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Section de recherche -->
<div class="search-model">
    <div class="h-100 d-flex flex-column align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Recherche.....">
        </form>
        <div style="color:white; margin-top:10px; text-align:center;" id="resultSearch"></div>
    </div>
</div>
<!-- Section Alert Cookie -->
<?php if($showcookie) { ?>
    <div class="cookie-alert">
        En poursuivant la navigation sur ce site, j'acceptez l’utilisation de cookies.<br /><a class="mt-3" href="/cookie/acceptCookie">VALIDER</a>
    </div>
<?php } ?>