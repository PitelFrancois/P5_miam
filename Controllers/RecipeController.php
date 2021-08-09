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
}