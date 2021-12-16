
<?php
$photos = [
    "lottery" => "./Photos/istockphoto-95442265-170667a.jpg",
    "wheelOfFortune" => "./Photos/istockphoto-175482570-170667a.jpg",
    "PoliceDocuments" => "./Photos/istockphoto-983801720-170667a.jpg",
    "AreYouCovered" => "./Photos/istockphoto-1327364098-170667a.jpg",
    "SmallGirl" => "./Photos/pic.jpg"
];

foreach ($photos as $key => $value)
{
    echo "<form method='get'><input type='submit' value='$key' name='$key'/></form>";
}

foreach ($photos as $key => $value)
{
    if(isset($_GET[$key]))
    {
        echo "<img src='$value'  alt='$key'>";
    }
}
