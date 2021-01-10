<?php

	/*$serverIP = "10.209.41.4";
	$dbusername = "2011051_bx94712";
	$dbpassword = "hacker97";
	$dbname = "2011051-dummy";*/

	$serverIP = "10.209.41.4";
	$dbusername = "2011051_db76699";
	$dbpassword = "hacker97";
	$dbname = "2011051-lego-2016";

	$conn = mysqli_connect($serverIP, $dbusername,$dbpassword,$dbname);
 	if(mysqli_errno($conn)) {
 	 die("<p>MySQL error:</p>\n<p>" . mysqli_error($conn) . "</p>\n</body>\n</html>\n");
 	}
