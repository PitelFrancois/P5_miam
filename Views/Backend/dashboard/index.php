<div class="block-header">
    <h2>DASHBOARD</h2>
</div>
<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <a href="/dashboard/user">     
                <div class="icon">
                    <i class="material-icons">person_add</i>
                </div>
            </a> 
            <div class="content">
                <div class="text">Utilisateurs</div>
                <div class="number count-to" data-from="0" data-to="<?= $usersCount; ?>" data-speed="1000" data-fresh-interval="20"><?= $usersCount; ?></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <a href="/dashboard/recipe">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
            </a>
            <div class="content">
                <div class="text">Recettes</div>
                <div class="number count-to" data-from="0" data-to="<?=$recipeCount;?>" data-speed="1000" data-fresh-interval="20"><?=$recipeCount;?></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <a href="/dashboard/comment">
                <div class="icon">
                    <i class="material-icons">forum</i>
                </div>
            </a>     
            <div class="content">
                <div class="text">Commentaires</div>
                <div class="number count-to" data-from="0" data-to="<?=$commentCount;?>" data-speed="1000" data-fresh-interval="20"><?=$commentCount;?></div>
            </div>
        </div>
    </div>
</div>
<!-- Widgets -->
<div class="block-header">
    <h2>Commentaires en attente de validation</h2>
</div>
<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <a href="/dashboard/comment">
                <div class="icon">
                    <i class="material-icons">forum</i>
                </div>
            </a>  
            <div class="content">
                <div class="text">Commentaires</div>
                <div class="number count-to" data-from="0" data-to="<?=$commentNotPublishCount;?>" data-speed="1000" data-fresh-interval="20"><?=$commentNotPublishCount;?></div>
            </div>
        </div>
    </div>
</div>
<div class="block-header">
    <h2>Commentaires signalés</h2>
</div>
<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <a href="/dashboard/comment">
                <div class="icon">
                    <i class="material-icons">forum</i>
                </div>
            </a>  
            <div class="content">
                <div class="text">Commentaires</div>
                <div class="number count-to" data-from="0" data-to="<?=$commentSignalCount;?>" data-speed="1000" data-fresh-interval="20"><?=$commentSignalCount;?></div>
            </div>
        </div>
    </div>
</div>