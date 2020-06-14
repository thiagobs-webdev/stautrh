<?php

namespace StautRH\App\StautrhApi;

use StautRH\Core\Controller;
use StautRH\Models\Auth;
use StautRH\Models\User;

/**
 * Class Front 
 * @package StautRH\App\StautrhApi
 */
class Front extends StautrhApi
{
    /**
     * StautrhApi constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct("/");
        
    }

    /**
     * @param array $data
     */
    public function storeUser(array $data): void
    {
        if (in_array("", $data)) {
            $this->call(
                400,
                "data_empty",
                "Favor Informe seus dados para criar sua conta."
            )->back();
            return;
        }

        $auth = new Auth();
        $user = new User();
        $user->bootstrap(
            filter_var($data["first_name"], FILTER_SANITIZE_STRIPPED),
            filter_var($data["last_name"], FILTER_SANITIZE_STRIPPED),
            filter_var($data["email"], FILTER_SANITIZE_STRIPPED),
            filter_var($data["password"], FILTER_SANITIZE_STRIPPED)
        );

        if ($auth->register($user)) {
            $this->call(
                200,
                "success",
                "Cadastro realizado com Sucesso. Faça Login para entrar!",
                "success"
            )->back();
        } else {
            $this->call(
                404,
                "error",
                $auth->message()->getText()
            )->back();
        }
        return;
    }

    /**
     * @param array $data
     */
    public function login(array $data): void
    {
        if (empty($data['email']) || empty($data['password'])) {
            $this->call(
                400,
                "data_empty",
                "Favor Informe Email e Senha para fazer Login."
            )->back();
            return;
        }

        $auth = new Auth();
        $login = $auth->login($data['email'], $data['password']);

        if ($login) {
            $user = Auth::user()->data();
            unset($user->password);

            $response["user"] = $user;
            // $response["user"]->balance = (new AppInvoice())->balance($this->user);
            $this->back($response);
        } else {
            $this->call(
                404,
                "error",
                $auth->message()->getText()
                // "Erroooooo"
            )->back();
        }

        return;
    }

}

