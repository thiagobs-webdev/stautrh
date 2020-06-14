<form class="ajax_form" action="<?= $router->route("app.profile_update"); ?>" method="post" autocomplete="off">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="first_name">Primeiro Nome</label>
            <input name="first_name" type="text" class="form-control" id="first_name" value="<?= $user->first_name ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Sobrenome</label>
            <input name="last_name" type="text" class="form-control" id="last_name" value="<?= $user->last_name ?>">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input name="email" type="email" class="form-control" id="inputEmail4" value="<?= $user->email ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input name="password" type="password" class="form-control" id="inputPassword4">
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>