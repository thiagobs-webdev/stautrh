<?php

namespace StautRH\Models;

use StautRH\Core\Database\Model;

/**
 * StautRH | Class User Active Record Pattern
 *
 * @author Thiago Bomfim <dev@thiagobs.me>
 * @package StautRH\Models
 */
class Drink extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("drinks", ["id"], ["user_id", "amount_ml"]);
    }


    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Usuário e Mililitros são obrigatórios");
            return false;
        }

        /** Drink Update */
        if (!empty($this->id)) {
            $drinkId = $this->id;
            $this->update($this->safe(), "id = :id", "id={$drinkId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Drink Create */
        if (empty($this->id)) {
            $drinkId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($drinkId))->data();
        return true;
    }
}
