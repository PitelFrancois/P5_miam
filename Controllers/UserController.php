<?php

// Namespace
namespace Francois\Controllers;

// Use
use Francois\App\Form;
use Francois\App\Session;
use Francois\Models\UserModel;

// Déclaration de la classe
class UserController extends Controller {

    public $session;

    public function __construct() {
        $this->session = new Session($this->session);
        $this->user = new UserModel;
    }

    // Méthode pour se connecter ou s'inscrire
    public function login() {
        // Si un formulaire register est retourné
        if (Form::Validate($_POST,['registerPseudo','registerMail','registerMail2','registerPassword','registerPassword2'])) {
            // On protège les données reçu avec htmlspecialchars
            $pseudo = htmlspecialchars($_POST['registerPseudo']);
            $mail = htmlspecialchars($_POST['registerMail']);
            $mail2 = htmlspecialchars($_POST['registerMail2']);
            $password = htmlspecialchars($_POST['registerPassword']);
            $password2 = htmlspecialchars($_POST['registerPassword2']);
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
                // On instancie un UserModel
                $user = new UserModel;
                // On vérifie si le pseudo est déja utilisé
                $pseudoVerif = $user->verification("pseudo",$pseudo);
                // Si ce n'est pas le cas
                if ($pseudoVerif === 0) {
                    // On vérifie si l'adresse mail est déjà utilisé
                    $mailVerif = $user->verification("mail",$mail);
                    // Si ce n'est pas le cas
                    if ($mailVerif === 0) {
                        // On vérifie que les deux adresse mail sont identiques
                        if ($mail === $mail2) {
                            // On vérifie que les deux mot de passe sont identiques
                            if ($password === $password2) {
                                // On hache le mot de passe
                                $passwordHach = password_hash($password, PASSWORD_DEFAULT);
                                // Création d'une clé unique
                                $keyLength = 15;
                                $key = "";
                                for($i=1;$i<$keyLength;$i++) {
                                    $key .= mt_rand(0,9);
                                };
                                // Création d'un mail
                                $header="MIME-Version: 1.0\r\n";
                                $header.='From:"Miam"<miam@mail.com>'."\n";
                                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                                $header.='Content-Transfer-Encoding: 8bit';
                                $message='
                                    <html>
                                        <head>
                                            <link rel="preconnect" href="https://fonts.gstatic.com">
                                            <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
                                        </head>
                                        <body>
                                            <h1 style=color:green;">Miam</h1>
                                            <div>
                                                <p>Votre inscription est bientôt terminée, confirmer votre compte afin de pouvoir vous connecter sur Miam.</p>
                                                <a href="https://miam.fp87dev.com/user/registerConfirm/'.urlencode($pseudo).'/'.$key.'">
                                                    <button style="background-color:green;color:white;cursor:pointer">CONFIRMER</button>
                                                </a>
                                            </div>
                                        </body>
                                    </html>
                                ';
                                // Envoie du mail
                                mail($mail, "Confirmation de compte", $message, $header);
                                // Hydratation de l'objet
                                $user->setPseudo($pseudo);
                                $user->setMail($mail);
                                $user->setPassword($passwordHach);
                                $user->setConfirmKey($key);
                                // Création de l'utilisateur dans la base de données
                                $user->create();
                                echo '<div id=session>
                                    <div id="session2">
                                        <p class="sessionP">Vous êtes bien inscrit,vous allez recevoir un mail afin de valider votre compte.</p>
                                        <a id="cross"><i class="fas fa-times-circle"></i></a>
                                    </div>
                                </div>';
                            } else {
                                // Sinon on envoie un message d'alerte
                                echo '<div id=session>
                                    <div id="session2">
                                        <p class="sessionP">Les mot de passe ne sont pas identique.</p>
                                        <a id="cross"><i class="fas fa-times-circle"></i></a>
                                    </div>
                                </div>';
                            }
                        } else {
                            // Sinon on envoie un message d'alerte
                            echo '<div id=session>
                                <div id="session2">
                                    <p class="sessionP">Les adresses mail ne sont pas identique.</p>
                                    <a id="cross"><i class="fas fa-times-circle"></i></a>
                                </div>
                            </div>';
                        }
                    } else {
                        // Sinon on envoie un message d'alerte  
                        echo '<div id=session>
                            <div id="session2">
                                <p class="sessionP">Cette adresse mail est dèja utilisés.</p>
                                <a id="cross"><i class="fas fa-times-circle"></i></a>
                            </div>
                        </div>'; 
                    } 
                // Sinon on envoie un message d'alerte    
                } else {
                    echo '<div id=session>
                        <div id="session2">
                            <p class="sessionP">Ce pseudo est déjà prit.</p>
                            <a id="cross"><i class="fas fa-times-circle"></i></a>
                        </div>
                    </div>';
                }
            } else {
                echo '<div id=session>
                    <div id="session2">
                        <p class="sessionP">Vous devez rentrer une adresse mail.</p>
                        <a id="cross"><i class="fas fa-times-circle"></i></a>
                    </div>
                </div>';
            }
        }
        // Si un formulaire login est retourné
        if (Form::Validate($_POST,['pseudo','password'])) {
            // On protège les données reçu
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            // On instancie un nouveau User
            $user  = $this->user;
            // On vérifie si l'utilisateur est crée
            $data = $user->findByPseudo($pseudo);
            // On hydrate l'objet
            $user->hydrate($data);
            // On récupère le mot de passe
            $pass = $user->password();
            // On récupère le confirm
            $confirm = $user->confirm();
            // On Vérifie que le compte a bien était confirmé
            if ($confirm == 2) {
                //On vérifie que les deux mot de passe sont identiques
                $isPasswordValid = password_verify($password,$pass) ;
                // Si oui
                if ($isPasswordValid === true) {
                    // Si la case "rememberMe" est acvtive
                    if (isset($_POST['rememberMe'])){
                        setcookie('auth',$user->id(). '----' . sha1($user->pseudo().$user->password()),time()+3600*24*3,'/',null,true,true);
                    }
                    // On enregistre ses infos dans la session
                    $this->session->set('role', $user->role()) ;
                    $this->session->set('id', $user->id()) ;
                    $this->session->set('pseudo', $user->pseudo()) ;
                    $this->session->set('mail', $user->mail()) ;
                    // On renvoie l'utilisateur sur la page d'accueil
                    header("Location: /");
                } else {
                    // On envoie un message d'erreur
                    echo '<div id=session>
                        <div id="session2">
                            <p class="sessionP">Mot de passe incorrect.</p>
                            <a id="cross"><i class="fas fa-times-circle"></i></a>
                        </div>
                    </div>';
                }
            } else {
                // On envoie un message d'erreur
                echo'<div id=session>
                    <div id="session2">
                        <p class="sessionP">Vous n\'avez pas comfirmé votre compte.</p>
                        <a id="cross"><i class="fas fa-times-circle"></i></a>
                    </div>
                </div>';
            }
        }

        // Création du formulaire d'inscription
        $formRegister = new Form;
        $formRegister->beginForm('POST',['id'=>'formRegister']);
        $formRegister->addInput('text','registerPseudo',['placeholder'=>'Pseudo','id'=>'registerPseudo']);
        $formRegister->addInput('text','registerMail',['placeholder'=>'Mail','id'=>'registerMail']);
        $formRegister->addInput('text','registerMail2',['placeholder'=>'Confirmer votre mail','id'=>'registerMail2']);
        $formRegister->addInput('password','registerPassword',['placeholder'=>'Mot de passe','id'=>'registerPassword']);
        $formRegister->addInput('password','registerPassword2',['placeholder'=>'Confirmer votre mot de passe','id'=>'registerPassword2']);
        $formRegister->addButton('S\'inscrire',['class'=>'site-btn']);
        $formRegister->endForm();
        // Création du formulaire de connexion
        $formLogin = new Form;
        $formLogin->beginForm('POST',['id'=>'formLogin']);
        $formLogin->addInput('text','pseudo',['placeholder'=>'Pseudo','id'=>'loginPseudo']);
        $formLogin->addInput('password','password',['placeholder'=>'Mot de passe','id'=>'loginPassword']);
        $formLogin->addRememberMe();
        $formLogin->addButton('Connexion',['class'=>'site-btn','id'=>'loginButton']);
        $formLogin->endForm();
        // On renvoie les données sur la vue login
        $this->renderFront('user/login',['loginForm' => $formLogin->create(),'registerForm'=> $formRegister->create()]);
    }
    // Méthod qui permet de confirmer son compte
    public function registerConfirm($pseudo,$key) {
        // On instancie un nouveau User
        $user  = $this->user;
        // On récupère les données 
        $data = $user->findByPseudo($pseudo);
        // On hydrate l'objet
        $user->hydrate($data);
        // On compare les deux clé
        if ($user->confirmKey() === $key) {
            // Si elle sont identique
            $user->updateConfirm($user->id());
            // On envoie un message 
            $this->session->set('registerMemberOk', 
                            '<div id=session>
                                <div id="session2">
                                    <p class="sessionP">Votre compte est confirmé,vous pouvez vous connecter.</p>
                                    <a id="cross"><i class="fas fa-times-circle"></i></a>
                                </div>
                            </div>') ;
            // On renvoie l'utilisateur sur la page d'accueil
            header('Location: https://miam.fp87dev.com/');
        } else {
            // Si elle ne sont pas identique
            // On envoie un message
            $this->session->set('registerMemberNotOk', 
                            '<div id=session>
                                <div id="session2">
                                    <p class="sessionP">Une erreur est survenue, veuillez demander un mail.</p>
                                    <a id="cross"><i class="fas fa-times-circle"></i></a>
                                </div>
                            </div>') ;
            // On renvoie l'utilisateur sur la page d'accueil
            header('Location: https://miam.fp87dev.com/');
        }
    }
    // Méthode pour se déconnecter
    public function logout() {
        // Suppression de la session
        session_destroy();
        // Supression du cookie auth
        setcookie('auth','',time()-3600,'/',null,true,true);
        // On renvoie l'utilisateur sur la page d'accueil
        header('Location: /') ;
    }
    // Méthode qui permet de connecter l'utilisateur automatiquement
    public function autoLogin($auth){
        // On instancie un nouveau User
        $user  = $this->user;
        // On vérifie si l'utilisateur est crée
        $userFind = $user->findForCookie($auth);
        // On hydrate l'objet
        $user->hydrate($userFind);
        // On récupère la clé
        $key = sha1($userFind['pseudo'].$userFind['password']);
        // On vérifie que la deux clés sont identiques
        if ($key == $auth[1]){
            // On enregistre ses infos dans la session
            $this->session->set('role', $user->role()) ;
            $this->session->set('id', $user->id()) ;
            $this->session->set('pseudo', $user->pseudo()) ;
            $this->session->set('mail', $user->mail()) ;
        } else {
            setcookie('auth','',time()-3600,'/',null,true,true);
        }
    }
}