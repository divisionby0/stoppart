<?php
	//session_start();
	require_once("sql.php");
	require_once("shop_func.php");
	//require_once("box_func.php");  
	//set_session_vars();
	//echo "2";
	$radio=$_GET['radio'];
	$language=$_GET['language'];
	////////////////////// Здесь замена для Радиобуттон /////////////////////////////////
	if($radio!='') 
	{
		$id=$_GET['id']; 
		//echo 'complete';
		echo updateaddtobasketdata($id,$radio,$language);
	}

	////////////////////// Здесь замена для Лайка /////////////////////////////////
	else {
		$id=mb_substr($_GET['id'], 4);
		$userid=$_GET['uid'];

		$link=sql_logon();

		$request = "";

		$selectRequestString = "SELECT * FROM likeengine WHERE id='$id' and userid='$userid'";

		if($result = $link->query($selectRequestString)){
			$countQuantStr = mysqli_num_rows($result);
		}

		if($countQuantStr>0){
			//echo "DELETE FROM likeengine WHERE id='$id' and userid='$userid'";
			$link->query("DELETE FROM likeengine WHERE id='$id' and userid='$userid'");
		}
		else{
			//echo "INSERT INTO likeengine (id, userid) VALUES ('$id', '$userid')";
			if($userid!='')	{
				$link->query("INSERT INTO likeengine (id, userid) VALUES ('$id', '$userid')");
			}
		}

		if($result=$link->query("SELECT * FROM likeengine WHERE id='$id'")){
			$countQuantStr = mysqli_num_rows($result);
		}
		mysqli_free_result($result);

		//echo printlike($id,$countQuantStr,$language);

		$returnData = array("id"=>$id,"uid"=>$userid,"countQuantStr"=>$countQuantStr);
		echo json_encode($returnData);
	}

