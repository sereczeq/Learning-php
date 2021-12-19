<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$databaseName = "accounts";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "USE $databaseName";
$conn->query($sql);

?>

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
<form method="post">
    <input type="submit" value="register" name="register" class="button">
</form>

<?php

if (array_key_exists('login', $_POST)) {

    $_SESSION["allowed"] = "false";
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT login, password FROM account";

    $result = $conn->query($sql);

    while ($row = mysqli_fetch_array($result)) {
        if ($name == $row[0] && $password == $row[1]) {
            echo "Logged in as $name";
            $_SESSION["username"] = $name;
            $_SESSION["allowed"] = "true";
            header("Location: Restricted.php");
            break;
        }
    }
    echo "Wrong username or password";
}

if(array_key_exists('register', $_POST))
{
    header("Location: RegisterPage.php");
}