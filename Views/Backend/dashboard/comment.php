<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="header">
        <h2>COMMENTAIRES SIGNAL<span class="text-uppercase">é</span>S</h2>
    </div>
    <div class="card">
        <div class="body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RecipeId</th>
                        <th>Pseudo</th>
                        <th>Commentaire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($signalComments as $signalComment): ?>
                        <tr>
                            <th><?=$signalComment['id'];?></th>
                            <th><a target="_blank" href="/recipe/read/<?=$signalComment['recipeId'];?>"><?=$signalComment['recipeId'];?></a></th>
                            <th><?=$signalComment['pseudo'];?></th>
                            <th><?=$signalComment['comment'];?></th>
                            <th>
                                <a onclick="return confirm('Êtes-vous sur de vouloir supprimer ce commentaire ?')" href="/dashboard/deleteComment/<?=$signalComment['id'];?>">
                                    <i style="color:red;" class="far fa-trash-alt"></i>
                                </a>
                                <a href="/dashboard/valideSignalComment/<?=$signalComment['id'];?>">
                                    <i style="color:green;margin-left:6px;" class="far fa-check-circle"></i>
                                </a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="header">
        <h2>COMMENTAIRES EN ATTENTE DE VALIDATION</h2>
    </div>
    <div class="card">
        <div class="body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RecipeId</th>
                        <th>Pseudo</th>
                        <th>Commentaire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($notPublishComments as $notPublishComment): ?>
                        <tr>
                            <th><?=$notPublishComment['id'];?></th>
                            <th><a target="_blank" href="/recipe/read/<?=$notPublishComment['recipeId'];?>"><?=$notPublishComment['recipeId'];?></a></th>
                            <th><?=$notPublishComment['pseudo'];?></th>
                            <th><?=$notPublishComment['comment'];?></th>
                            <th>
                                <a onclick="return confirm('Êtes-vous sur de vouloir supprimer ce commentaire ?')" href="/dashboard/deleteComment/<?=$notPublishComment['id'];?>">
                                    <i style="color:red;" class="far fa-trash-alt"></i>
                                </a>
                                <a class="ml-2" href="/dashboard/validePublishComment/<?=$notPublishComment['id'];?>">
                                    <i style="color:green;margin-left:6px;" class="far fa-check-circle"></i>
                                </a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="header">
        <h2>COMMENTAIRES</h2>
    </div>
    <div class="card">
        <div class="body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RecipeId</th>
                        <th>Pseudo</th>
                        <th>Commentaire</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($comments as $comment): ?>
                        <tr>
                            <th><?=$comment['id'];?></th>
                            <th><a target="_blank" href="/recipe/read/<?=$comment['recipeId'];?>"><?=$comment['recipeId'];?></a></th>
                            <th><?=$comment['pseudo'];?></th>
                            <th><?=$comment['comment'];?></th>
                            <th>
                                <a onclick="return confirm('Êtes-vous sur de vouloir supprimer ce commentaire ?')" href="/dashboard/deleteComment/<?=$comment['id'];?>">
                                    <i style="color:red;" class="far fa-trash-alt"></i>
                                </a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>