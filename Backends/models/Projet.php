<?php


  class Projet {


    private $conn;
    private $table = 'projet';
    // Properties
    public $id;
    public $user_id;
    public $title;
    public $description;
    public $pays;
    public $ville;
    public $is_remunere;
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
            WHERE id = ?
            LIMIT 0,1';
            //Prepare statement
            $stmt = $this->conn->prepare($query);
            // Bind ID
            $stmt-> bindParam(':id', $this->id);
            $stmt-> bindParam(':user_id', $this->user_id);
            $stmt-> bindParam(':title', $this->title);
            $stmt-> bindParam(':description', $this->description);
            $stmt-> bindParam(':pays', $this->pays);
            $stmt-> bindParam(':ville', $this->ville);

            // Execute query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // set properties
            $this->id = $row['id'];
            $this->user_id = $row['user_id'];
            $this->title = $row['title'];
            $this->description = $row['description'];
            $this->pays = $row['pays'];
            $this->ville = $row['ville'];
            $this->is_remunere = $row['is_remunere'];
        }

        // Create admin
        public function create() {
          // Create Query
          $query = 'INSERT INTO ' .
            $this->table . '(user_id , title,description, pays, ville, is_remunere) VALUES(?,?,?,?,?,?)';
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->pays = htmlspecialchars(strip_tags($this->pays));
        $this->ville = htmlspecialchars(strip_tags($this->ville));
        // Bind data
        $stmt-> bindParam('1', $this->user_id);
        $stmt-> bindParam('2', $this->title);
        $stmt-> bindParam('3', $this->description);
        $stmt-> bindParam('4', $this->pays);
        $stmt-> bindParam('5', $this->ville);
        $stmt-> bindParam('6', $this->is_remunere);
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
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
      // Prepare Statement
      $stmt = $this->conn->prepare($query);
      // clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      // Bind Data
      $stmt-> bindParam(':id', $this->id);
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
