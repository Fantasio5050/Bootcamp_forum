<?php
include 'config/database.php';
$pdo = $_SESSION['pdo'];
function logout()
{
    session_destroy();
    header('Location: index.php?action=topic&d=true');
}

logout();
?>