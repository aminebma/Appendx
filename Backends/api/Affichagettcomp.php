<?php
header('Content-Type: application/json ');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once ".././config/Database.php";
include_once ".././models/ensemble_competences.php";



//  DB & connect
$Database = new Database();
$db = $Database->connect();

$ensemble_competences = new ensemble_competences($db);

            $results=$ensemble_competences->read();
            echo json_encode(json_decode($results));






?>
