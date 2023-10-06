<?php
session_start();


if (!isset($_POST['email'])) {
    header('Location:index.php');
    exit();
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if (empty($email)) {

    $_SESSION['wrong_email'] = $_POST['email'];
    header("Location:index.php");
}

require_once 'db_connect.php';
$query = $db->prepare('INSERT INTO users VALUES (NULL,  :email)');
$query->bindValue(':email', $email, PDO::PARAM_STR);
$query->execute();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dziękujemy!</title>
</head>

<body>
    <h1>Dziękujemy!</h1>
</body>

</html>