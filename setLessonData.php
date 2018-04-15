<?php

include "Connection.php";


$dbconfig =  array(
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'dbname' => 'networkProgramming',
    'username' => 'root',
    'password' => 'root'
);

$database = new DBConnection($dbconfig); 

$id = $_GET["lessonId"];
$columnName = $_GET["columnName"];
$newData = $_GET["newData"];

if($columnName == "lessonName"){
	$sqlSelect = "UPDATE lessons SET lessonName='".$newData."' WHERE id=1"; 
}else if($columnName == "lessonCode"){
	$sqlSelect = "UPDATE lessons SET lessonCode='".$newData."' WHERE id=1"; 
}else if($columnName == "lessonDescription"){
	$sqlSelect = "UPDATE lessons SET lessonDescription='".$newData."' WHERE id=1"; 
}

$rows = $database->runQuery($sqlSelect);  
echo ($rows);
 