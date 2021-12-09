<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restricted Page</title>
</head>
<body>
<h1>
    This is boring page that everyone can access, boo hoo
</h1>
</body>
</html>
<?php
session_destroy();
