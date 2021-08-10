<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Modification d'utilisateur</h2>
            </div>
            <div class="body">
                <form action="/dashboard/updateUser/<?=$users['id'];?>" method="post" >
                    <label for="mailUpdate">Mail</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="mailUpdate" class="form-control" value="<?= $users['mail'];?>">
                        </div>
                    </div>
                    <label for="role">Role</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="role" class="form-control" value="<?= $users['role'];?>">
                        </div>
                    </div>
                    <label for="confirm">Comfirmation</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" name="confirm" class="form-control" value="<?= $users['confirm'];?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">MODIFIER</button>
                </form>
            </div>
        </div>
    </div>
</div>