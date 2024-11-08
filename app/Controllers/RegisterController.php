<?php

$view = 'app/Views/RegisterView.php'
class RegisterController{
    function Register()
    {

        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
            $emailCreate = $_POST['email'];
            $passwordCreate = $_POST['password'];
            $usernameCreate = $_POST['username'];

            try {
                $hash = password_hash($passwordCreate, PASSWORD_DEFAULT);
                $req = "INSERT INTO users(username, password, email) VALUES (:username, :password, :email)";
                $STMT = $_SESSION['pdo']->prepare($req);
                $STMT->bindParam(':username', $usernameCreate);
                $STMT->bindParam(':password', $hash);
                $STMT->bindParam(':email', $emailCreate);
                $STMT->execute();
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

}