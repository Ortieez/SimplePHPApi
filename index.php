<?php
if (filter_input(INPUT_GET, "operation") == "" || filter_input(INPUT_GET, "numbers") == "") {
    echo "Please try urls: <br>";
    echo "<a href='?operation=add&numbers=1,1'>?operation=add&numbers=1,1</a> <br><br>";
    echo "<a href='?operation=sub&numbers=35,10,10'>?operation=sub&numbers=35,10,10</a> <br><br>";

    die("Not enough parameters. Or wrong parameters entered <br>");
}

$oper = filter_input(INPUT_GET, "operation");
$nums = explode(',', filter_input(INPUT_GET, "numbers"));

if (count($nums) <= 1) {
    echo json_encode(["report" => "Not enough numbers", "statuscode"=> ""]);
    die();
}

$res = [];
switch ($oper) {
    case 'add':
        $res = add($nums);
        break;
    case 'sub':
        $res = sub($nums);
        break;
    default:
}

function add(array $nums)
{
    $sum = 0;
    $tempRes = isNumberInArray($nums);
    if ($tempRes !== True)
        return $tempRes;

    foreach ($nums as $num) {
        $sum += $num;
    }
    return ["report" => "200 OK", "result" => $sum];
}

function sub(array $nums)
{
    $sum = 0;
    $tempRes = isNumberInArray($nums);
    if ($tempRes !== True)
        return $tempRes;

    $firstNum = True;
    foreach ($nums as $num) {
        if ($firstNum) {
            $sum = $num;
            $firstNum = False;
            continue;
        }
        $sum -= $num;
    }
    return ["report" => "200 OK", "result" => $sum];
}

function isNumberInArray(array $nums)
{
    foreach ($nums as $num) {
        if (!is_numeric($num)) {
            return ["report" => "Expected numbers not string"];
        }
    }

    return True;
}


echo json_encode($res);

?>