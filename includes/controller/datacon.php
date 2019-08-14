<?php
	$db		= "decimald_BSH_Experience_VsnOne";
	$user	= "decimald_bsh_root";
	$pass	= "Lav^FQA[lADC"; 
	$server = "localhost";
	
	$connection = mysqli_connect("$server","$user","$pass","$db");
	if(!$connection){
			die('<h2>Error status: Please contact system admin, error communicating with database</h2>.'.mysqli_error());
	}
	function setExit(){
		mysqli_close($connection);
	}
	
	function queryMysql($Query){
		global $connection;
		$result = $connection->query($Query);
		if (!$result) die($connection->error);
		return $result;
	}
	
	function sessionCheck(){
		if(isset($_SESSION['LoginToken'])){
		}else{
			header("Location:destroy_session.php");
		}
	}
?>