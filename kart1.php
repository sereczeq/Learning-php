<!DOCTYPE html>
<?php
$products = array("Cheese"=>5,"Ham"=>2,"Tatra"=>3);
?>
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



<body>
<table>
    <?php
    foreach($products as $name => $price) {
        echo "<tr>";

        echo "<td>";
        echo $name;
        echo "</td>";

        echo "<td>";
        echo $price;
        echo "$";
        echo "</td>";

        echo "<td>";
        echo "<form method='post'>
			<input type='submit' name='$name'
                 value='Add' />
		</form>";
        echo "</td>";

        echo "<td>";
        $curr = 0;
        if(isset($_COOKIE[$name])) {
            $curr = $_COOKIE[$name];
        }
        echo $curr;
        echo "</td>";

        echo "</tr>";
    }
    ?>
</table>

<?php
echo "Sum:";

$sum = 0;

foreach($products as $name => $price) {
    if(isset($_COOKIE[$name])) {
        $sum += $_COOKIE[$name] * $price;
    }

}

echo $sum;
echo "$";
?>

<form method="post">
    <input type="submit" name="Reset"
           value="Reset" />
</form>

</body>

<?php
foreach($products as $name => $price) {
    if(array_key_exists($name, $_POST)) {
        $curr = 0;
        if(isset($_COOKIE[$name])) {
            $curr = $_COOKIE[$name];
            $curr += 1;
        }
        setcookie($name, $curr, time() + 30 * 60);
        header("Location: kart1.php");
    }

}

if(array_key_exists('Reset', $_POST)) {
    foreach($products as $name => $price) {
        if(isset($_COOKIE[$name])) {
            setcookie($name, 0, time() + 30 * 60);

        }
    }
    header("Location: kart1.php");

}



?>
</html>