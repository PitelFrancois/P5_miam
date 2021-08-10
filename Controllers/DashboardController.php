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
}