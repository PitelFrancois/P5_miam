<!-- Menu hamburger -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="/"><img src="/Public/IMG/logo-Miamm.png" alt="Logo du site"></a>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <?php if ($this->session->get('role') == 1) { ?>
                <li class="active"><a href="/">Home</a></li>
                <li class=""><a href="/recipe/myrecipe">Mes recettes</a></li>
                <li class=""><a href="/recipe/add"><i class="fas fa-plus"></i></a></li>
                <li class=""><a href="/contact/sendMail">Contact</a></li>
                <li class=""><a href="/user/logout">Deconnexion</a></li>
            <?php } elseif ($this->session->get('role') == 2) { ?>
                <li class="active"><a href="/">Home</a></li>
                <li class=""><a href="/recipe/myrecipe">Mes recettes</a></li>
                <li class=""><a href="/recipe/add"><i class="fas fa-plus"></i></a></li>
                <li class=""><a href="/contact/sendMail">Contact</a></li>
                <li class=""><a href="/dashboard">Dashboard</a></li>
                <li class=""><a href="/user/logout">Deconnexion</a></li>
            <?php } else { ?>
                <li class="active"><a href="/">Home</a></li>
                <li class=""><a href="/contact/sendMail">Contact</a></li>
                <li class=""><a href="/user/login">Connexion</a></li>
            <?php } ?>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="humberger__menu__about">
        <div class="humberger__menu__title sidebar__item__title">
            <h6>A propos</h6>
        </div>
        <h6>Bonjour tout le monde et bienvenue sur Miam.</h6>
        <p>Suivez nous sur le réseaux sociaux..</p>
        <div class="humberger__menu__about__social sidebar__item__follow__links">
            <a href="https://fr-fr.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/?lang=fr" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a>
            <a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="/contact/sendMail"><i class="fa fa-envelope-o"></i></a>
        </div>
    </div>
    <div class="humberger__menu__subscribe">
        <div class="humberger__menu__title sidebar__item__title">
            <h6>S'abonner</h6>
        </div>
        <p>Abonnez-vous à notre newsletter et recevez nos dernières mises à jour directement dans votre boîte de réception.</p>
        <form action="#">
            <input type="text" class="email-input" placeholder="Votre email">
            <label for="agree-check">
                J'accepte les termes et conditions
                <input type="checkbox" id="agree-check">
                <span class="checkmark"></span>
            </label>
            <button type="submit" class="site-btn">S'abonner</button>
        </form>
    </div>
</div>
<!-- Header -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-1 col-6 order-md-1 order-1">
                    <div class="header__humberger">
                        <i class="fa fa-bars humberger__open"></i>
                    </div>
                </div>
                <div class="col-lg-8 col-md-10 order-md-2 order-3">
                    <nav class="header__menu">
                        <ul>
                            <?php if ($this->session->get('role') == 1) { ?>
                                <li class="active"><a href="/">Home</a></li>
                                <li class=""><a href="/recipe/myrecipe">Mes recettes</a></li>
                                <li class=""><a href="/recipe/add"><i class="fas fa-plus"></i></a></li>
                                <li class=""><a href="/contact/sendMail">Contact</a></li>
                                <li class=""><a href="/user/logout">Deconnexion</a></li>
                            <?php } elseif ($this->session->get('role') == 2) { ?>
                                <li class="active"><a href="/">Home</a></li>
                                <li class=""><a href="/recipe/myrecipe">Mes recettes</a></li>
                                <li class=""><a href="/recipe/add"><i class="fas fa-plus"></i></a></li>
                                <li class=""><a href="/contact/sendMail">Contact</a></li>
                                <li class=""><a href="/dashboard">Dashboard</a></li>
                                <li class=""><a href="/user/logout">Deconnexion</a></li>
                            <?php } else { ?>
                                <li class="active"><a href="/">Home</a></li>
                                <li class=""><a href="/contact/sendMail">Contact</a></li>
                                <li class=""><a href="/user/login">Connexion</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                <!-- Icon de recherche -->
                <div class="col-lg-2 col-md-1 col-6 order-md-3 order-2">
                    <div class="header__search">
                        <i class="fa fa-search search-switch"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <?php if ($this->session->get('role') == false){ ?>
                <div class="header__btn">
                    <a href="/user/login" class="primary-btn">S'inscrire</a>
                </div>
                <?php } ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="header__logo">
                    <a href="/"><img src="/Public/IMG/logo-Miamm.png" alt="Logo du site"></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__social">
                    <a href="https://fr-fr.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/?lang=fr" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a>
                    <a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="/contact/sendMail"><i class="fa fa-envelope-o"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>