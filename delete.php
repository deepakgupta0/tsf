<?php
/** getting id for deleting the record from user **/
$id = $_REQUEST["id"];
//echo $id;

/** database connection **/
require ("functions.php");
$con = dbConnect();

$del_sql = "DELETE FROM `customer` WHERE `customer`.`AccountNo` = '$id'";
//var_dump($del_sql);

$del_data = $con->query($del_sql);
//var_dump($del_data);

header("Location:tables.php");

?>