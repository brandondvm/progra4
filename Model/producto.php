<?php
  include "Model/connection.php";
  
  class Producto {
    private $id;
    public $name;
    public $description;
    public $stock;
    public $price;

    /**
     * Initial instance 
     * @param string $name
     * @param string $description
     * @param int $stock
     * @param int $price
     * @param int $id
     */
    public function __construct($name = '', $description = '', $stock = 0, $price = 0, $id = 0) {
      $this->name = $name;
      $this->description = $description;
      $this->stock = $stock;
      $this->price = $price;
      $this->id = $id;
    }

    /**
     * 
     * @param type $value
     */
    function setId($value){
      $this->id = $value;
    }

    /**
     * Get all products or product by ID from database
     * @return productos's array
     */
    public function select($id = 0){
      $sql = "SELECT * FROM productos";
      if ($id) $sql .= " where id='{$id}'";

      $pdo = new Connection();
      $pdo = $pdo->open();
      $rows = $pdo->query($sql);

      $productos = [];
      foreach($rows->fetchAll() as $row){        
        $productos[] = new Producto($row['name'], $row['description'], $row['stock'], $row['price'], $row['id']);
      }

      return $productos;
    }

    /**
     * Get all products or product by name from database
     * @return productos's array
     */
    public function selectProductsByName($name = ""){
      $sql = "SELECT * FROM productos";
      if ($name) $sql .= " WHERE name LIKE '%{$name}%'";

      $pdo = new Connection();
      $pdo = $pdo->open();
      $rows = $pdo->query($sql);

      $productos = [];
      foreach($rows->fetchAll() as $row){        
        $productos[] = new Producto($row['name'], $row['description'], $row['stock'], $row['price'], $row['id']);
      }

      return $productos;
    }

    /**
     * Insert in datase a new product
     * @return boolean TRUE if product has been inserted or false otherwise
     */
    public function insert() {
      $sql = "INSERT INTO productos (name, description, stock, price) VALUES (:name, :description, :stock, :price)";
      $pdo = new Connection();
      $pdo = $pdo->open();
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":name", $this->name);
      $statement->bindValue(":description", $this->description);
      $statement->bindValue(":stock", $this->stock);
      $statement->bindValue(":price", $this->price);
      return $statement->execute();
    }

    /**
     * Update one product on database
     * @return boolean
     */
    public function update(){
      $sql = "UPDATE productos SET name='{$this->name}', description='{$this->description}', stock='{$this->stock}', price='{$this->price}' WHERE id='{$this->id}'";
      return Connection::query($sql);
    }

    /**
     * Get sprecific attribute
     * @param string $attribute
     * @return attribute
     */
    public function getElement($attribute){
      return $this->$attribute;
    }

    /**
     * Delete product by ID 
     * @return boolean 
     */
    public function delete($id = 0 ){
      $query = "DELETE FROM productos WHERE id='{$id}'";
      return Connection::query($query);
    }
  }
