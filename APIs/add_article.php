<?php
include("connection.php");

if(isset($_POST["name"]) && $_POST["name"] != ""){
    $name = $_POST["name"];
}else{
    $response = [];
    $response["success"] = false;   
    echo json_encode($response);
    return; 
}

$author = $_POST["author"];
$location = $_POST["location"];


$query = $mysqli->prepare("INSERT INTO articles(name, author, location) VALUES (?, ?, ?)");
$query->bind_param("sss", $name, $author, $location);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

