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

    public function getId(): int{return $this->id;}
    public function getUsername(): string{return $this->username;}
    public function getPassword(): string{return $this->password;}
    public function getEmail(): string{return $this->email;}

    public function setId(int $id): void{$this->id = $id;}
    public function setUsername(string $username): void{$this->username = $username;}
    public function setPassword(string $password): void{$this->password = $password;}
    public function setEmail(string $email): void{$this->email = $email;}

}
