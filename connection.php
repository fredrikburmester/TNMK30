<?php

	$serverIP = "";
	$dbusername = "";
	$dbpassword = "";
	$dbname = "";

	$conn = mysqli_connect($serverIP, $dbusername,$dbpassword,$dbname);
 	if(mysqli_errno($conn)) {
 	 die("<p>MySQL error:</p>\n<p>" . mysqli_error($conn) . "</p>\n</body>\n</html>\n");
 	}
