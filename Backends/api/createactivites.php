<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once ".././config/Database.php";
    include_once ".././models/Projet.php";
    include_once ".././models/User.php";
    include_once ".././models/joincomp.php";


    // Instantiate DB & connect
   $Database = new Database();

   $db = $Database->connect();

   $data = json_decode(file_get_contents('php://input'));
   var_dump($data);

   //if(isset($ses sion['id']) {

      if (isset($data->{'title'}) || isset($data->{'description'}) ||isset($data->{'$pays'})  ||isset($data->{'$ville'})  ){

var_dump($data);


            $Projet = new projet($db);
            $Projet->title=$data->{'title'};
            $Projet->description=$data->{'description'};
            $Projet->pays=$data->{'pays'};
            $Projet->ville=$data->{'ville'};
              $user_id='99';
            $Projet->user_id=$user_id;





                      if($Projet->create()) {
                              echo json_encode(
                                array('message' => 'Le projet est bien lance')
                              );


                              if (empty($data->{'tags'})){
                                $joincomp = new joincomp($db);
                                $var{'id'}=$joincomp->read_singlee();
  }else {




  }
                            } else {
                              echo json_encode(
                                array('message' => "Le projet n'est pas lancée")
                              );
                        }






	  }else {
                $p_arr=array(
                    "status" => false,
                    "message" => "Remplir votre champs",
                );
                print_r(json_encode($p_arr));
              }

/*}else {
  $Commande_arr=array(
      "status" => false,
      "message" => "you're not connected",
  );
  print_r(json_encode($Commande_arr));
}*/




 ?>
