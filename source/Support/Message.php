<?php

namespace StautRH\Support;

use StautRH\Core\Session;

/**
 * StautRH | Class Message
 *
 * @author Thiago Bomfim <dev@thiagobs.me>
 * @package StautRH\Support
 */
class Message
{
    /** @var string */
    private $text;

    /** @var string */
    private $type;

    /** @var string */
    private $icon;

    /** @var string */
    private $before;

    /** @var string */
    private $after;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }


    /**
     * @return string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->before . $this->text . $this->after;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $text
     * @return Message
     */
    public function before(string $text): Message
    {
        $this->before = $text;
        return $this;
    }

    /**
     * @param string $text
     * @return Message
     */
    public function after(string $text): Message
    {
        $this->after = $text;
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function info(string $message): Message
    {
        $this->type = "info";
        $this->icon = "fas fa-info-circle";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function success(string $message): Message
    {
        $this->type = "success";
        $this->icon = "far fa-check-circle";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function warning(string $message): Message
    {
        $this->type = "warning";
        $this->icon = "fas fa-exclamation-triangle";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message
     * @return Message
     */
    public function error(string $message): Message
    {
        $this->type = "danger";
        $this->icon = "fas fa-times";
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return "<div class='alert alert-{$this->getType()} alert-dismissible fade show' role='alert'>
                    <i class='{$this->getIcon()}'></i> {$this->getText()}
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
    }

    /**
     * Set flash Session Key
     */
    public function flash(): void
    {
        (new Session())->set("flash", $this);
    }

    /**
     * @param string $message
     * @return string
     */
    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_STRIPPED);
    }
}