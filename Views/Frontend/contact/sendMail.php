<!-- Titre de la page -->
<?php $this->title = "Contact"; ?>
<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="contact__text">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h2>Contact</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Contact</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86684.4477474749!2d-1.6300955507595754!3d47.23831721316538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805ee81f0a8aead%3A0x40d37521e0ded30!2sNantes!5e0!3m2!1sfr!2sfr!4v1618218089217!5m2!1sfr!2sfr" width="600" height="350" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                    <div class="contact__widget">
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>Miam, 123 rue de la ville, 44000</span>
                            </li>
                            <li>
                                <i class="fa fa-mobile"></i>
                                <span>Tel: 01-23-45-67-89</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i>
                                <span>Email: miam@mail.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <div class="contact__form__title">
                            <h2>CONTACT</h2>
                            <p>Si vous avez la moindre question ou un problème,envoyer un message.</p>
                        </div>
                        <?= $contactForm; ?>
                        <p id="erreurContact" style="color:red;margin-top:10px;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
