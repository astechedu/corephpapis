<?php
//header("Content-Type:application/json");
include_once '../Config/Database.php';

$pdo = new Database();
$pdo->getConnection();

//print_r($_POST);

$data = json_decode(file_get_contents("php://input"));
//print_r($data);
$user_id = $data->user_id;   
$user_pass = $data->user_pass;
$email = $data->email;

//echo $user_id = isset($_POST['user_id'])? $_POST['user_id'] : ''; 
//echo $user_pass = isset($_POST['user_pass'])? $_POST['user_pass'] : '';
//echo $email = isset($_POST['email'])? $_POST['email'] : '';

if($pdo->create($user_id, $user_pass, $email)){
   echo json_encode("Data successfully inserted");
}else{
   echo json_encode("Data not inserted");
}

?>