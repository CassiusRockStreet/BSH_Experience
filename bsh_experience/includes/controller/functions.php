<?php
/***************************************************|
 *	Developer Ndalama Cassius Maluleke				*
 *													*
 *	Rockstreet (c) 2019								*
 *	info@rockstreet.co.za || rockstreet.co.za 		*
 *	http://ndalama@rockstreet.co.za 				*
 |***************************************************/
require_once('datacon.php');	
$status = array("status"=>"","data"=>"data");
function setSuperAdmin($Name,$Surname,$Email,$Cell,$Password,$Company_Token,$IP_Address){
		if(!empty($Name) && !empty($Surname) && !empty($Email) && !empty($Password) && !empty($Company_Token)){
			$checkToken = checkCompanyToken($Company_Token);
			if($checkToken){
				//Check If user Email Exist
				$SanitizerPass =  md5($Password);
				$queryAddSuperAdmin = queryMysql("INSERT INTO Bsh_superAdmin (SAdmin_full_name,SAdmin_surname,SAdmin_cell_numbers,SAdmin_email_address,SAdmin_password,SAdmin_ip_address) VALUES('$Name','$Surname','$Cell','$Email','$SanitizerPass','$IP_Address')");
				iF($queryAddSuperAdmin){
					$status = array("status"=>100,"data"=>"Success Data");
				}else{
					$status = array("status"=>200,"data"=>"An Error occured adding data to database");
				}
			}else{
				$status = array("status"=>200,"data"=>"Token does not match");
			}
		}else{
			$status = array("status"=>200,"data"=>"Please provide all require fields");
		}
		return $status;		
}

function setAdmin($Name,$Surname,$Email,$Cell,$Password,$Company_Token,$IP_Address,$Super_Admin_ID) {
   	if(!empty($Name) && !empty($Surname) && !empty($Email) && !empty($Password) && !empty($Company_Token) && !empty($Super_Admin_ID)){
			$checkToken = checkCompanyToken($Company_Token);
			if($checkToken){
				//Check If user Email Exist
				$SanitizerPass =  md5($Password);
				$queryAddAdmin = queryMysql("INSERT INTO Bsh_admin_users (AUser_full_name,AUser_surname,AUser_cell_number,AUser_email_address,AUser_password,AUser_ip_address,SAdminFK) VALUES('$Name','$Surname','$Cell','$Email','$SanitizerPass','$IP_Address','$Super_Admin_ID')");
				if($queryAddAdmin){
					$status = array("status"=>100,"data"=>"Successfully Added Admin");
				}else{
					$status = array("status"=>200,"data"=>"An Error occured adding data to database $queryAddAdmin");
				}
			}else{
				$status = array("status"=>200,"data"=>"Token does not match");
			}
		}else{
			$status = array("status"=>200,"data"=>"Please provide all require fields");
		}
		return $status;
}

function setExperienceUser($Name,$Surname,$Email,$Cell,$Password,$Company_Token,$IP_Address) {
   	if(!empty($Name) && !empty($Surname) && !empty($Email) && !empty($Password) && !empty($Company_Token)){
			$checkToken = checkCompanyToken($Company_Token);
			if($checkToken){
				//Check If user Email Exist
				$SanitizerPass =  md5($Password);
				$queryAddUser = queryMysql("INSERT INTO Bsh_users (User_full_name,User_surname,User_cell_number,User_email_address,User_password,User_ip_address) VALUES('$Name','$Surname','$Cell','$Email','$SanitizerPass','$IP_Address')");
				if($queryAddUser){
					$status = array("status"=>100,"data"=>"Successfully Added User please verify account on your email addres $Email");
				}else{
					$status = array("status"=>200,"data"=>"An Error occured adding data to database $queryAddAdmin");
				}
			}else{
				$status = array("status"=>200,"data"=>"Token does not match");
			}
		}else{
			$status = array("status"=>200,"data"=>"Please provide all require fields");
		}
		return $status;
}

function requestAdminLogin($Email,$Password){
	if(!empty($Email) && !empty($Password)){
		$passwordSanitized = MD5($Password);
		$select_users_data = queryMysql("SELECT AUser_id,AUser_email_address,AUser_password FROM Bsh_admin_users WHERE AUser_email_address='$Email' AND AUser_password='$passwordSanitized'");
		if($select_users_data->num_rows > 0){
			$status = array("status"=>100,"data"=>"Successfully Logged in");
		}else{
			$status = array("status"=>200,"data"=>"Invalid Email address/Password");
		}
	}else{
		$status = array("status"=>200,"data"=>"Please provide all require fields");
	}
	return $status;
}
function requestUserLogin($Email,$Password){
	if(!empty($Email) && !empty($Password)){
		$passwordSanitized = MD5($Password);
		$select_users_data = queryMysql("SELECT User_id,User_email_address,User_password FROM Bsh_users WHERE User_email_address='$Email' AND User_password='$passwordSanitized'");
		if($select_users_data->num_rows > 0){
			$status = array("status"=>100,"data"=>"Successfully Logged in");
		}else{
			$status = array("status"=>200,"data"=>"Invalid Email address/Password");
		}
	}else{
		$status = array("status"=>200,"data"=>"Please provide all require fields");
	}
	return $status;
}


function requestResetUsersPassword($Email,$OldPassword,$NewPassword,$ConfirmNewPassword){
	if(!empty($Email) && !empty($OldPassword) && !empty($NewPassword) && !empty($ConfirmNewPassword)){
		$md5Oldpass = MD5($OldPassword);
		$md5Newpass = md5($NewPassword);
		$md5Cpass = md5($ConfirmNewPassword);
		$check_user = queryMysql("SELECT User_email_address, User_password, User_old_password,User_id FROM Bsh_users WHERE User_email_address='$Email' AND User_password='$md5Oldpass'");
		if($check_user->num_rows > 0){
			while($row = $check_user->fetch_assoc()){
				$user_id = $row['User_id'];
				$OldPass = $row['User_old_password'];
				if($OldPassword === $NewPassword || $OldPass === $md5Newpass){
					$status = array("status"=>200,"data"=>"You have already used this password before");
				}else if($NewPassword === $ConfirmNewPassword){
					$UpdatePassword = queryMysql("UPDATE Bsh_users set User_password='$md5Newpass', User_old_password='$md5Oldpass' WHERE User_id='$user_id'");
					if($UpdatePassword){
						$status = array("status"=>100,"data"=>"Your password is reset successfully ");
					}else{
						$status = array("status"=>200,"data"=>"Password Could not be reset");
					}
				}else{
					$status = array("status"=>200,"data"=>"New password and Confirm password does not match");
				}	
			}
		}else{
			$status = array("status"=>200,"data"=>"Invalid user account details SELECT User_email_address, User_password, User_old_password,User_id FROM Bsh_users WHERE User_email_address='$Email' AND User_password='$md5Oldpass'");
		}
	}else{
		$status = array("status"=>200,"data"=>"Please provide all require fields");
	}	
	return $status;
}

function setEvent($EventName,$EventDescription,$Date,$Time,$Diet,$Creative,$isPaid,$Price,$Attendee,$created_By_Id,$company_Token){
	if(!empty($EventName) && !empty($EventDescription) && !empty($Date) && !empty($Time) && !empty($Creative) && !empty($isPaid) && !empty($Attendee) && !empty($created_By_Id) && !empty($company_Token)){
			$status = array("status"=>100,"data"=>"Lets create Event");		
			
			$createEvent =  queryMysql("INSERT INTO Bsh_events (BsEv_name,BsEv_description,BsEv_date_of_event,BsEv_time,BsEv_diet_specific,BsEv_creative,BsEv_paid,BsEv_no_attendee,BsEv_price,BsEv_companyIDFK,BsEv_create_ByFK) VALUES()");
			if($createEvent){
				
			}
	}else{
			$status = array("status"=>100,"data"=>"Please provide all require fields.");	
	}
	return $status;
}
class addMember{
	
}

function checkCompanyToken($token){
	$tokenCheck =  queryMysql("SELECT Comp_token FROM Bsh_companies WHERE Comp_token = '$token'");
	if($tokenCheck->num_rows > 0){
		return true;
	}else{
		return false;
	}
}
function CompanyTokenizer($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
