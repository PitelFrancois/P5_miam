<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="header">
        <h2>RECETTES</h2>
    </div>
    <div class="card">
        <div class="body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>UserId</th>
                    <th>Titre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($recipes as $recipe): ?>
                    <tr>
                        <th><?=$recipe['id'];?></th>
                        <th><?=$recipe['userId'];?></th>
                        <th><a target="_blank" href="/recipe/read/<?=$recipe['id'];?>"><?=$recipe['title'];?></a></th>
                        <th>
                            <a onclick="return confirm('Êtes-vous sur de vouloir supprimer cette recette ainsi que ses commentaires et ses ingédients ?')" href="/dashboard/deleteRecipe/<?=$recipe['id'];?>">
                                <i style="color:red;" class="far fa-trash-alt"></i>
                            </a>
                            <a class="ml-2" href="/dashboard/updateRecipeView/<?=$recipe['id'];?>">
                                <i class="far fa-edit"></i>
                            </a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
