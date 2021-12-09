<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>PHP form</title>
</head>
<body>
<?php
if (empty($_POST["name"])) {
    echo("Missing name.");
    die();
}
if (empty($_POST["age"])) {
    echo("Missing age.");
    die();
}

$name = $_POST["name"];
if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    echo("Invalid name format. Only letters and spaces allowed.");
    die();
}


# trim whitespaces
$name = preg_replace('/\s+/', '', $name);

$age = $_POST["age"];

const minimalAcceptedAge = 0;
const maximalAcceptedAge = 200;
if ($age > maximalAcceptedAge || $age < minimalAcceptedAge) {
    echo("Impossible!");
    die();
}

$ageInTenYears = $age + 10;

echo("<div>Welcome $name. In ten years you will be $ageInTenYears.</div>")
?>
</body>
</html>