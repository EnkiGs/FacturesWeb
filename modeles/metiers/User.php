<?php

class User  extends Client
{
    private $login;

    /**
     * User constructor.
     * @param $login
     */
    public function __construct($login)
    {
        $this->login = $login;
    }


    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }
}