<?php

$numericalArray = array(0, 1, 2, 3, 4);
var_dump($numericalArray);

$associativeArray = [
    "as" => "wow",
    "so" => "heh",
    "ci" => "lol",
    "at" => "meh",
    "ive" => "yay"
];
var_dump($associativeArray);

echo("<div>For loop: </div><br/>");
for($i = 0; $i < count($numericalArray); $i++)
{
    echo("<p>$numericalArray[$i]</p><br>");
}

echo("<div>Foreach loop: </div><br/>");
foreach ($associativeArray as $key => $value)
{
    echo("<p>$key</p><br>");
}

echo("<div>Using current: </div>");
// by default, the pointer is on the first element
echo current($numericalArray) . "<br />\n"; // "step one"
echo("<div>Using next twice</div>");
next($numericalArray);
next($numericalArray);
echo("<div>Using current: </div>");
echo current($numericalArray) . "<br />\n";
echo("<div>it's because the index is currently: </div>");
echo key($numericalArray) . "<br/>\n";
echo("<div>Using reset and then current </div>");
reset($numericalArray);
echo current($numericalArray) . "<br />\n";

echo("<div>Time for globals: </div><br/>");
foreach($GLOBALS as $key => $value)
{
    echo "<div> $key  </div>";
}
echo 'User IP - '.$_SERVER['REMOTE_ADDR'];
?>

