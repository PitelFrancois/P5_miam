<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="header">
        <h2>UTILISATEURS</h2>
    </div>
    <div class="card">
        <div class="body table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mail</th>
                    <th>Role</th>
                    <th>Confirmation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <th><?=$user['id'];?></th>
                        <th><?=$user['mail'];?></th>
                        <?php if ($user['role'] == 1 ) { ?>
                            <th>Utilisateur</th>
                        <?php } elseif ($user['role'] == 2 ) { ?>
                            <th>Admin</th>
                            <?php } ?> 
                            <th><?=$user['confirm'];?></th>
                            <?php if ($user['role'] == 1 ) { ?>   
                        <th>
                            <a onclick="return confirm('Supprimer cette utilisateur supprimera également ses recettes,ses commentaires ainsi que c\'est ingrédients !')" href="/dashboard/deleteUser/<?=$user['id'];?>">
                                <i style="color:red;" class="far fa-trash-alt"></i>
                            </a>
                            <a style="margin-left:6px;" href="/dashboard/updateUserView/<?=$user['id'];?>">
                                <i class="far fa-edit"></i>
                            </a>
                        </th>
                        <?php }; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
