<?php


  class Ensemble_Competences {


    private $conn;
    private $table = 'ensemble_competences';
    // Properties
    public $id;
    public $designation;
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
            WHERE designation = ?
            LIMIT 0,1';
            //Prepare statement
            $stmt = $this->conn->prepare($query);
            // Bind ID
            $stmt-> bindParam(':id', $this->id);
            $stmt-> bindParam(':designation', $this->designation);

            // Execute query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // set properties
            $this->id = $row['id'];
            $this->designation = $row['designation'];
        }

        // Create admin
        public function create() {
          // Create Query
          $query = 'INSERT INTO ' .
            $this->table . '(designation) VALUES(?)';
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->designation = htmlspecialchars(strip_tags($this->designation));
        // Bind data
        $stmt-> bindParam('1', $this->designation);
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
      $query = 'DELETE FROM ' . $this->table . ' WHERE designation = :designation';
      // Prepare Statement
      $stmt = $this->conn->prepare($query);
      // clean data
      $this->designation = htmlspecialchars(strip_tags($this->designation));
      // Bind Data
      $stmt-> bindParam(':designation', $this->designation);
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
