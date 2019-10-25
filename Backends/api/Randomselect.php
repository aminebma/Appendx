<?php
header('Content-Type: application/json ');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
session_start();
include_once "../../config/Database.php";
include_once "../../models/User.php";
include_once "../../models/Project.php";
include_once "../../models/projet_competence.php";
include_once "../../models/user_competence.php";

$Database = new Database();
$db = $Database->connect();
$User = new User($db);
$Project = new Project($db);
$projet_competence = new projet_competence($db);
$user_competence = new user_competence($db);



?>
