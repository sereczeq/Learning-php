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
    <div>
        <label>
            <input type="text" name="repeatedPassword">
            repeat password
        </label>
    </div>
    <input type="submit" value="register" name="register" class="button">
</form>

<?php
if (array_key_exists('register', $_POST)) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $repeatedPassword = $_POST['repeatedPassword'];

    if($password != $repeatedPassword)
    {
        echo "Password are not identical";
        die("Not identical passwords");
    }

    $sql = "INSERT INTO account (login, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $password);

    if ($stmt->execute() === TRUE) {
        echo "User created successfully";
        header("Location: LoginPage.php");
    } else {
        echo "Error creating User: " . $conn->error;
        die;
    }
}
?>
