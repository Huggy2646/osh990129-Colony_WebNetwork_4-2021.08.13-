<?php
	$username = $_POST[ 'username' ];
  	$password = $_POST[ 'password' ];

if ( !is_null( $username ) ) {
	$jb_conn = mysqli_connect( 'localhost', 'root', 'welcome_to_here', 'colony' );
	$jb_sql = "SELECT id FROM user WHERE id = '" . $username . "';";
	$jb_result = mysqli_query( $jb_conn, $jb_sql );
	while ( $jb_row = mysqli_fetch_array( $jb_result ) ) {
		$encrypted_id = $jb_row[ 'id' ];
	}
	if ( $username == $encrypted_id ) {
		$wu = 1;
	} else {
		$co_sql = "INSERT INTO user VALUES( '" .$username. "', '" .$password. "', '0', '100' );";
		$jb_result = mysqli_query( $jb_conn, $co_sql );
		header( 'Location: register-ok.php' );
	}
}
?>

<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<title>회원가입</title>
		<style>
			body { font-family: sans-serif; font-size: 14px; }
			input, button { font-family: inherit; font-size: inherit; }
		</style>
	</head>
	
	<body>
		<h1>회원가입</h1>
		<form action="register.php" method="POST">
			<p><input type="text" name="username" placeholder="사용자이름" required></p>
			<p><input type="password" name="password" placeholder="비밀번호" required></p>
			<p><input type="submit" value="회원가입"></p>
			<p><input type="button" value="로그인으로 돌아가기" onCLICK="location.href='login.php'"></p>
			<?php
			if ( $wu == 1 ) {
				echo "<p>사용자이름이 이미 존재합니다.</p>";
			}
			?>
		</form>
	</body>
</html>