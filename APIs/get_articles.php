<?php 
include("connection.php");

if(isset($_GET["idz"])){
    $id = $_GET["idz"];
}else{
    die("Don't try to mess around bro ;) ");
}

$query = $mysqli->prepare("Select * from articles WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();

$array = $query->get_result();
$response = [];
while($article = $array->fetch_assoc()){
    $response[] = $article;
}

echo json_encode($response);


