<?php

// Namespace
namespace Francois\Controllers;

// Use
use Francois\Models\RecipeModel;

// Déclaration de la classe
class MainController extends Controller {

    // Méthode qui renvoie sur la page d'accueil
    public function index() {
        // On instancie un nouvelle objet
        $recipe = new RecipeModel;
        $recipeAperitif = new RecipeModel;
        $recipeEntrance = new RecipeModel;
        $recipeMain = new RecipeModel;
        $recipeDessert = new RecipeModel;
        // On récupère le nombre de chaque recette suivant la catégorie
        $countAperitif = $recipe->recipeCount("Apéritif");
        $countEntrance = $recipe->recipeCount("Entrée");
        $countMain = $recipe->recipeCount("Plat");
        $countDessert = $recipe->recipeCount("Dessert");
        // On récupère les dernières recettes suivant leurs catégorie
        $lastAperitifData = $recipeAperitif->lastRecipe("Apéritif");
        $lastEntranceData = $recipeEntrance->lastRecipe("Entrée");
        $lastMainData = $recipeMain->lastRecipe("Plat");
        $lastDessertData = $recipeDessert->lastRecipe("Dessert");
        // On hydrate les objets
        $lastAperitif = $recipeAperitif->hydrate($lastAperitifData);
        $lastEntrance = $recipeEntrance->hydrate($lastEntranceData);
        $lastMain = $recipeMain->hydrate($lastMainData);
        $lastDessert = $recipeDessert->hydrate($lastDessertData);
        // On renvoie les données sur le front
        $this->renderFront('main/index',[
            'countAperitif'=>$countAperitif,
            'countEntrance'=>$countEntrance,
            'countMain'=>$countMain,
            'countDessert'=>$countDessert,
            'lastAperitif'=>$lastAperitif,
            'lastEntrance'=>$lastEntrance,
            'lastMain'=>$lastMain,
            'lastDessert'=>$lastDessert,
        ]);
    }
}