<?php

require("../utils/functions.php");

$input = $_REQUEST["url"];
$numbers = $_REQUEST["numbers"];

if (doesOperationsExist($input, $OPERATIONS)) {
    echoJson(chooseOperation($input, $numbers));
} else {
    echoJson(["report" => "Wrong parameters entered."]);
}
