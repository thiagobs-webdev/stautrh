<?php $v->layout("auth/_auth") ;?>

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4">Criar Cadastro</h3>
            </div>
            
            <div class="card-body">
                <form class="ajax_form" action="<?= $router->route("web.register"); ?>" method="post" autocomplete="off">
                <div class="ajax_response">
                    <?= flash(); ?>
                </div>

                    <?= csrf_input(); ?>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group"><label class="small mb-1" for="inputFirstName">Primeiro Nome</label>
                                <input name="first_name" class="form-control py-4" id="inputFirstName" type="text"
                                    placeholder="Seu primeiro Nome" /></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label class="small mb-1" for="inputLastName">Sobrenome</label>
                            <input name="last_name" class="form-control py-4" id="inputLastName" type="text"
                                    placeholder="Seu Sobrenome" /></div>
                        </div>
                    </div>
                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label>
                        <input name="email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp"
                            placeholder="Seu melhor Email" />
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group"><label class="small mb-1" for="inputPassword">Senha</label>
                            <input name="password" class="form-control py-4" id="inputPassword" type="password"
                                    placeholder="Digite uma Senha" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4 mb-0">
                        <button class="btn btn-primary btn-block" type="submit">Criar Conta</button></div>
                </form>
            </div>
            <div class="card-footer text-center">
                <div class="small"><a href="<?= $router->route("web.login")  ?>">Já Tem uma Conta? Faça Login</a></div>
            </div>
        </div>
    </div>
</div>