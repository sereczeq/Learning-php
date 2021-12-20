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

$sql = "SELECT * FROM account2";

$result = $conn->query($sql);

echo "<table>";
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
   echo "</td></tr>";
}
echo "</table>";

?>
</html>
