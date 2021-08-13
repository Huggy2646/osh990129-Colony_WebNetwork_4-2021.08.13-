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
          $point=100;
          $loss_point=0;
          echo "point:".$money;
        ?>
      </h2>
      </p>

      <?php
      $image = array("./Colony_WebNetwork_4/Ladder_Picture/hide_ladder.png");  // 이미지 파일명을 갯수만큼 배열로 적음
      $random = time()%count($image);
      ?>
	<center><p><img src="<?=$image[$random]?>" width="50%"></p></center>
	<center><a href="colony3.php?id=0">홀</a> <a href="colony3.php?id=1">짝</a></center>
	<a href="show_me_the_money.php"><img src="show me the money.png"  width="20%"></a>

  </body>
</html>
