<?php

namespace StautRH\App\StautrhApi;

use StautRH\Core\Controller;
use StautRH\Models\Auth;

/**
 * Class StautrhApi
 * @package StautRH\App\StautrhApi
 */
class StautrhApi extends Controller
{
    /** @var array|false */
    protected $headers;

    /** @var array|null */
    protected $response;

    /**
     * StautrhApi constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct("/");

        header('Content-Type: application/json; charset=UTF-8');
        $this->headers = getallheaders();
    }

    /**
     * @param int $code
     * @param string|null $type
     * @param string|null $message
     * @param string $rule
     * @return StautrhApi
     */
    protected function call(int $code, string $type = null, string $message = null, string $rule = "errors"): StautrhApi
    {
        http_response_code($code);

        if (!empty($type)) {
            $this->response = [
                $rule => [
                    "type" => $type,
                    "message" => (!empty($message) ? $message : null)
                ]
            ];
        }
        return $this;
    }

    /**
     * @param array|null $response
     * @return StautrhApi
     */
    protected function back(array $response = null): StautrhApi
    {
        if (!empty($response)) {
            $this->response = (!empty($this->response) ? array_merge($this->response, $response) : $response);
        }

        echo json_encode($this->response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        return $this;
    }
  
}

