<?php
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

$res = [];

header('Content-Type: application/json; charset=utf-8');
switch ($oper) {
    case 'add':
        if (count($nums) <= 1) {
            echo json_encode(["report" => "Not enough numbers", "statuscode"=> "418"]);
            die();
        }
        $res = add($nums);
        break;
    case 'sub':
        if (count($nums) <= 1) {
            echo json_encode(["report" => "Not enough numbers", "statuscode"=> "418"]);
            die();
        }
        $res = sub($nums);
        break;
    case 'mul':
        if (count($nums) <= 1) {
            echo json_encode(["report" => "Not enough numbers", "statuscode"=> "418"]);
            die();
        }
        $res = mul($nums);
        break;
    case 'div':
        if (count($nums) <= 1) {
            echo json_encode(["report" => "Not enough numbers", "statuscode"=> "418"]);
            die();
        }
        $res = div($nums);
        break;
    case 'mod':
        if (count($nums) <= 1) {
            echo json_encode(["report" => "Not enough numbers", "statuscode"=> "418"]);
            die();
        }
        $res = mod($nums);
        break;
    case 'sqrt':
        $res = sqrtArr($nums);
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

function mul(array $nums) {
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
        $sum *= $num;
    }
    return ["report" => "200 OK", "result" => $sum];
}

function div(array $nums) {
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
        if ($num != 0) {
            $sum /= $num;
        } else {
            return ["report" => "Cannot divide by zero"];
        }
    }
    return ["report" => "200 OK", "result" => $sum];
}

function mod(array $nums) {
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
        if ($num != 0) {
            $sum %= $num;
        } else {
            return ["report" => "Cannot modulo by zero"];
        }
    }
    return ["report" => "200 OK", "result" => $sum];
}

function sqrtArr(array $nums) {
    $sum = 0;
    $tempRes = isNumberInArray($nums);
    if ($tempRes !== True)
        return $tempRes;

    $firstNum = True;
    if (count($nums) > 1) {
        foreach ($nums as $num) {
            if ($firstNum) {
                $sum = $num*$num;
                $firstNum = False;
                continue;
            }
            $sum += $num*$num;
        }
    } else {
        $sum = $nums[0]*$nums[0];
        return ["report" => "200 OK", "result" => $sum];
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