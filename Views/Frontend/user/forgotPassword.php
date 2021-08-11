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
                        <a class="nav-link active" data-toggle="tab" role="tab" aria-selected="false">Nouveau mot de passe</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="signin__form__text">
                            <?= $formPassword; ?>
                            <p id="erreurPassword" style="color:red;margin-top:10px;"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>