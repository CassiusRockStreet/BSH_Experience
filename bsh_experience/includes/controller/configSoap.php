<?php
require_once('nusoap/lib/nusoap.php');
require_once('functions.php');	
$server = new soap_server();
$server->configureWSDL("Decimal Agency BSH-EXPERIENCE-SOAP-API", "urn:BSH-Experience-Decimal-Agency");

// $server->soap_defencoding = 'utf-8';
// $server->soap_defencoding = 'utf-8'; 
// $server->encode_utf8 = false;
// $server->decode_utf8 = false;

// $server->encode_utf8 = false;
// $server->decode_utf8 = false;
$status = "100 for Success, 200 for not success!";

$server->configureWSDL("Decimal Agency BSH-EXPERIENCE-SOAP-API", "urn:BSH-Experience-Decimal-Agency");
$server->register("setSuperAdmin",
array("Name"=>"xsd:string(required)",
	"Surname"=>"xsd:string(required)",
	"Email"=>"xsd:string(required)",
	"Cell"=>"xsd:string(Optional)",
	"Password"=>"xsd:string(required)",
	"Company_Token"=>"xsd:string(required)",
	"IP_Address"=>"xsd:string(Optional)"),
array("status"=>"xsd:Array"),
"urn:BSH-Experience-Decimal-Agency",
"urn:BSH-Experience-Decimal-Agency#setSuperAdmin",
"rpc",
"encode",
"Function:Adding system super admin, status:$status");


$server->register("setAdmin",
array("Name"=>"xsd:string(required)",
	"Surname"=>"xsd:string(required)",
	"Email"=>"xsd:string(required)",
	"Cell"=>"xsd:string(Optional)",
	"Password"=>"xsd:string(required)",
	"Company_Token"=>"xsd:string(required)",
	"IP_Address"=>"xsd:string(Optional)",
	"Super_Admin_ID"=>"xsd:string(Require)"),
array("status"=>"xsd:Array"),
"urn:BSH-Experience-Decimal-Agency",
"urn:BSH-Experience-Decimal-Agency#setAdmin",
"rpc",
"encode",
"Function:Adding system admin, status:$status");

$server->register("setExperienceUser",
array("Name"=>"xsd:string(required)",
	"Surname"=>"xsd:string(required)",
	"Email"=>"xsd:string(required)",
	"Cell"=>"xsd:string(Optional)",
	"Password"=>"xsd:string(required)",
	"Company_Token"=>"xsd:string(required)",
	"IP_Address"=>"xsd:string(Optional)",
	"subscriber"=>"xsd:Int"),
array("status"=>"xsd:Array"),
"urn:BSH-Experience-Decimal-Agency",
"urn:BSH-Experience-Decimal-Agency#setExperienceUser",
"rpc",
"encode",
"Function:Adding system users, status:$status");

$server->register("requestAdminLogin",
array("Email"=>"xsd:string(required)",
	"Password"=>"xsd:string(required)"),
array("status"=>"xsd:Array"),
"urn:BSH-Experience-Decimal-Agency",
"urn:BSH-Experience-Decimal-Agency#requestAdminLogin",
"rpc",
"encode",
"Function:Admin login, status:$status");

$server->register("requestUserLogin",
array("Email"=>"xsd:string(required)",
	"Password"=>"xsd:string(required)"),
array("status"=>"xsd:Array"),
"urn:BSH-Experience-Decimal-Agency",
"urn:BSH-Experience-Decimal-Agency#requestUserLogin",
"rpc",
"encode",
"Function:User login, status:$status");

$server->register("requestResetUsersPassword",
array("Email"=>"xsd:string(required)",
	"OldPassword"=>"xsd:string(required)",
	"NewPassword"=>"xsd:string(required)",
	"ConfirmNewPassword"=>"xsd:string(required)"),
array("status"=>"xsd:Array"),
"urn:BSH-Experience-Decimal-Agency",
"urn:BSH-Experience-Decimal-Agency#requestResetUsersPassword",
"rpc",
"encode",
"Function:Reset user password, status:$status");

$server->register("setEvent",
array("EventName"=>"xsd:string(required)",
	"EventDescription"=>"xsd:string(required)",
	"Date"=>"xsd:string(required)",
	"Time"=>"xsd:string(required)",
	"Diet"=>"xsd:string(optional)",
	"Creative"=>"xsd:ArtworkURL(required)",
	"isPaid"=>"xsd:Int(1 is Yes 2 is No)(required)",
	"Price"=>"xsd:string(Required if isPaid is 1)",
	"Attendee"=>"xsd:string(required)",
	"created_By_Id"=>"xsd:Int(required)",
	"company_Token"=>"xsd:string(required)"),
array("status"=>"xsd:Array"),
"urn:BSH-Experience-Decimal-Agency",
"urn:BSH-Experience-Decimal-Agency#requestResetUsersPassword",
"rpc",
"encode",
"Function:Reset user password, status:$status");


$server->service(file_get_contents("php://input"));

?>