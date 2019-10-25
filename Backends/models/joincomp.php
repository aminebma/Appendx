

<?php

class joincomp {


  private $conn;
  private $table = 'user';
  // Properties
  public $id;
  public $nom;
  public $is_active;
  // Constructor with DB
  public function __construct($db) {
   $this->conn = $db;
}


public function read_singlee(){
  // Create query
  $query = 'SELECT * FROM user order by RAND() LIMIT 2';

    //Prepare statement
    $stmt = $this->conn->prepare($query);
    // Bind ID
    $this->id = htmlspecialchars(strip_tags($this->id));
    $this->nom = htmlspecialchars(strip_tags($this->nom));



    // Execute query
    $stat=$stmt->fetchAll(PDO::FETCH_ASSOC);

   // set properties
   return json_encode($stat);

}





 ?>
