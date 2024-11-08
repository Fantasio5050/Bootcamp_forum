<?php
include 'config/database.php';
$view = 'app/Views/LoginView.php';
include 'app/Models/User.php';


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    ConnectUser($email, $password);
}

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
        $req = "SELECT * FROM users WHERE email = :email";
        $stmt = $_SESSION['pdo']->prepare($req);
        $stmt->bindParam('email', $email);
        $stmt->execute();
        $results = $stmt->fetchAll();
        foreach ($results as $result){
            if (password_verify($password, $result['password'])) {
                $user = new User($result['user_id'], $result['username'], $result['password'], $result['email']);
                $_SESSION['user'] = $user;

                header('Location:index.php?action=topic');
            }
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

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