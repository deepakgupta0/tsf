<?php

require ("functions.php");
$con = dbConnect();

$userName = $_REQUEST["userName"];
$amt = $_REQUEST['amt'];
$gender = $_REQUEST['gender'];
$email = $_REQUEST['email'];
$contact = $_REQUEST['contact'];


$random_acc = mt_rand(1000000000,9999999999);
$add_sql = "INSERT INTO `customer` (`AccountNo`, `UserName`, `Gender`,`Contact`,`Email`,`Amount`, `RegisteredAt`) VALUES ('$random_acc', '$userName', '$gender','$contact','$email', '$amt',CURRENT_DATE());";

$add_data = $con->query($add_sql);

header("Location:tables.php");



?>