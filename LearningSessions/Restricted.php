<?php
session_start();
if(!isset($_SESSION['allowed']))
{
    header("Location: Allowed.php");
    exit;
}
if($_SESSION["allowed"] != "true")
{
    header("Location: Allowed.php");
    exit;
}


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
session_destroy();