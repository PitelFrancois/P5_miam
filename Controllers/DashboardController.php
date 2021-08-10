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
}