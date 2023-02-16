<?php

class User{
    private $id;
    private $login;
    private $password;
    private $email;
    private $rank;

    public function __construct(string $login, string $password, string $email, int $rank, int $id = 0)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->rank = $rank;
    }

    public function getID(){
        return $this->id;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getRank(){
        return $this->rank;
    }
}

?>