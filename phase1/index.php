<?php
require "../utils/functions.php";

if (filter_input(INPUT_GET, "operation") == "" || filter_input(INPUT_GET, "numbers") == "") {
    echo "Please try urls: <br>";
    echo "<a href='?operation=add&numbers=1,1'>?operation=add&numbers=1,1</a> <br><br>";
    echo "<a href='?operation=sub&numbers=35,10,10'>?operation=sub&numbers=35,10,10</a> <br><br>";
    echo "<a href='?operation=mul&numbers=35,10,10'>?operation=mul&numbers=35,10,10</a> <br><br>";
    echo "<a href='?operation=div&numbers=35,10'>?operation=div&numbers=35,10</a> <br><br>";
    echo "<a href='?operation=mod&numbers=35,10'>?operation=mod&numbers=35,10</a> <br><br>";
    echo "<a href='?operation=sqrt&numbers=100'>?operation=sqrt&numbers=100</a> <br><br>";

    die("Not enough parameters. Or wrong parameters entered <br>");
}

$oper = filter_input(INPUT_GET, "operation");
$nums = explode(',', filter_input(INPUT_GET, "numbers"));
$res = chooseOperation($oper, $nums);

header('Content-Type: application/json; charset=utf-8');

echo json_encode($res);
?>