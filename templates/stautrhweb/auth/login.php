<?php $v->layout("auth/_auth") ;?>

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Login</h3>
            </div>
            <div class="card-body">
                <form name="login" action="<?= $router->route("web.do-login"); ?>" method="post" autocomplete="off">
                <div class="ajax_response">
                    <?= flash(); ?>
                </div>

                    <?= csrf_input(); ?>
                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label>
                    <input name="email" class="form-control py-4" id="inputEmailAddress" type="email"
                            placeholder="Digite seu email" /></div>
                    <div class="form-group"><label class="small mb-1" for="inputPassword">Senha</label>
                    <input name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Digite sua senha" />
                    </div>
                    
                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small"
                            href="password.html">Esqueceu a Senha?</a>
                            <button class="btn btn-primary" type="submit">Entrar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center">
                <div class="small"><a href="<?= url("/cadastrar") ?>">Não tem cadastro? Cadastre-se!</a></div>
            </div>
        </div>
    </div>
</div>