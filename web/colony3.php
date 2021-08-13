<?php
	$co_conn = mysqli_connect( 'localhost', 'root', 'welcome_to_here', 'colony' );
	if(!isset($_COOKIE["uid"])) {
		header( 'Location: login.php' );
	} else {
		$uid = explode(" ", $_COOKIE["uid"]);
		$id = $uid[0];
		$pw = $uid[1];
		$co_sql = "SELECT money FROM user WHERE id = '" . $id . "';";
		$co_result = mysqli_query( $co_conn, $co_sql );
		while ( $co_row = mysqli_fetch_array( $co_result ) ) {
			$money = $co_row[ 'money' ];
		}
		# id, pw, money
	}
	$image = array("./Colony_WebNetwork_4/Ladder_Picture/ladder.png",
				   "./Colony_WebNetwork_4/Ladder_Picture/ladder2.png",
				   "./Colony_WebNetwork_4/Ladder_Picture/ladder3.png");  // 이미지 파일명을 갯수만큼 배열로 적음
    $random = time()%count($image);

	if (($_GET['id'] === "0" and $random==1)) {
		echo "<script>alert(\"축하합니다.\");</script>";
		$money = $money * 2;
		}
    elseif (($_GET['id'] === "1" and $random==2)) {
        echo "<script>alert(\"축하합니다.\");</script>";
		$money = $money * 2;
    }
    elseif ($_GET['id'] === "0" and $random==3) {
        echo "<script>alert(\"축하합니다.\");</script>";
		$money = $money * 2;
    }
    else {
    	echo "<script>alert(\"포인트 77ㅓ억~\");</script>";
		$money = $money / 2;
    }
	$co_sql = "UPDATE user SET money='".$money."' WHERE id='".$id."';";
	mysqli_query( $co_conn, $co_sql );
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <p style="text-align:right;"><h2>
        <?php
          echo "point:".$money;
        ?>
      </h2>
      </p>

	<center><img src="<?=$image[$random]?>" width="50%"></center>
	<center><a href="colony2.php">다시하기</a></center>







  </body>
</html>
