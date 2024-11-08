<?php
$pdo = $_SESSION['pdo'];
class LogoutController
{
    public function logout()
    {
        session_destroy();
        header('Location: /index.php?action=home');
    }

}