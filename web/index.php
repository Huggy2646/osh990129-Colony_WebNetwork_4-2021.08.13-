<?php
	$co_conn = mysqli_connect( 'localhost', 'root', 'welcome_to_here', 'colony' );
	if(!isset($_COOKIE["uid"])) {
		header( 'Location: login.php' );
	} else {
		$uid = explode(" ", $_COOKIE["uid"]);
		$id = $uid[0];
		$pw = $uid[1];
		$co_sql = "SELECT money, op FROM user WHERE id = '" . $id . "';";
		$co_result = mysqli_query( $co_conn, $co_sql );
		while ( $co_row = mysqli_fetch_array( $co_result ) ) {
			$money = $co_row[ 'money' ];
			$op = $co_row[ 'op' ];
		}
		if( $op == 1) {
			echo "<script>alert(\"어드민 계정입니다!!!\");</script>";
		}
		# id, pw, money, op
	}
?>

<!doctype html>
<html>
<head>
	<title>Do you want money?</title> 
</head>
<body>
	<h2> <center>Money copy bug world</center> </h2>
	
	<center> <img src="gambling.jpg" width="300"> </center>
  <center><a href="colony2.php"><img src="2543050.jpg" width="10%"> </center>

</body>
</html>
