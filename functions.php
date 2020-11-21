<?php
function dbConnect() {
	//add your credentials
	$con = mysqli_connect("", "", "", "");
	if($con->connect_error){
		echo "connection failed". mysqli_connect_error();
	} else {
		 //echo "connected";
		return $con;
	}

}
?>
