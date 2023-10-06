<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Zapisz się na newsletter</title>
</head>

<body>
    <h1>Zapisz się na newsletter</h1>
    <form method="post" action="save.php">
        <label>
            Podaj adres e-mail<br /><br />
            <input type="email" name="email" value="<?= isset($_SESSION['wrong_email']) ? $_SESSION['wrong_email'] : '' ?>">
            <?php if (isset($_SESSION['wrong_email'])) {
                echo "<br/><div style='color: red'>Podaj poprawny adres e-mail</div>";
                unset($_SESSION['wrong_email']);
            } ?><br /><br />
        </label>
        <input type="submit" value="Zapisz się">
    </form>

</body>

</html>