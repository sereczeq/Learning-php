<?php
session_start()
?>

<?php

$itemPrice = [
    "ball" => 15,
    "bat" => 10,
    "bike" => 34,
];
?>
<table> <?php
    foreach ($itemPrice as $key => $value) {
        echo "<tr><td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo "$";
        echo $value;
        echo "</td>";
        echo "<td>";
        echo "<form method='post'>
			<input type='submit' name='$key'
                 value='Add' />
		</form>";
        echo "</td>";

        echo "<td>";
        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = 0;
        }
        echo $_SESSION[$key];
        echo "</td></tr>";
    }
    ?>
    <table>


        <?php


        $sum = 0;
        foreach ($itemPrice as $key => $value) {

            if (isset($_SESSION[$key])) {
                $sum += $_SESSION[$key];
            }

        }
        echo $sum;

        foreach ($itemPrice as $key => $value) {
            if (array_key_exists($key, $_POST)) {
                if (!isset($_SESSION[$key])) {
                    $_SESSION[$key] = 0;
                }
                $_SESSION[$key] += $value;
                header("Location: kart.php");

            }
        }

        ?>
