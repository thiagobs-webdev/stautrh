<?php

namespace StautRH\Core;

use CoffeeCode\Router\Router;
use StautRH\Support\Message;
use StautRH\Support\Seo;

/**
 * StautRH | Class Controller
 *
 * @author Thiago Bomfim <dev@thiagobs.me>
 * @package StautRH\Core
 */
class Controller
{
    /** @var View */
    protected $view;

    /** @var Seo */
    protected $seo;

    /** @var Message */
    protected $message;

    /**@var Router */
    protected $router;

    /**
    * Undocumented function
    *
    * @param string $pathToViews
    * @param [type] $router
    */
    public function __construct(string $pathToViews = null, ?Router $router = null)
    {
        $this->router = $router;
        $this->view = new View($pathToViews);
        $this->view->engine()->addData(["router" => $this->router]);
        $this->seo = new Seo();
        $this->message = new Message();
    }
    
    /**
     * Message Ajax
     *
     * @param string $param
     * @param array $values
     * @return string
     */
    public function ajaxResponse(string $param, array $values): string
    {
        return json_encode([$param => $values]);
    }
}