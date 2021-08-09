<?php

// Namespace
namespace Francois\Controllers;

// Use
use Francois\App\Form;

// Déclaration de la classe
class ContactController extends Controller {

    public function sendMail() {
        // Si le formulaire est retourné
        if (Form::Validate($_POST,['contactName','contactMail','contactMessage'])) {
            // On récupère et on protège le contenu
            $name = htmlspecialchars($_POST['contactName']);
            $mail = htmlspecialchars($_POST['contactMail']);
            $message = $_POST['contactMessage'];
            // On vérifie que c'est bien un email qui est envoyé
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
                // Création d'un mail
                $header="MIME-Version: 1.0\r\n";
                $header.='From:"'.$name.'"<'.$mail.'>'."\n";
                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';
                // Envoie du mail
                mail("francoispitel87@gmail.com", "Message de ". $name, $message, $header);
                // On envoie un message 
                echo '<div id=session>
                    <div id="session2">
                        <p class="sessionP">Votre mail a bien été envoyé.</p>
                        <a id="cross"><i class="fas fa-times-circle"></i></a>
                    </div>
                </div>';
            }
        }

        // Création du formulaire de contact
        $contactForm = new Form;
        $contactForm->beginForm('POST',['id'=>'contactForm']);
        $contactForm->addInput('text','contactName',['placeholder'=>'Nom','id'=>'contactName']);
        $contactForm->addInput('email','contactMail',
        ['placeholder'=>'Email',
        'id'=>'contactMail',
        'value'=>$this->session->get('mail')
        ]);
        $contactForm->addTextArea('contactMessage','',['id'=>'mytextarea','class'=>'contactMessage']);
        $contactForm->rgpdValide();
        $contactForm->addButton('Envoyer',['class'=>'site-btn']);
        $contactForm->endForm();
        // On renvoie les données sur la vue sendMail
        $this->renderFront('contact/sendMail',['contactForm' => $contactForm->create()]);
    }
}