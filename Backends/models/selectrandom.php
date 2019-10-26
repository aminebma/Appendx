<?php

class Selectrandom {


  private $conn;
  private $table = 'User';
    private $table1 = 'user_competence';
  // Properties
  public $user_id;
  public $projet_id;
  public $nom;
  // Constructor with DB
  public function __construct($db) {
   $this->conn = $db;
}
public function Selectrandom(){
  $var=leadership ;
  if ($var==leadership) {
    $query = 'SELECT user_id
        FROM
          ' . $this->table1 . '
      WHERE designation == leadership
      LIMIT 0,1';
      //Prepare statement
      $stmt = $this->conn->prepare($query);
      // Bind ID
      $stmt-> bindParam(':user_id', $this->user_id);

      // Execute query
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      // set properties

      $this->user_id = $row['user_id'];


  }elseif ($var==php)) {
    $query = 'SELECT user_id
        FROM
          ' . $this->table1 . '
      WHERE designation == php
      LIMIT 0,1';
      //Prepare statement
      $stmt = $this->conn->prepare($query);
      // Bind ID
      $stmt-> bindParam(':user_id', $this->user_id);

      // Execute query
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      // set properties

      $this->user_id = $row['user_id'];
  }

echo "your requests are sent to your future partners ";




 ?>
