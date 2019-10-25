<?php

      header('Content-Type: application/json');
      header('Access-Control-Allow-Origin:*');
      header('Access-Control-Allow-Methods: POST');
      header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

      include_once "../../config/Database.php";
      include_once "../../models/User.php";


      $Database = new Database();
      $db = $Database->connect();


      $Utilisateur = new User($db) ;
      //convert the string of data to an array


            $data = json_decode(file_get_contents('php://input'));
            var_dump($data);


            $User->nom = $data->{'nom'};
            $User->prenom = $data->{'prenom'};
            $User->age = $data->{'age'};
            $User->pays = $data->{'pays'};
            $User->ville= $data->{'ville'};
            $User->pseudo= $data->{'pseudo'};

            $User->passwd = base64_encode($data->{'mdp'});
            $cmdp = base64_encode($data->{'cmdp'});


            if ($User->passwd==$cmdp) {

                if($User->create()){
                      $User->nom = $data->{'nom'};
                      $User->prenom = $data->{'prenom'};
                      $User->ville = $data->{'ville'};
                      $User->pays= $data->{'pays'};
                      $User->age = $data->{'age'};
                      $User->pseudo= $data->{'pseudo'};
                      $User->idU = $db->lastInsertId();

                        if ($user->create()) {
                                    $Utilisateur_arr=array(
                                        "status" => true,
                                        "message" => "Successfully Signup!",
                                        "username" => $Utilisateur->username
                                    );
                              }
                                    else{
                                          $Utilisateur_arr=array(
                                              "status" => false,
                                              "message" => "erreur",
                                              "username" => $Utilisateur->username
                                          );

                                  }

                  }else {
                    $Utilisateur_arr=array(
                        "status" => false,
                        "message" => "Username already exists!",
                        "id" => $Utilisateur->id,
                        "username" => $Utilisateur->username
                    );
                  }
                  print_r(json_encode($Utilisateur_arr));
                }
               else {
                 $Utilisateur_arr=array(
                     "status" => false,
                     "message" => "Les mots de passes saisies ne sont pas identiques",
                     "username" => $Utilisateur->username
                 );
                 print_r(json_encode($Utilisateur_arr));
            }



 ?>
