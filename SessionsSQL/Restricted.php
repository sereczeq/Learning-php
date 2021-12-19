<?php
session_start();
if(!isset($_SESSION['allowed']))
{
    header("Location: ../LearningSessions/Allowed.php");
    exit;
}
if($_SESSION["allowed"] != "true")
{
    header("Location: ../LearningSessions/Allowed.php");
    exit;
}

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



    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Restricted Page</title>
    </head>
    <body>
    <h1>
        Wow <?php echo $_SESSION["username"] ?>, you managed to log in, congrats! You are now on a restricted page yaaaay
    </h1>
    </body>
    </html>
<?php

$sql = "SELECT info FROM account WHERE account.login = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION["username"]);
$stmt->execute();
$res = $stmt->get_result();
$array = $res->fetch_row();
$info = $array[0];
?>
<form method="post">
    <input type="text" name="newInfo" value="<?php echo $info ?>" />
    <input type="submit" value="update" name="update" class="button">
</form>


<?php
if (array_key_exists('update', $_POST)) {
    $newInfo = $_POST['newInfo'];
    $sql = "update account set info = ? where login=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newInfo,$_SESSION["username"]);
    $stmt->execute();
    header("Location: Restricted.php");
}