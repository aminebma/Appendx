<?php
header('Content-Type: application/json ');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
session_start();
include_once "../../config/Database.php";
include_once "../../models/User.php";




//  DB & connect
$Database = new Database();
$db = $Database->connect();
$User = new Utilisateur($db);

$data = json_decode(file_get_contents('php://input'));



$User->pseudo = $data->{'pseudo'};
$User->password = base64_decode($data->{'password'});

if(empty($User->pseudo) || empty($User->password))
{
      $message = '<alert>All fields are required</alert>';
}
    else
          {
          if($User->isAlreadyExist() == false  || $User->isOn()  == false ) {

              echo json_decode(json_encode($type),true);

              }
                  else {
                          $id=$User->getId();

                            $_SESSION["pseudo"] = $User->pseudo;
                            $_SESSION["id"]= $id;
                            $User->id=$id;

                            echo json_encode(json_decode($User->id));
                            }else {

                                                  $type="No one";


                          }



                  }


}


?>
