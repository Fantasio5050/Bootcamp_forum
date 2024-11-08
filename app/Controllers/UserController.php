<?php
$view = 'app/Views/loginView.php';
include 'app/Models/User.php';


function Retrieve($id)
{
    $req = "SELECT * FROM users WHERE user_id = :id";
    $stmt = $_SESSION['pdo']->prepare($req);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function ConnectUser($email, $password)
{
    try {
        $req = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $_SESSION['pdo']->prepare($req);
        $stmt->bindParam('email', $email);
        $stmt->bindParam('password', $password);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if (password_verify($password, $result['password'])) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
        $user = new User($result['user_id'], $result['username'], $result['password'], $result['email']);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $_SESSION['user'] = $user;
}

function Update()
{
    $req = "UPDATE users SET username = :username, password = :password, email = :email WHERE user_id = :id";
    $STMT = $_SESSION['pdo']->prepare($req);
    $STMT->bindParam(':id', $_SESSION['user']->getId());
    $STMT->bindParam(':username', $_SESSION['user']->getUsername());
    $STMT->bindParam(':password', $_SESSION['user']->getPassword());
    $STMT->bindParam(':email', $_SESSION['user']->getEmail());
    $STMT->execute();
}

function Delete($id)
{
    $req = "DELETE FROM users WHERE user_id = :id";
    $STMT = $_SESSION['pdo']->prepare($req);
    $STMT->bindParam(':id', $id);
    $STMT->execute();
}

//function FindAll()
//{
//    $req = "SELECT * FROM users order by username";
//    $stmt = $_SESSION['pdo']->prepare($req);
//    $stmt->execute();
//    $result = $stmt->fetchAll();
//    return $result;
//}