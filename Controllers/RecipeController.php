<?php

// Namespace
namespace Francois\Controllers;

// Use
use Francois\App\Session;
use Francois\App\Form;
use Francois\Models\RecipeModel;
use Francois\Models\CommentModel;

// Déclaration de la classe
class RecipeController extends Controller {

    public function __construct() {
        $this->session = new Session($this->session);
    }

    // Méthode qui renvoie vers la vue read via un id
    public function read($id) {
        // Si un formulaire commentaire est retourné
        if (Form::Validate($_POST,['comment'])) {
            // On protège les données reçu
            $comments = strip_tags($_POST['comment']);
            // On récupère le pseudo
            $pseudo = $this->session->get('pseudo');
            // On récupère l'id de la recette
            $recipeId = $id;
            // On insert le commentaire dans la bdd
            $comment = new CommentModel;
            $comment->setRecipeId($recipeId);
            $comment->setUserId($this->session->get('id'));
            $comment->setPseudo($pseudo);
            $comment->setComment($comments);
            $comment->create();
            
            // On renvoie l'utilisateur sur la page de la recette
            header("Location: ".$root."recipe/read/". $id);
            // On envoie un message 
            echo
            '<div id=session>
                <div id="session2">
                    <p class="sessionP">Le commentaire est en attente de validation.</p>
                    <a id="cross"><i class="fas fa-times-circle"></i></a>
                </div>
            </div>';
        }
        // On instancie une recette
        $newRecipe = new RecipeModel;
        // On récupère les données
        $data = $newRecipe->findById($id);
        // On hydrate l'objet
        $recipe = $newRecipe->hydrate($data);
        // On instancie un commentaire
        $comment = new CommentModel;
        // On récupère les commentaire liés à la recette
        $commentCount = $comment->commentCount($id);
        // On récupère l'id de la recette
        $previousId = $id;
        // on décrément l'id
        $previousId--;
        // On vérifie si la ligne existe
        $verifExist = $newRecipe->verification('id',$previousId);
        // On vérifie que l'id est supérieur à 1
        if ($previousId > 1) {
            // Tant que $verifExist n'est pas égal à 1
            while ($verifExist <= 0) {
                // On décrémente l'id
                $previousId--;
                // On vérifie si la ligne existe
                $verifExist = $newRecipe->verification('id',$previousId);
            }
        }
        // On récupère la dernière recette crée
        $lastRecipe = $newRecipe->lastRecipeCreate();
        // On récupère son id
        $lastRecipeId = $lastRecipe['id'];
        // On récupère la recette précédente
        $previousRecipe = $newRecipe->findById($previousId);
        // On récupère l'id de la recette
        $nextId = $id;
        // On incrémente l'id
        $nextId++;
        // On vérifie si la ligne existe
        $verifExist2 = $newRecipe->verification('id',$nextId);
        // Si l'id est plus petit ou égal au dernier id
        if ($nextId <= $lastRecipeId) {
            // Tant que $verifExist n'est pas égal à 1
            while ($verifExist2 <= 0) {
                // On incrémente l'id
                $nextId++;
                // On vérifie si la ligne existe
                $verifExist2 = $newRecipe->verification('id',$nextId);
            }
        }
        // On récupère la recette suivante
        $nextRecipe = $newRecipe->findById($nextId);
        // On récupère les commentaires liés à la recette
        $comments = $comment->findAll($id);
        // Création du formulaire de commentaire
        $commentForm = new Form;
        $commentForm->beginForm('POST');
        $commentForm->addTextarea('comment');
        $commentForm->addButton('Envoyer',['id'=>'addComment','class'=>'site-btn']);
        $commentForm->endForm();
        // On renvoie les données sur la vue read
        $this->renderFront('recipe/read',[
            'recipe'=>$recipe,
            'commentCount'=>$commentCount,
            'previousRecipe'=>$previousRecipe,
            'nextRecipe'=>$nextRecipe,
            'comments'=>$comments,
            'commentForm'=>$commentForm->create()
        ]);
    }
    // Méthode qui renvoie vers la vue aperitif
    public function aperitif() {
        // On instancie un model
        $recipe = new RecipeModel;
        // On récupère toutes les recettes suivant sa catégorie
        $recipes = $recipe->findAllCategorie("Apéritif");
        // On récupère le nombre des recettes par catégorie
        $aperitifCount = $recipe->recipeCount("Apéritif");
        $entranceCount = $recipe->recipeCount("Entrée");
        $mainCount = $recipe->recipeCount("Plat");
        $dessertCount = $recipe->recipeCount("Dessert");
        // On renvoie les données sur la page dessert
        $this->renderFront('recipe/aperitif',[
            'recipes'=>$recipes,
            'entranceCount'=>$entranceCount,
            'mainCount'=>$mainCount,
            'aperitifCount'=>$aperitifCount,
            'dessertCount'=>$dessertCount
        ]);
    }
    // Méthode qui renvoie vers la vue entre
    public function entree() {
        // On instancie un model
        $recipe = new RecipeModel;
        // On récupère toutes les recettes suivant sa catégorie
        $recipes = $recipe->findAllCategorie("Entrée");
        // On récupère le nombre des recettes par catégorie
        $aperitifCount = $recipe->recipeCount("Apéritif");
        $entranceCount = $recipe->recipeCount("Entrée");
        $mainCount = $recipe->recipeCount("Plat");
        $dessertCount = $recipe->recipeCount("Dessert");
        // On renvoie les données sur la page dessert
        $this->renderFront('recipe/entree',[
            'recipes'=>$recipes,
            'entranceCount'=>$entranceCount,
            'mainCount'=>$mainCount,
            'aperitifCount'=>$aperitifCount,
            'dessertCount'=>$dessertCount
        ]);
    }
    // Méthode qui renvoie vers la vue plat
    public function plat() {
        // On instancie un model
        $recipe = new RecipeModel;
        // On récupère toutes les recettes suivant sa catégorie
        $recipes = $recipe->findAllCategorie("Plat");
        // On récupère le nombre des recettes par catégorie
        $aperitifCount = $recipe->recipeCount("Apéritif");
        $entranceCount = $recipe->recipeCount("Entrée");
        $mainCount = $recipe->recipeCount("Plat");
        $dessertCount = $recipe->recipeCount("Dessert");
        // On renvoie les données sur la page dessert
        $this->renderFront('recipe/main',[
            'recipes'=>$recipes,
            'entranceCount'=>$entranceCount,
            'mainCount'=>$mainCount,
            'aperitifCount'=>$aperitifCount,
            'dessertCount'=>$dessertCount
        ]);
    }
    // Méthode qui renvoie vers la vue dessert
    public function dessert() {
        // On instancie un model
        $recipe = new RecipeModel;
        // On récupère toutes les recettes suivant sa catégorie
        $recipes = $recipe->findAllCategorie("Dessert");
        // On récupère le nombre des recettes par catégorie
        $aperitifCount = $recipe->recipeCount("Apéritif");
        $entranceCount = $recipe->recipeCount("Entrée");
        $mainCount = $recipe->recipeCount("Plat");
        $dessertCount = $recipe->recipeCount("Dessert");
        // On renvoie les données sur la page dessert
        $this->renderFront('recipe/dessert',[
            'recipes'=>$recipes,
            'entranceCount'=>$entranceCount,
            'mainCount'=>$mainCount,
            'aperitifCount'=>$aperitifCount,
            'dessertCount'=>$dessertCount
        ]);
    }
    // Méthode qui renvoie vers la vue myrecipe
    public function myrecipe(){
        // On instancie un model
        $recipe = new RecipeModel;
        // On récupère toutes les recettes suivant sa catégorie
        $recipes = $recipe->findAllMyRecipe($this->session->get('pseudo'));
        // On renvoie les données sur la page myrecipe
        $this->renderFront('recipe/myrecipe',[
            'recipes'=>$recipes
        ]); 
    }
    // Méthode qui permet d'ajouter une recette
    public function add(){
        // Si un formulaire est envoyé
        if (Form::Validate($_POST,['formTitle','formPreparationTime','formHowManyPeople','formVegan','formCategorie','formStep','formIng'])) {
            // On protège toutes les données reçu
            $title = htmlspecialchars($_POST['formTitle']);
            $preparationTime = htmlspecialchars($_POST['formPreparationTime']);
            $cookingTime = htmlspecialchars($_POST['formCookingTime']);
            $restTime = htmlspecialchars($_POST['formRestTime']);
            $howManyPeople = htmlspecialchars($_POST['formHowManyPeople']);
            $vegan = htmlspecialchars($_POST['formVegan']);
            $category = htmlspecialchars($_POST['formCategorie']);
            $step = htmlspecialchars($_POST['formStep']);
            $ing = htmlspecialchars($_POST['formIng']);
            // On instancie le model
            $recipe = new RecipeModel;
            // Si une photo à était envoyé
            if(isset($_FILES)){
                // On récupère le nom
                $fileName = $_FILES['formPicture']['name'];
                // On protège les données reçu avec htmlspecialchars
                $fileName = htmlspecialchars($fileName);
                // On récupère la taille de la photo
                $fileSize =  $_FILES['formPicture']['size'];
                // On récupère le chemin de la photo
                $fileTmpName = $_FILES['formPicture']['tmp_name'];
                // On récupère l'extension de la photo
                $fileExtension = strrchr($fileName,'.');
                // On fais un tri des extensions autorisées
                $extensionAutorised = array('.jpg','.JPG','.png','.PNG','.gif','.GIF','.jpeg','.JPEG');
                // On crée le chemin de destination de la photo
                $fileDest = '../Public/IMG/' . $fileName;
                // Si l'extension est autorisée
                if (in_array($fileExtension, $extensionAutorised)) {
                    // On vérifie le poids de la photo
                    if ($fileSize < 700000) {
                        if (move_uploaded_file($fileTmpName,$fileDest)) {
                            // On hydrate recipe
                            $recipe->setNamePicture($fileName);
                        }
                    }
                }
            }
            // On récupère le userId
            $userId = $this->session->get('id');
            // On hydrate recipe
            $recipe->setUserId($this->session->get('id'));
            $recipe->setTitle($title);
            $recipe->setPreparationTime($preparationTime);
            $recipe->setCookingTime($cookingTime);
            $recipe->setRestTime($restTime);
            $recipe->setHowManyPeople($howManyPeople);
            $recipe->setStep($step);
            $recipe->setIng($ing);
            $recipe->setVegan($vegan);
            $recipe->setCategorie($category);
            $recipe->setPSeudo($this->session->get('pseudo'));
            // On crée sauvegarde dans la BDD
            $recipe->create();
            // On envoie un message
            $this->session->set('addRecipe', 
            '<div id=session>
                <div id="session2">
                    <p id="successAdd" class="sessionP">Votre recette a bien été crée.</p>
                    <a id="cross"><i class="fas fa-times-circle"></i></a>
                </div>
            </div>') ;
            // On renvoie l'utilisateur sur la page sur la page de ses recette
            header("Location: /recipe/myRecipe");
        };
        // Création du formulaire d'ajout de recette
        $addForm = new Form;
        $addForm->beginForm('POST',['enctype'=>'multipart/form-data','id'=>'addForm']);
        $addForm->addInput('text','formTitle',['placeholder'=>'Titre *','id'=>'formTitle','class'=>"d-none"]);
        $addForm->addInput('number','formPreparationTime',['placeholder'=>'Temps de préparation *','id'=>'formPreparationTime','class'=>"d-none"]);
        $addForm->addInput('number','formCookingTime',['placeholder'=>'Temps de cuisson','id'=>'formCookingTime','class'=>"d-none"]);
        $addForm->addInput('number','formRestTime',['placeholder'=>'Temps de repos','id'=>'formRestTime','class'=>"d-none"]);
        $addForm->addInput('number','formHowManyPeople',['placeholder'=>'Pour combien de personnes *','id'=>'formHowManyPeople','class'=>"d-none"]);
        $addForm->addLabel('formVegan','Est-ce que votre recette est vegan ? *',['id'=>'formVeganLabel','class'=>"d-none"]);
        $addForm->addSelect('formVegan',['oui'=>'oui','non'=>'non'],['id'=>'formVegan','class'=>"d-none"]);
        $addForm->addLabel('formCategorie','Selectionner la catégorie de votre recette *',['id'=>'formCategorieLabel','class'=>"d-none"]);
        $addForm->addSelect('formCategorie',['Apéritif'=>'Apéritif','Entrée'=>'Entrée','Plat'=>'Plat','Dessert'=>'Dessert'],['id'=>'formCategorie','class'=>"d-none"]);
        $addForm->addTextarea('formStep','',['id'=>'formStep','class'=>"d-none"]);
        $addForm->addTextarea('formIng','',['id'=>'formIng','class'=>"d-none"]);
        $addForm->addI('formPicture','Voulez vous ajouter une photo à votre recette ?');
        $addForm->addInput('file','formPicture',['accept'=>'.jpg,.JPG,.jpeg,.JPEG,.png,.PNG,.gif,.GIF','id'=>'formPicture','class'=>"d-none"]);
        $addForm->addButton('Valider',['id'=>'addFormButton','class'=>'site-btn']);
        $addForm->endForm();
        // On renvoie les données dans la vue addRecipe
        $this->renderFront('recipe/add',['addForm' => $addForm->create()]); 
    }
    // Méthode qui permet de supprimer une recette et ses commentaires
    public function delete($id){
        // On instancie une recette
        $newRecipe = new RecipeModel;
        // On récupère les données
        $data = $newRecipe->findById($id);
        // On hydrate l'objet
        $recipe = $newRecipe->hydrate($data);
        // On vérifie que l'utilisateur est l'auteur de cette recette
        if ($recipe->userId() === $this->session->get('id')){
            // On supprime la recette ainsi que tous les commentaires liés à cette recette
            $recipe->deleteRecipe($recipe->id());
            // On renvoie l'utilisateur sur la page sur la page de ses recette
            header("Location: /recipe/myrecipe");
        // Sinon
        } else {
            // Sinon on renvoie l'utilisateur sur la page d'accueil avec un message d'erreur
            $this->session->set('notAllowed', 
                '<div id=session>
                    <div id="session2">
                        <p class="sessionP">Vous n\'avez les droits pour supprimer cette recette.</p>
                        <a id="cross"><i class="fas fa-times-circle"></i></a>
                    </div>
                </div>') ;
            // On renvoie l'utilisateur sur la page sur la page de ses recette
            header("Location: /");
        }
    }
}