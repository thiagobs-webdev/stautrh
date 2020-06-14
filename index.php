<?php
ob_start();

require __DIR__ . "/libs/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use StautRH\Core\Session;

$session = new Session();
$router = new Router(url(), ":");

/**
 * WEB ROUTES
 */
$router->namespace("StautRH\App\Controllers\Web");
$router->group(null);
$router->get("/", "Web:home", "web.home");

//auth
$router->group(null);
$router->get("/entrar", "Web:login", "web.login");
$router->post("/entrar", "Web:login", "web.do-login");
$router->get("/cadastrar", "Web:register", "web.register");
$router->post("/cadastrar", "Web:register", "web.register");


/**
 * APP
 */
$router->namespace("StautRH\App\Controllers\App");
$router->group("/app");
$router->get("/", "App:home", "app.home");
$router->get("/perfil", "App:profile", "app.profile");
$router->get("/perfil/editar", "App:profileFormEdit", "app.profile_form_edit");
$router->post("/profile/update", "App:profileUpdate", "app.profile_update");
$router->delete("/account/delete", "App:accountDelete", "app.account_delete");
$router->get("/sair", "App:logout", "app.logout");



/**
 * ERROR ROUTES
 */
$router->group("/ops");
$router->get("/{errcode}", "Web:error");

/**
 * ROUTE
 */
$router->dispatch();

/**
 * 
 * ERROR REDIRECT
 */
if ($router->error()) {
    $router->redirect("/ops/{$router->error()}");
}

ob_end_flush();