<?php
date_default_timezone_set('Europe/Prague');

$OPERATIONS = [
    'add',
    'sub',
    'mul',
    'div',
    'mod',
    'sqrt',
];

/**
 * Function that takes input of raw output and encodes it to json and sends echo
 * @param mixed $res
 * @return void
 */
function echoJson($res) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($res);
}

/**
 * Check if input operation exists 
 * @param string $oper
 * @param array $operations
 * @return bool
 */
function doesOperationsExist(string $oper, array $operations) {
    $temp = in_array($oper, $operations, true);
    
    return $temp;
}

/**
 * Addition function
 * @param array $nums
 * @return array|bool
 */
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

/**
 * Substitute function
 * @param array $nums
 * @return array|bool
 */
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

/**
 * Multiplication function
 * @param array $nums
 * @return array|bool
 */
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

/**
 * Division function
 * @param array $nums
 * @return array|bool
 */
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

/**
 * Modulus function
 * @param array $nums
 * @return array|bool
 */
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

/**
 * Custom square root function
 * @param array $nums
 * @return array|bool
 */
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

/**
 * Checks every item in array and returns if everything is a number
 * @param array $nums
 * @return array<string>|bool
 */
function isNumberInArray(array $nums)
{
    foreach ($nums as $num) {
        if (!is_numeric($num)) {
            return ["report" => "Expected numbers not string"];
        }
    }

    return True;
}

/**
 * Function that executes choosen function and returns raw response
 * @param string $oper
 * @param array $nums
 * @return array|bool
 */
function chooseOperation(string $oper, array $nums) {
    $res = [];
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

    return $res;
}
?>