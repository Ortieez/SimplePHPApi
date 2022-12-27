<?php

require("../utils/functions.php");

$urlData = explode("/", explode("/math.api/phase2/", $_SERVER['REQUEST_URI'])[1]);

$input = $urlData[0];

if(doesOperationsExist($input, $OPERATIONS)) {
    $numbers = array_slice($urlData, 1);
    echoJson(chooseOperation($input, $numbers));
} else {
    echo "Please try urls: <br>";
    echo "<a href='./add/1/1'>/add/1/1</a> <br><br>";
    echo "<a href='./sub/35/10/10'>/sub/35/10/10</a> <br><br>";
    echo "<a href='./mul/35/10/10'>/mul/35/10/10</a> <br><br>";
    echo "<a href='./div/35/10'>/div/35/10</a> <br><br>";
    echo "<a href='./mod/35/10'>/mod/35/10</a> <br><br>";
    echo "<a href='./sqrt/100'>/sqrt/100</a> <br><br>";

    die("Not enough parameters. Or wrong parameters entered <br>");
}
?>