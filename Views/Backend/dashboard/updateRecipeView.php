<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Modification de recette</h2>
            </div>
            <div class="body">
                <form action="/dashboard/updateRecipe/<?=$recipes['id'];?>" method="post" >
                    <label for="userIdUpdate">UserId</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="userIdUpdate" class="form-control" value="<?= $recipes['userId'];?>">
                        </div>
                    </div>
                    <label for="titleUpdate">Titre</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="titleUpdate" class="form-control" value="<?= $recipes['title'];?>">
                        </div>
                    </div>
                    <label for="preparationTimeUpdate">Temps de préparation</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="preparationTimeUpdate" class="form-control" value="<?= $recipes['preparationTime'];?>">
                        </div>
                    </div>
                    <label for="cookingTimeUpdate">Temps de Cuisson</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="cookingTimeUpdate" class="form-control" value="<?= $recipes['cookingTime'];?>">
                        </div>
                    </div>
                    <label for="restTimeUpdate">Temps de repos</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="restTimeUpdate" class="form-control" value="<?= $recipes['restTime'];?>">
                        </div>
                    </div>
                    <label for="howManyPeopleUpdate">Temps de repos</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="howManyPeopleUpdate" class="form-control" value="<?= $recipes['howManyPeople'];?>">
                        </div>
                    </div>
                    <label for="stepUpdate"><span class="text-uppercase">é</span>tape</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="stepUpdate" class="form-control"><?= $recipes['step'];?></textarea>
                        </div>
                    </div>
                    <label for="ingUpdate"><span class="text-uppercase">Ingrédient</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="ingUpdate" class="form-control"><?= $recipes['ing'];?></textarea>
                        </div>
                    </div>
                    <label for="pictureUpdate">Photo</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="pictureUpdate" class="form-control" value="<?= $recipes['picture'];?>">  
                        </div>
                    </div>
                    <label for="categorieUpdate">Catégorie</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="categorieUpdate" class="form-control" value="<?= $recipes['categorie'];?>">  
                        </div>
                    </div>
                    <label for="pseudoUpdate">Pseudo</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="pseudoUpdate" class="form-control" value="<?= $recipes['pseudo'];?>">  
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">MODIFIER</button>
                </form>
            </div>
        </div>
    </div>
</div>