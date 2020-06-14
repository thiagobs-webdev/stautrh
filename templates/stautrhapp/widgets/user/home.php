<?php $v->layout("_app"); ?>

<div class="container-fluid">
    <ol class="breadcrumb mt-2 mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Perfil</li>
    </ol>

    <div class="card">
        <?= flash(); ?>
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Perfil</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <?php if(!empty($edit)) : ?>
                <?php $v->insert("widgets/user/_edit") ; ?>
            <?php endif ; ?>

            <?php if(!empty($profile)) : ?>
                <?php $v->insert("widgets/user/_profile") ; ?>
            <?php endif ; ?>
        </div>
    </div>
</div>

<?php $v->insert("modals/delete") ; ?>