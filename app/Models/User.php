<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $PDO;

    function __construct()
    {
        $args_num = func_num_args();

        switch ($args_num)
        {
            case 0:
                $this->PDO = new PDO($_SESSION['driver'], $_SESSION['login'], $_SESSION['password']);
                break;
            case 5:
                $args_list = func_get_args();
                $this->id = $args_list[0];
                $this->username = $args_list[1];
                $this->password = $args_list[2];
                $this->email = $args_list[3];
                $this->PDO = new PDO($_SESSION['driver'], $_SESSION['login'], $_SESSION['password']);
                break;
        }
    }

    public function getId(){return $this->id;}
    public function getUsername(){return $this->username;}
    public function getPassword(){return $this->password;}
    public function getEmail(){return $this->email;}

    public function setId($id){$this->id = $id;}
    public function setUsername($username){$this->username = $username;}
    public function setPassword($password){$this->password = $password;}
    public function setEmail($email){$this->email = $email;}



    function Create()
    {
        $req = "INSERT INTO users(user_id, username, password, email) VALUES (:id, :username, :password; :email)";
        $STMT= $this->PDO->prepare($req);
        $STMT->bindParam(':id', $this->id);
        $STMT->bindParam(':username', $this->username);
        $STMT->bindParam(':password', $this->password);
        $STMT->bindParam(':email', $this->email);       
        $STMT->execute();
    }

    function Retrieve($id)
    {
        $req = "SELECT * FROM Album WHERE user_id = :id";
        $stmt= $this->PDO->prepare($req);
        $stmt->bindParam('id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    function Update()
    {
        $req = "UPDATE users SET username = :username, password = :password, email = :email WHERE user_id = :id";
        $STMT= $this->PDO->prepare($req);
        $STMT->bindParam(':id', $this->id);
        $STMT->bindParam(':username', $this->username);
        $STMT->bindParam(':password', $this->password);
        $STMT->bindParam(':email', $this->email);       
        $STMT->execute();
    }

    function Delete($id)
    {
        $req = "DELETE FROM users WHERE user_id = :id";
        $STMT = $this->PDO->prepare($req);
        $STMT->bindParam(':id', $id);
        $STMT->execute();
    }

    function FindAll(){
        $req = "SELECT * FROM users order by username";
        $stmt= $this->PDO->prepare($req);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}



?>
