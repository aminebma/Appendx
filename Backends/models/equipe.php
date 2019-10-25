<?php


  class Equipe {


    private $conn;
    private $table = 'equipe';
    // Properties
    public $id;
    public $user_id;
    public $projet_id;
    public $nom;
    public $is_active;
    // Constructor with DB
    public function __construct($db) {
     $this->conn = $db;
}


      public function read() {
      // Create query
                    $query = 'SELECT *
                    FROM
                     ' . $this->table . '';
                    // Prepare statement
                    $stmt = $this->conn->prepare($query);
                    // Execute query
                    $stat=$stmt->fetchAll(PDO::FETCH_ASSOC);
                   // set properties
                   return json_encode($stat);

      }
      // Get Single admin
        public function read_single(){
          // Create query
          $query = 'SELECT *
              FROM
                ' . $this->table . '
            WHERE nom = ?
            LIMIT 0,1';
            //Prepare statement
            $stmt = $this->conn->prepare($query);
            // Bind ID
            $stmt-> bindParam(':id', $this->id);
            $stmt-> bindParam(':nom', $this->nom);

            // Execute query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // set properties
            $this->id = $row['id'];
            $this->nom = $row['nom'];
        }

        // Create admin
        public function create() {
          // Create Query
          $query = 'INSERT INTO ' .
            $this->table . '(user_id, projet_id, nom, is_active) VALUES(?,?,?, true)';
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->projet_id = htmlspecialchars(strip_tags($this->projet_id));
        $this->nom = htmlspecialchars(strip_tags($this->nom));
        $this->is_active = htmlspecialchars(strip_tags($this->is_active));
        // Bind data
        $stmt-> bindParam('1', $this->user_id);
        $stmt-> bindParam('2', $this->projet_id);
        $stmt-> bindParam('3', $this->nom);
        $stmt-> bindParam('4', $this->is_active);
        // Execute query
        if($stmt->execute()) {
          return true;
        }
        // Print error if something goes wrong
      printf("Error: $s.\n", $stmt->error);
      return false;



  }

  // Delete user
      public function delete() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE nom = :nom';
      // Prepare Statement
      $stmt = $this->conn->prepare($query);
      // clean data
      $this->nom = htmlspecialchars(strip_tags($this->nom));
      // Bind Data
      $stmt-> bindParam(':nom', $this->nom);
      // Execute query
      if($stmt->execute()) {
      return true;
      }
      // Print error if something goes wrong
      printf("Error: $s.\n", $stmt->error);
      return false;
      }


}


?>
