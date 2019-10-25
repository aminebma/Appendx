

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
    $stmt->bindParam('1', $this->id);
    $stmt->bindParam('2', $this->nom);
    echo "$this->nom";
    echo "$this->id";

    // Execute query
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return   $row['id'];
}
}
 ?>
