<?php
  include "Model/config.php";

  class Connection {
    private $dsn;

    public function __construct() {
      $this->dsn ='mysql:host='.DB_HOST.';dbname='.DB_NAME;
    }

    public function open() {
      try {
        return new PDO($this->dsn, DB_USER, DB_PASS);
      } catch (\PDOException $ex) {
        $message = "Error en la ejecuccion: En el archivo ".__FILE__." en la clase ".__CLASS__."en la linea".__LINE__." lo siguiente ".$ex->getMessage();
        error_log($message);
        return null;
      }
    }

    public static function query($sql){
      $dsn ='mysql:host='.DB_HOST.';dbname='.DB_NAME;
      $pdo = new PDO($dsn, DB_USER, DB_PASS);
      return $pdo->query($sql);
    }
  }