<?php

namespace StautRH\App\StautrhApi;

use StautRH\Models\User;
use StautRH\Models\Drink;


/**
 * Class Users
 * @package StautRH\App\StautrhApi
 */
class Users extends App
{
    /**
     * Users constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * list user data
     */
    public function index(array $data): void
    {
        if (empty($data["user_id"])) {
            $this->call(
                400,
                "data_empty",
                "Favor Informe o ID."
            )->back();
            return;
        }

        if ($data["user_id"] != $this->user->id) {
            $this->call(
                400,
                "data_error",
                "ID diferente."
            )->back();
            return;
        }

        // $drinksData = [];
        // $totalMl = 0;
        // foreach ($this->user->drinks() as $drink) {
        //     unset($drink->data()->user_id);
        //     $drinksData[] = $drink->data();
        //     $totalMl += $drink->amount_ml;
        // }

        $user = $this->user->data();
        unset($user->password);
        $user->drinks = $this->drinksArray($this->user->drinks());
        // $user->drinks["total_ml"] = $totalMl;

        $response["user"] = $user;
        $this->back($response);
        return;
    }

    private function drinksArray($data): array
    {
        $drinksData = [];
        $totalMl = 0;
        if (!empty($data)) {
            foreach ($data as $drink) {
                unset($drink->data()->user_id);
                $drinksData[] = $drink->data();
                $totalMl += $drink->amount_ml;
            }
        }
        
        $drinksData["total_ml"] = $totalMl;
        return $drinksData;
    }

    /**
     * list all user data
     */
    public function list(): void
    {
        $users = (new User())->find()->fetch(true);

        $usersData = [];
        foreach ($users as $user) {
            $user->drinks =  $this->drinksArray($user->drinks());
            unset($user->data()->password);
            $user = $user->data();
            $usersData[] = $user;
        }

        $response["users"] = $usersData;
        $this->back($response);
        return;
    }

    /**
     * @param array $data
     */
    public function update(array $data): void
    {
        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        
        if (empty($data["user_id"])) {
            $this->call(
                400,
                "data_empty",
                "Favor Informe o ID."
            )->back();
            return;
        }

        if ($data["user_id"] != $this->user->id) {
            $this->call(
                400,
                "data_error",
                "ID diferente."
            )->back();
            return;
        }

        $this->user->first_name = (!empty($data["first_name"]) ? $data["first_name"] : $this->user->first_name);
        $this->user->last_name = (!empty($data["last_name"]) ? $data["last_name"] : $this->user->last_name);
        $this->user->email = (!empty($data["email"]) ? $data["email"] : $this->user->genre);

        if (!empty($data["password"])) {
            $this->user->password = $data["password"];
        }

        if (!$this->user->save()) {
            $this->call(
                400,
                "invalid_data",
                $this->user->message()->getText()
            )->back();
            return;
        }

        $data["user_id"] = $this->user->id;
        $this->index($data);
    }


    /**
     * @param array $data
     */
    public function delete(array $data): void
    {
        if (empty($data["user_id"]) || !$user_id = filter_var($data["user_id"], FILTER_VALIDATE_INT)) {
            $this->call(
                400,
                "invalid_data",
                "Informe o ID do Usuário que deseja deletar"
            )->back();
            return;
        }

        if ($user_id != $this->user->id) {
            $this->call(
                400,
                "data_error",
                "ID diferente."
            )->back();
            return;
        }


        $first_name = $this->user->first_name;
        $this->user->destroy();
        $this->call(
            200,
            "success",
            "Sua Conta foi Excluída com sucesso {$first_name} :( -- Queremos você de Volda \\o/!",
            "accpeted"
        )->back();
    }

    /**
     * @param array $data
     */
    public function drinkAdd(array $data): void
    {
        if (empty($data["user_id"]) || !$user_id = filter_var($data["user_id"], FILTER_VALIDATE_INT)) {
            $this->call(
                400,
                "invalid_data",
                "Informe o ID do Usuário que deseja Acrescentar Ml de Drink"
            )->back();
            return;
        }

        if ($user_id != $this->user->id) {
            $this->call(
                400,
                "data_error",
                "ID diferente."
            )->back();
            return;
        }

        $drink = new Drink();
        $drink->user_id = $this->user->id;
        $drink->amount_ml = filter_var($data["amount_ml"], FILTER_VALIDATE_INT);
        
        if (!$drink->save()) {
            $this->call(
                400,
                "invalid_data",
                $drink->message()->getText()
            )->back();
            return;
        }

        $data["user_id"] = $this->user->id;
        $this->index($data);
    }

}

