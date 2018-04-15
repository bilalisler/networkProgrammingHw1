<?php

include "Connection.php";


$dbconfig =  array(
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'dbname' => 'networkProgramming',
    'username' => 'root',
    'password' => 'root'
);

$id = $_GET["lessonId"];

$database = new DBConnection($dbconfig); 
$sqlSelect = "select * from lessons where id = " . $id; 

$rows = $database->getQuery($sqlSelect);  


if(@$_GET["returnType"] == "xml"){

function array2xml($array, $xml = false){

    if($xml === false){
        $xml = new SimpleXMLElement('<result/>');
    }

    foreach($array as $key => $value){
        if(is_array($value)){
            array2xml($value, $xml->addChild($key));
        } else {
            $xml->addChild($key, $value);
        }
    }

    return $xml->asXML();
}
  

$xml = array2xml($rows, false);
 
print($xml);

}else{
	echo json_encode($rows);
}


