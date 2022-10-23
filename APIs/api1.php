<?php
$email = $_GET["email"];
$name = $_GET["name"];

$choice_gender = rand(0, 1);

if($choice_gender == 0){
    $gender = "male";
}else{
    $gender = "female";
}

$results = [
    "name" => $name,
    "gender" => $gender
];

echo json_encode($results);

