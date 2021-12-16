<form method="post">
    <input type="submit" name="one" class="button" value="1">
    <input type="submit" name="two" class="button" value="2">
    <input type="submit" name="three" class="button" value="3">
</form>

<?php
//Implement a website, which should be equipped with a mechanism that allows you to change and
//remember its appearance (e.a. font size and font color, background color, etc.). For example, you can
//prepare several suits of styles that you want user will be able to choose depending on his/her
//preferences. The server has to keep user’s preferences in a cookies. Based on the data stored in the
//cookie, the server has to modify the pages of the site and send them to the browser. It's a good idea
//to prepare a separate "diagnostic" page that will reveal the content of the cookie.


const cookieName = "Cookie";
const oneDay = 86400 * 30; // 1 day
displayText();

if(array_key_exists("one", $_POST))
{
    changeStyle(1);
}
else if(array_key_exists("two", $_POST))
{
    changeStyle(2);
}
else if(array_key_exists("three", $_POST))
{
    changeStyle(3);
}

//if(isset($_POST['increase']))
//{
//    changeSize(1);
//}
//echo getSizeFromCookie();

function changeStyle($newStyle)
{
    saveStyleToCookie($newStyle);
    displayText();
}

function getStyleFromCookie()
{
    if(isset($_COOKIE[cookieName]))
    {
        return $_COOKIE[cookieName];
    }
    return 0;
}

function saveStyleToCookie($style)
{
    setcookie(cookieName, $style, time() + oneDay, "/");
}



function displayText()
{
    switch (getStyleFromCookie())
    {
        case 1:
            echo "<p style='font-size: small; color: rebeccapurple'> Nice text </p>";
            break;
        case 2:
            echo "<p style='font-size: medium; color: darkgoldenrod'> Nice text </p>";
            break;
        case 3:
            echo "<p style='font-size: large; color: navajowhite'> Nice text </p>";
            break;
        default:
            echo "<p style='font-size: xx-large; color: darkslategrey'> Nice text </p>";
    }
}
?>

