<div class="text-right">
    <a href="<?= $router->route("app.profile_form_edit") ?>" class="btn btn-sm btn-warning" title="Editar">
        <i class="fas fa-user-edit"></i> Editar
    </a>

    <!-- Delete Account-->
    <button type="button" class="btn btn-sm btn-danger js_modal_btn" title="Excluir"
    data-toggle="modal"
    data-action="<?= $router->route("app.account_delete"); ?>"
    data-confirm="ATENÇÃO: Tem certeza que deseja excluir sua Conta?"
    data-id="<?= $user->id ?>">        
        <i class="fas fa-trash"></i> Excluir Conta
    </button>
</div>
<dl class="row">
    <dt class="col-sm-3">Nome</dt>
    <dd class="col-sm-9"><?= $user->fullName() ?></dd>

    <dt class="col-sm-3">Email</dt>
    <dd class="col-sm-9"><?= $user->email ?></dd>
</dl>