<?php

session_start();

if (isset($_SESSION['user'])) {
    header('Location: index.php');
}

$errors = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = filter_var(strtolower($_POST['username']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=warehouse', 'root', '');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $statement = $conexion->prepare('SELECT * FROM users WHERE username= :username AND password = :password');

    $statement->execute(array(':username' => $username, ':password' => $password));

    $result = $statement->fetch();

    if ($result !== false) {
        $_SESSION['user'] = $username;

        header('Location: index.php');
    } else {
        $errors .= '<li>Incorrect info</li>';
    }
}

require './views/login.view.php';
