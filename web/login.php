<?php
	$username = $_POST[ 'username' ];
  	$password = $_POST[ 'password' ];

if ( !is_null( $username ) ) {
	$jb_conn = mysqli_connect( 'localhost', 'root', 'welcome_to_here', 'colony' );
	$jb_sql = "SELECT pw FROM user WHERE id = '" . $username . "';";
	$jb_result = mysqli_query( $jb_conn, $jb_sql );
	while ( $jb_row = mysqli_fetch_array( $jb_result ) ) {
		$encrypted_password = $jb_row[ 'pw' ];
	}
	if ( is_null( $encrypted_password ) ) {
		$wu = 1;
	} else {
		if ( $password == $encrypted_password ) {
			$cookieName = "uid";
			$cookieValue = $username." ".$password;
			setcookie( $cookieName, $cookieValue, time()+600, "/");
			header( 'Location: login-ok.php' );
		} else {
			$wp = 1;
		}
	}
}
?>

<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<title>로그인</title>
		<style>
			body { font-family: sans-serif; font-size: 14px; }
			input, button { font-family: inherit; font-size: inherit; }
		</style>
	</head>
	
	<body>
		<h1>로그인</h1>
		<form action="login.php" method="POST">
			<p><input type="text" name="username" placeholder="사용자이름" required></p>
			<p><input type="password" name="password" placeholder="비밀번호" required></p>
			<p><input type="submit" value="로그인"></p>
			<p><input type="button" value="회원가입" onCLICK="location.href='register.php'"></p>
			<?php
			if ( $wu == 1 ) {
				echo "<p>사용자이름이 존재하지 않습니다.</p>";
			}
			if ( $wp == 1 ) {
				echo "<p>비밀번호가 틀렸습니다.</p>";
			}
			?>
		</form>
	</body>
</html>