<?php
session_start();
if(isset($_SESSION['logged_id'])){
    header('Location: list.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Zaloguj</title>
</head>

<body>
    <h1>Admin</h1>
    <form method="post" action="list.php">
        Login: <input type="text" name="login"><br />
        Hasło: <input type="password" name="password"><br />
        <input type="submit" value="Zaloguj">
        <br/><br/>
        <?php
        if(isset($_SESSION['user_err'])){
            echo "<div style='color: red'>Niepoprawny login lub hasło!</div>";
        }
        ?>
    </form>
</body>

</html>