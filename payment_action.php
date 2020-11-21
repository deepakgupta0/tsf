<?php


// echo "Amount".$_REQUEST["Amount"];
// echo "\n";
// echo "Sender".$_REQUEST["AccountNo"];
// echo "\n";
// echo "Receiver".$_REQUEST["ReceiverAccount"]

$saccNo = $_REQUEST["AccountNo"];
$amt = (float)$_REQUEST["Amount"];
$raccNo = $_REQUEST["ReceiverAccount"];

// /** database connection **/
require ("functions.php");
$con = dbConnect();

$get_sql1 = "SELECT * FROM `customer` where AccountNo='$saccNo'";
$get_sql2 = "SELECT * FROM `customer` where AccountNo='$raccNo'";


$get_data1 = $con->query($get_sql1);
$get_data2 = $con->query($get_sql2);

$sData = $get_data1->fetch_assoc();
$rData = $get_data2->fetch_assoc();



$rAmt= (float)$rData["Amount"];
$sAmt = (float)$sData["Amount"];
$rName = $rData["UserName"];
$sName = $sData["UserName"];

// echo "Receiver Account".$raccNo;
// echo "<br>";
// echo "Receiver Amount".$rAmt;
// echo "<br>";
// echo "Sender Account".$saccNo;
// echo "<br>";
// echo "Sender Amount".$sAmt;
// echo "<br>";
// echo "Given Amount".$amt;

$update_sql1 = "UPDATE `customer` set `Amount`=('$rAmt'+'$amt') where `AccountNo`='$raccNo'";
$update_sql2 = "UPDATE `customer` set `Amount`=('$sAmt'-'$amt') where `AccountNo`='$saccNo'";


$con->query($update_sql1);
$con->query($update_sql2);

// 
$del_sql = "INSERT INTO `transaction` (`SenderAccountNo`, `SenderUserName`, `Amount`,`ReceiverAccountNo`,`ReceiverUserName`, `date`, `time`) VALUES ('$saccNo', '$sName', '$amt','$raccNo','$rName', CURRENT_DATE(), CURRENT_TIME())";


$del_data = $con->query($del_sql);

header("Location:viewTransaction.php");


?>
