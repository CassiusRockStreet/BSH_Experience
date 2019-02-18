<?php
require_once("../includes/controller/controller.php");
require_once('../includes/controller/functions.php');

// .CompanyTokenizer()	
// 	Adding Super admin
// 	$SuperadminSubmition = array("Name" => "Imraan","Surname"=>"Hoosen","Email"=>"imraan@decimalagency.com","Cell"=>"000000000000","Password"=>"12345","Company_Token"=>"FcoPzkmEQooB5ODFiGfyi4lMjARVG1","Ip_Address"=>"124");
// 	$data = callFunc("setSuperAdmin",$SuperadminSubmition);
// 	if($data['status']==100){
// 		echo $data['data'];
// 	}else{
// 		echo $data['data'];
// 	}

// 	Adding admin
	// $AdminSubmition = array("Name"=> "Imraan","Surname"=>"Hoosen","Email"=>"imraan@decimalagency.com","Cell"=>"000000000000","Password"=>"12345","Company_Token"=>"FcoPzkmEQooB5ODFiGfyi4lMjARVG1","Ip_Address"=>"124","Super_Admin_ID"=>"1");
// 	$data = callFunc("setAdmin",$AdminSubmition);
// 	if($data['status']==100){
// 		echo $data['data'];
// 	}else{
// 		echo $data['data'];
// 	}

// 	Adding Users
// 	$UsersSubmition = array("Name"=> "Imraan","Surname"=>"Hoosen","Email"=>"imraan@decimalagency.com","Cell"=>"000000000000","Password"=>"12345","Company_Token"=>"FcoPzkmEQooB5ODFiGfyi4lMjARVG1","Ip_Address"=>"124","subscriber"=>"1");
// 	$data = callFunc("setExperienceUser",$UsersSubmition);
// 	if($data['status']==100){
// 		echo $data['data'];
// 	}else{
// 		echo $data['data'];
// 	}

// 	 Users Login
// 	$UsersLogin = array("Email"=>$_POST['email'],"Password"=>$_POST['password']);
// 	$data = callFunc("requestUserLogin",$UsersLogin);
// 	if($data['status']==100){
// 		echo $data['data'];
// 	}else{
// 		echo $data['data'];
// 	}


// 	Admin Login
// 	$UsersLogin = array("Email"=>$_POST['email'],"Password"=>$_POST['password']);
// 	$data = callFunc("requestUserLogin",$UsersLogin);
// 	if($data['status']==100){
// 		echo $data['data'];
// 	}else{
// 		echo $data['data'];
// 	}

// 	 Reset Password
// 	$ResetUserPass = array("Email"=>"imraan@decimalagency.com","OldPassword"=>"1","NewPassword"=>"2","ConfirmNewPassword"=>"2");
// 	$data = callFunc("requestResetUsersPassword",$ResetUserPass);
// 	if($data['status']==100){
// 		echo $data['data'];
// 	}else{
// 		echo $data['data'];
// 	}

//	Set Event
	$setEvent = array("EventName"=>"Bosch Series Compact","EventDescription"=>"The main event is coming soon","Date"=>"2019-02-02","Time"=>"05:00:01","Diet"=>"Vegetarians","Creative"=>"urlLink","isPaid"=>"1","Price"=>"200.00","Attendee"=>"12","created_By_Id"=>"1","company_Token"=>"123");
	$data = callFunc("setEvent",$setEvent);
	if($data['status']==100){
		echo $data['data'];
	}else{
		echo $data['data'];
	}



// if(isset($_POST['LoginBtn'])){
// // 	 Users Login
// 	$UsersLogin = array("Email"=>$_POST['email'],"Password"=>$_POST['password']);
// 	$data = callFunc("requestAdminLogin",$UsersLogin);
// 	if($data['status']==100){
// 		echo $data['data'];
// 	}else{
// 		echo $data['data'];
// 	}
// }
?>
<html>
	<head>
		<title>BSH EXPERIENCE</title>
	</head>
<body>
	<h1>Get Lost!, or I'll Kill you!</h1>
	<!-- 
<form method="POST">
		<input type="email" name="email" placeholder="Email address">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" name="LoginBtn" value="Sign in">
	</form>
 -->
</body>
</html>