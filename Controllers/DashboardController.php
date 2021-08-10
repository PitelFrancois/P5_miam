<?php

// Namespace
namespace Francois\Controllers;

// Use
use Francois\App\Session;
use Francois\App\Form;
use Francois\Models\UserModel;
use Francois\Models\RecipeModel;
use Francois\Models\CommentModel;
use Francois\Models\IngredientModel;

// Déclaration de la classe
class DashboardController extends Controller {

    public function __construct() {
        $this->session = new Session($this->session);
    }
    // Méthode qui renvoie l'admin sur la vue index
    public function index() {
        $user = new UserModel;
        $recipe = new RecipeModel;
        $comment = new CommentModel;
        $usersCount = $user->userCount();
        $recipeCount = $recipe->recipeCountAll();
        $commentCount = $comment->commentCountAll();
        $commentNotPublishCount = $comment->commentNotPublishCount();
        $commentSignalCount = $comment->commentSignalCount();
        $this->renderBack('dashboard/index',[
            'usersCount'=>$usersCount,
            'recipeCount'=>$recipeCount,
            'commentCount'=>$commentCount,
            'commentNotPublishCount'=>$commentNotPublishCount,
            'commentSignalCount'=>$commentSignalCount
        ]);
    }

    /*********************************************/
    /**                  USERS                  **/
    /*********************************************/

    // Méthode qui renvoie l'admin sur la vue user
    public function user() {
        $user = new UserModel;
        $users = $user->findAll();
        $this->renderBack('dashboard/user',['users'=>$users]);
    }
    // Méthode qui permet à l'admin de supprimer un utilisateur ainsi que ses recettes,ses commentaires et ses ingrédients
    public function deleteUser($id){
        $user = new UserModel;
        $user->deleteUser($id);
        header("Location: /dashboard/user");
    }
    // Méthode qui renvoie l'admin sur la vue updateUser
    public function updateUserView($id){
        $user = new UserModel;
        $users = $user->findById($id);
        $this->renderBack('dashboard/updateUserView',[
            'users'=>$users
        ]);
    }
    // Méthode qui permet à l'admin de modifier un utilisateur
    public function updateUser($id){
        $newMail = $_POST['mailUpdate'];
        $newRole = $_POST['role'];
        $newConfirm = $_POST['confirm'];
        $user = new UserModel;
        $user->updateUser($id,$newMail,$newRole,$newConfirm);
        header("Location: /dashboard/user");
    }

    /*********************************************/
    /**                 RECIPES                 **/
    /*********************************************/
    
    // Méthode qui renvoie l'admin sur la vue recipe
    public function recipe() {
        $recipe = new RecipeModel;
        $recipes = $recipe->findAll();
        $this->renderBack('dashboard/recipe',['recipes'=>$recipes]);
    }
    // Méthode qui renvoie l'admin sur la vue updateRecipe
    public function updateRecipeView($id){
        $recipe = new RecipeModel;
        $recipes = $recipe->findById($id);
        $this->renderBack('dashboard/updateRecipeView',[
            'recipes'=>$recipes
        ]);
    }
    // Méthode qui permet à l'admin de modifier une recette
    public function updateRecipe($id){
        $newUserId = $_POST['userIdUpdate'];
        $newTitle = $_POST['titleUpdate'];
        $newPreparationTime = $_POST['preparationTimeUpdate'];
        $newCookingTime = $_POST['cookingTimeUpdate'];
        $newRestTime = $_POST['restTimeUpdate'];
        $newHowManyPeople = $_POST['howManyPeopleUpdate'];
        $newStep = $_POST['stepUpdate'];
        $newIng = $_POST['ingUpdate'];
        $newPicture = $_POST['pictureUpdate'];
        $newCategorie = $_POST['categorieUpdate'];
        $newPseudo = $_POST['pseudoUpdate'];
        $recipe = new RecipeModel;
        $recipe->updateRecipe($newUserId,$newTitle,$newPreparationTime,$newCookingTime,$newRestTime,$newHowManyPeople,$newStep,$newIng,$newPicture,$newCategorie,$newPseudo,$id);
        header("Location: /dashboard/recipe");
    }
    // Méthode qui permet à l'admin de supprimer une recette ainsi que ses commetaires et ses ingrédients
    public function deleteRecipe($id){
        $recipe = new RecipeModel;
        $recipe->deleteRecipe($id);
        header("Location: /dashboard/recipe");
    }
    /*********************************************/
    /**                COMMENTS                 **/
    /*********************************************/
    
    // Méthode qui renvoie l'admin sur la vue comment
    public function comment() {
        $comment = new CommentModel;
        $comments = $comment->findAllComment();
        $signalComments = $comment->findAllSignal();
        $notPublishComments = $comment->notPublishComments();
        $this->renderBack('dashboard/comment',
            ['comments'=>$comments,
            'signalComments'=>$signalComments,
            'notPublishComments'=>$notPublishComments]);
    }
    // Méthode qui permet à l'admin de valider la publication d'un commentaire
    public function validePublishComment($id){
        $comment = new CommentModel;
        $comment->validePublishComment($id);
        header("Location: /dashboard/comment");
    }
    // Méthode qui permet à l'admin de valider un commentaire signalé
    public function valideSignalComment($id){
        $comment = new CommentModel;
        $comment->valideSignalComment($id);
        header("Location: /dashboard/comment");
    }
    // Méthode qui permet à l'admin de supprimer un commentaire
    public function deleteComment($id){
        $comment = new CommentModel;
        $comment->deleteComment($id);
        header("Location: /dashboard/comment");
    }
}