<?php

namespace StautRH\App\Controllers\App;

use StautRH\Core\Controller;
use StautRH\Core\Session;
use StautRH\Core\View;
use StautRH\Models\Auth;
use StautRH\Models\User;

/**
 * Class App
 * @package StautRH\App
 */
class App extends Controller
{
    /** @var User */
    private $user;

    /**
     * App constructor.
     */
    public function __construct($router)
    {
        parent::__construct(__DIR__ . "/../../../../templates/" . CONF_VIEW_APP . "/", $router);

        if (!$this->user = Auth::user()) {
            $this->message->warning("Efetue login para acessar o APP.")->flash();
            redirect("/entrar");
            // $router->route("web.login");
        }
    }

    /**
     * APP HOME
     */
    public function home(): void
    {
        $head = $this->seo->render(
            "Olá {$this->user->first_name}. Bem-vindo? - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("widgets/home", [
            "head"=> $head,
            "user" => $this->user
        ]);
    }
   
    /**
     * Undocumented function
     *
     * @return void
     */
    public function profile(): void
    {
        $head = $this->seo->render(
            "Meu perfil - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("widgets/user/home", [
            "head" => $head,
            "profile" => "profile",
            "user" => $this->user
        ]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function profileFormEdit(): void
    {
        $head = $this->seo->render(
            "Editar Meu perfil - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("widgets/user/home", [
            "head" => $head,
            "edit" => "edit",
            "user" => $this->user
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function profileUpdate(?array $data): void
    {
            $user = (new User())->findById($this->user->id);
            $user->first_name = $data["first_name"];
            $user->last_name = $data["last_name"];

            if (!empty($data["password"])) {
                // if (empty($data["password_re"]) || $data["password"] != $data["password_re"]) {
                //     $json["message"] = $this->message->warning("Para alterar sua senha, informa e repita a nova senha!")->render();
                //     echo json_encode($json);
                //     return;
                // }

                $user->password = $data["password"];
            }

            if (!$user->save()) {
                $json["message"] = $user->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Pronto {$this->user->first_name}. Seus dados foram atualizados com sucesso!")->flash();
            $json["redirect"] = $this->router->route("app.profile");
            echo json_encode($json);
            return;
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function accountDelete(?array $data): void
    {
            $user = (new User())->findById($this->user->id);

            if (!$user->destroy()) {
                $json["message"] = $user->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Sua Conta foi Excluída com sucesso {$this->user->first_name} :( -- Queremos você de Volda \o/!")->flash();
            $json["redirect"] = $this->router->route("web.register");
            echo json_encode($json);
            return;
    }

    /**
     * APP LOGOUT
     */
    public function logout(): void
    {
        $this->message->info("Você saiu com sucesso " . Auth::user()->first_name . ". Volte logo :)")->flash();

        Auth::logout();
        redirect("/entrar");
    }
}