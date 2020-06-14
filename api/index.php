<?php
ob_start();

require __DIR__ . "/../libs/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;

/**
 * API ROUTES
 * index
 */
$route = new Router(url(), ":");
$route->namespace("StautRH\App\StautrhApi");

// users public
$route->group(null);
$route->post("/users", "Front:storeUser"); // create user
$route->post("/login", "Front:login"); // login

//users App
$route->group("/users");
$route->get("/{user_id}", "Users:index"); // obter seu usuário
$route->put("/{user_id}", "Users:update"); // Editar seu usuário
$route->delete("/{user_id}", "Users:delete"); // Apagar seu usuário
$route->get("/", "Users:list");           // Lista de Usuários
$route->post("/{user_id}/drink", "Users:drinkAdd");           // Add Ml de Drink


/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();

