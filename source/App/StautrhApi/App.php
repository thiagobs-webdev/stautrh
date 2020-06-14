<?php

namespace StautRH\App\StautrhApi;

use StautRH\Core\Controller;
use StautRH\Models\Auth;

/**
 * Class StautrhApi
 * @package StautRH\App\StautrhApi
 */
class App extends StautrhApi
{
    /** @var \StautRH\Models\User|null */
    protected $user;

    /**
     * StautrhApi constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();

        $auth = $this->auth();
        if (!$auth) {
            exit;
        }
    }
    
    /**
     * @return bool
     */
    private function auth(): bool
    {
        if (empty($this->headers["email"]) || empty($this->headers["password"])) {
            $this->call(
                400,
                "auth_empty",
                "Favor informe seu e-mail e senha"
            )->back();
            return false;
        }

        $auth = new Auth();
        $user = $auth->attempt($this->headers["email"], $this->headers["password"], 1);

        if (!$user) {
            $this->call(
                401,
                "invalid_auth",
                $auth->message()->getText()
            )->back();
            return false;
        }

        $this->user = $user;
        return true;
    }
}

