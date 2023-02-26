<?php

abstract class Connection {

  public $conn;

  public function __construct()
  {
    
    try{

      $pdo = new PDO('mysql:host=localhost;dbname=upload_files', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $this->conn = $pdo;

    } catch (PDOException $e){

      echo 'CONNECTION ERROR ' . $e->getMessage();
    }
  }
}