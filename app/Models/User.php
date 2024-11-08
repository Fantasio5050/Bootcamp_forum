<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $email;

    function __construct($id, $username, $password, $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;

    }

    public function getId(){return $this->id;}
    public function getUsername(){return $this->username;}
    public function getPassword(){return $this->password;}
    public function getEmail(){return $this->email;}

    public function setId($id){$this->id = $id;}
    public function setUsername($username){$this->username = $username;}
    public function setPassword($password){$this->password = $password;}
    public function setEmail($email){$this->email = $email;}



}



?>