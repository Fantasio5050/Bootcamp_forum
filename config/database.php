<?php
$pdo = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
$_SESSION['pdo'] = $pdo;