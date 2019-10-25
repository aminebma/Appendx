<?php


  class User {


    private $conn;
    private $table = 'user';
    // Properties
    public $id;
    public $nom;
    public $prenom;
    public $age;
    public $pays;
    public $ville;
    public $pseudo;
    public $passwd;
    // Constructor with DB
    public function __construct($db) {
     $this->conn = $db;
}


      public function read() {
      // Create query
                    $query = 'SELECT
                     id,
                      nom, prenom, age, pays, ville, pseudo
                    FROM
                     ' . $this->table . '
                    ORDER BY
                     nom ASC, prenom ASC, age ASC';
                    // Prepare statement
                    $stmt = $this->conn->prepare($query);

                    // Execute query
                    $stmt->execute();
                     $chauf=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    // set properties
                    return json_encode($chauf);
      }
      // Get Single user
        public function read_single(){
          // Create query
          $query = 'SELECT
                id,
                  nom, prenom, age, pays, ville, pseudo
              FROM
                ' . $this->table . '
            WHERE pseudo = ?
            LIMIT 0,1';
            //Prepare statement
            $stmt = $this->conn->prepare($query);
            // Bind ID
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->pseudo = htmlspecialchars(strip_tags($this->username));
            $stmt->bindParam('1', $this->id);
            $stmt->bindParam('2', $this->pseudo);

            // Execute query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // set properties
            $this->id = $row['id'];
            $this->pseudo = $row['pseudo'];
        }
        // Create user
        public function create() {
          if($this->isAlreadyExist()){
            return false;
        }else {
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table. " (nom,prenom,age,pays,ville,pseudo, passwd) VALUES
                    (?, ?, ?, ?, ?, ?, ?)";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nom=htmlspecialchars(strip_tags($this->nom));
        $this->prenom=htmlspecialchars(strip_tags($this->prenom));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->pays=htmlspecialchars(strip_tags($this->pays));
        $this->ville=htmlspecialchars(strip_tags($this->ville));
        $this->pseudo=htmlspecialchars(strip_tags($this->pseudo));
        $this->passwd=htmlspecialchars(strip_tags($this->passwd));

        // bind values

        $stmt->bindParam("1", $this->nom,PDO::PARAM_STR);
        $stmt->bindParam("2", $this->prenom,PDO::PARAM_STR);
        $stmt->bindParam("3", $this->age,PDO::PARAM_STR);
        $stmt->bindParam("4", $this->pseudo,PDO::PARAM_STR);
        $stmt->bindParam("5", $this->passwd,PDO::PARAM_STR);
        // execute query
        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;


}
  }
  // Update user
  public function update() {
    // Create Query
          $query = 'UPDATE
          ' . $this->table . '
          SET
            password = :passwd
            WHERE
            id = :id';
        // Prepare Statement
        $stmt = $this->conn->prepare($query);
        // Clean data
        $this->passwd = htmlspecialchars(strip_tags($this->passwd));
        // Bind data
        $stmt-> bindParam(':id', $this->id , PDO::PARAM_STR);
        $stmt-> bindParam(':passwd', $this->passwd , PDO::PARAM_STR);

        // Execute query
        if($stmt->execute() ) {
          return true;
        }
        // Print error if something goes wrong
        printf("Error: $s.\n", $stmt->error);
        return false;
  }

  // Delete user
      public function delete() {
      // Create query
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';
      // Prepare Statement
      $stmt = $this->conn->prepare($query);
      // clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      // Bind Data
      $stmt-> bindParam('1', $this->id);
      // Execute query
      if($stmt->execute()) {
      return true;
      }
      // Print error if something goes wrong
      printf("Error: $s.\n", $stmt->error);
      return false;
      }


      function isAlreadyExist(){
        $query = "SELECT *
            FROM
                " . $this->table. "
            WHERE
                pseudo='".$this->pseudo."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }

    }

  function getId() {
        $query = "SELECT id
            FROM
                " . $this->table. "
            WHERE
                pseudo='".$this->pseudo."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        if($stmt->rowCount() > 0){
          $ps=$stmt->fetchAll();
         // set properties
         return $ps['0']['0'];
        }
        else{
            return 0;
        }

  }
  public function pass() {
  // Create query
                $query = 'SELECT passwd
                FROM
                 ' . $this->table . ' WHERE id = ? ';
                // Prepare statement
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam('1', $this->id);
                // Execute query
                $stmt->execute();
                $ps=$stmt->fetchAll();
               // set properties
               return $ps;
  }

  function isOn(){
    $query = "SELECT Statu
        FROM
            " . $this->table. "
        WHERE
            pseudo='".$this->pseudo."'";
    // prepare query statement
    $stmt = $this->conn->prepare($query);
    // execute query
    $stmt->execute();
    if($stmt->rowCount() > 0){
        return true;
    }
    else{
        return false;
    }
}


}

?>
