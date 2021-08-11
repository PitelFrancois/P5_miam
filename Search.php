<?php
    use Francois\Models\Database;
    require_once "./Models/Database.php";
    if (isset($_GET['recipe'])){
        $recipe = $_GET['recipe'];
        $db = new Database;
        $req = $db->request("SELECT * FROM recipes WHERE title LIKE ? LIMIT 10",["%$recipe%"])->fetchAll();  
        foreach ($req as $r){
        ?>
        <a href="/recipe/read/<?= $r['id'];?>"><h2 style="color:white" ><?= $r['title'];?></h2></a>
        <?php    
        }
    }