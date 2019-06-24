<?php $honda ="本田じゃんけん"; ?>
<?php echo $honda; ?>
<form  action ="<?=$_SERVER['PHP_SELF']?>" method ="post">
	<!--<input type = "text" name ="keyword">-->
	<input type = "submit" name="send" value ="グー">
	<input type = "submit" name="send" value ="チョキ">
	<input type = "submit" name="send" value ="パー">	
</form>


<?php
 #param
 //自身　　手数
 $msg = $_POST['send'];
 
 //CPU側　手数
 $jkn_array =array ("グー","チョキ","パー");
 $num = rand(0, 2);
 $jkn=$jkn_array[$num];
?>

<br><hr>
<?php echo "自分の出した手：".$msg; ?>
<br>
<?php echo "相手の出した手：".$jkn; ?>
<br><hr>

<?php 
//じゃんけん関数呼び出し
janken($msg,$jkn); 
?>

<?php
 //じゃんけん関数　勝敗判定 
 function janken($msg,$jkn){
	$win_m  ="YOU LOSE!<br>俺の勝ち！<br>何で負けたか、明日まで考えといてください。<br>そしたら何かが見えてくるはずです。<br>ほな、いただきます。";
	$lose_m ="YOU WIN!<br>たかがじゃんけん、そう思ってないですか？<br>それやったら明日も俺が勝ちますよ";
	//画像引用
	$url ="http://lovelive-sunshine.info/wp-content/uploads/2019/04/1555553996-8d2f43bfd82807533999f4e81cb01f92.jpg";
	$img ="<br><img src=".$url." awidth="."10"."　height="."10"."><br>";
	 if($msg === $jkn){		 
		echo "あいこ"; 		
	  }else{
			switch ($msg){
				case "グー":
					if($jkn ==="パー"){
						#自分がグーを出して、相手がパーを出した場合、自分の負け
						echo $win_m;
						echo $img;
					}else{
						echo $lose_m;
						echo $img;
					}
					break;
				case "チョキ":
					if($jkn ==="グー"){
						echo $win_m;
						echo $img;
					}else{
						echo $lose_m;
						echo $img;
					}
					break;
				case "パー":
					if($jkn === "チョキ"){
						echo $win_m;
						echo $img;
					}else{
						echo $lose_m;
						echo $img;
					}
					break;
				default:
					echo "未入力 or 初期更新時 のみ表示　テスト用";	
			} 
		}	 
	}

?>