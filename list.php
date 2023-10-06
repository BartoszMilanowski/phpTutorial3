<?php

session_start();
require_once 'db_connect.php';

if (!isset($_SESSION['logged_id'])) {
    if (!isset($_POST['login'])) {
        header('Location: admin.php');
        exit();
    }

    $login = filter_input(INPUT_POST, 'login');
    $password = filter_input(INPUT_POST, 'password');

    $loginQuery = $db->prepare('SELECT * FROM admins WHERE login = :login');
    $loginQuery->bindValue(':login', $login);
    $loginQuery->execute();
    $user = $loginQuery->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['user_err'] = $login;
        header('Location: admin.php');
        exit();
    }

    $_SESSION['logged_id'] = $user['id'];
    unset($_SESSION['user_err']);
}

$usersQuery = $db->query('SELECT * FROM users');
$users = $usersQuery->fetchAll();

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Lista użytkowników</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th colspan="2">Liczba subskrybentów: <?= $usersQuery->rowCount() ?></th>
            </tr>
            <tr>
                <th>ID</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                echo "<tr><td>{$user['id']}</td><td>{$user['email']}</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <p><a href='logout.php'>Wyloguj</a></p>
</body>

</html>