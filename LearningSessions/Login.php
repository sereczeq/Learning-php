<?php
session_start()
?>
    <a href="Restricted.php"> Restricted page</a>
    <a href="Allowed.php"> Allowed page</a>
    <form method="post">
        <div>
            <label>
                <input type="text" name="name">
                name
            </label>
        </div>
        <div>
            <label>
                <input type="text" name="password">
                password
            </label>
        </div>
        <input type="submit" value="login" name="login" class="button">
    </form>

<?php

$userPasswords = [
    "admin" => "admin",
    "a" => "a",
    "Jakub" => "123",
    "Marcin" => "321",
];

if (array_key_exists('login', $_POST)) {
    $_SESSION["allowed"] = "false";

    $name = $_POST['name'];
    $password = $_POST['password'];
    foreach($userPasswords as $key => $value)
    {
        if($key == $name && $value == $password)
        {
            $_SESSION["username"] = $key;
            $_SESSION["allowed"] = "true";
            break;
        }
    }

    header("Location: Restricted.php");
    exit;
}