<html>
<head>
    <meta charset = "utf-8">
    <title>After login menue</title>
    <style>
        td {
            border: 1px solid black;
        }
    </style>
</head>
<?php
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

$sql = "SELECT * FROM account";

$result = $conn->query($sql);

echo "<table>";
echo "<tr>";
echo "<td>";
echo "id";
echo "</td><td>";
echo "login";
echo "</td><td>";
echo "password";
echo "</td><td>";
echo "bio";
echo "</td><td>";
echo "move";
echo "</td></tr>";


while ($row = mysqli_fetch_array($result)) {
   $id = $row[0];
   $login = $row[1];
   $password = $row[2];
   $bio = $row[3];
   echo "<tr>";
   echo "<td>";
   echo $id;
   echo "</td><td>";
   echo $login;
   echo "</td><td>";
   echo $password;
   echo "</td><td>";
   echo $bio;
   echo "</td><td>";
   echo "<form method='post'> <input type='submit' class='button' name='$id' value='move'></form>";
   echo "</td></tr>";
}
echo "</table>";

$sql = "SELECT * FROM account";

$result = $conn->query($sql);

$sql = "INSERT INTO account2 (id, login, password, info) VALUES (?, ?, ?, ?)";
$sqlRemove = "DELETE FROM account WHERE id=?";
while ($row = mysqli_fetch_array($result)) {
    $id = $row[0];
    $login = $row[1];
    $password = $row[2];
    $bio = $row[3];

    if(array_key_exists($id, $_POST))
    {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $id, $login, $password, $bio);
        $stmt->execute();

        $stmt = $conn->prepare($sqlRemove);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        header("Location: Account1.php");
    }
}
?>
</html>
