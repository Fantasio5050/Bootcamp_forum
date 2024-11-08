<?php
include 'config/database.php';
$view = 'app/Views/RegisterView.php';

// Initialize variables
$passwordCreate = "";
$usernameCreate = "";
$emailCreate = "";


// Check if form data has been submitted
if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
    $emailCreate = $_POST['email'];
    $passwordCreate = $_POST['password'];
    $usernameCreate = $_POST['username'];
    Register($usernameCreate, $passwordCreate, $emailCreate);
}

function Register($username, $password, $email)
{
    try {
        // Hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL statement
        $req = "INSERT INTO users(username, password, email) VALUES (:username, :password, :email)";
        $STMT = $_SESSION['pdo']->prepare($req);
        $STMT->bindParam(':username', $username);
        $STMT->bindParam(':password', $hash);
        $STMT->bindParam(':email', $email);
        $STMT->execute();
        header('Location:index.php?action=User');
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
