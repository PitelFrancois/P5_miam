<!-- Titre de la page -->
<?php $this->title = "Connexion/Inscription" ?>
<!-- Sign In Section Begin -->
<div class="signin">
    <a href="/"><i class="far fa-times-circle"></i></a>
    <div class="signin__warp">
        <div class="signin__content">
            <div class="signin__logo">
                <a href="/"><img id="loginLogo" src="/Public/IMG/logo-Miamm.png" alt="Logo du site"></a>
            </div>
            <div class="signin__form">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="login" class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a id="register" class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">S'inscrire</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="signin__form__text">
                            <?= $loginForm; ?>
                            <p id="erreurLogin" style="color:red;margin-top:10px;"></p>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <div class="signin__form__text">
                            <?= $registerForm; ?>
                            <p id="erreurRegister" style="color:red;margin-top:10px;"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>