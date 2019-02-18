<?php
require_once('nusoap/lib/nusoap.php');
function callFunc($funcName,$inputArray){
$connector = new nusoap_client("http://decimal-dev.co.za/bsh_experience/includes/controller/configSoap.php?wsdl");
	$error = $connector->getError();
	if(!$error){
		$statusNull = $connector->getError();
		if($statusNull) {
			$dataResult = array("status"=>"200","data"=>"Error connecting to wsdl file.");
		}else{
		$result = $connector->call($funcName, $inputArray);
		if(!$result->fault) {
		        $dataResult = $result;
			}else{
				$dataResult = array("status"=>"200","data"=>"Error occuring calling function $$funcName");  	
			}
		}	
	}else{
		$dataResult = array("status"=>"200","data"=>"Error connecting to wsdl file.");
	}
	return $dataResult;
}
?>