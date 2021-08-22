<?php
  include "Model/connection.php";
  include "Model/producto_carrito.php";
  
  class Orden {
    private $id;
    public $date;
    public $address;
    public $usuarioId;

    /**
     * Initial instance 
     * @param Date $date
     * @param string $address
     * @param int $usuarioId
     * @param int $id
     */
    public function __construct($date = '', $address = '', $usuarioId = 0, $id = 0) {
      $this->date = $date;
      $this->address = $address;
      $this->usuarioId = $usuarioId;
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
     * Get order by ID
     * @return orders
     */
    public function select($id = 0){
      $sql = "SELECT * FROM orden where id='{$id}'";

      $pdo = new Connection();
      $pdo = $pdo->open();
      $rows = $pdo->query($sql);

      $orders = [];
      foreach($rows->fetchAll() as $row){        
        $orders[] = new Orden($row['fecha'], $row['direccion'], $row['usuarioId'], $row['id']);
      }

      return $orders;
    }

    /**
     * Get all orders by usuarioId
     * @return orders's array
     */
    public function selectByUserId($id = 0){
      $sql = "SELECT * FROM orden";
      if ($id) $sql .= " where usuarioId='{$id}'";

      $pdo = new Connection();
      $pdo = $pdo->open();
      $rows = $pdo->query($sql);

      $orders = [];
      foreach($rows->fetchAll() as $row){        
        $orders[] = new Orden($row['fecha'], $row['direccion'], $row['usuarioId'], $row['id']);
      }

      return $orders;
    }

    /**
     * Get all products from an order by ID
     * @return orders's prodcutos array
     */
    public function selectOrderProducts($id = 0){
      $sql = "SELECT P.id, name, price, cantidad FROM orden_x_producto OXP
        LEFT JOIN productos P on P.id = OXP.productoId
        WHERE ordenId = {$id}";

      $pdo = new Connection();
      $pdo = $pdo->open();
      $rows = $pdo->query($sql);

      $productos = [];
      foreach($rows->fetchAll() as $row){        
        $productos[] = new ProductoCarrito($row['id'], $row['name'], $row['price'], $row['cantidad'], 0);
      }

      return $productos;
    }

    /**
     * Insert in datase a new product
     * @return int new order id created
     */
    public function insert() {
      $sql = "INSERT INTO orden (fecha, direccion, usuarioId) VALUES (:fecha, :direccion, :usuarioId)";
      $pdo = new Connection();
      $pdo = $pdo->open();
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":fecha", $this->date);
      $statement->bindValue(":direccion", $this->address);
      $statement->bindValue(":usuarioId", $this->usuarioId);
      $statement->execute();
      $result = $pdo->lastInsertId();
      return $result;
    }

    /**
     * Insert in datase a new product
     * @return boolean TRUE if order has been inserted or false otherwise
     */
    public function insertOrdenProducto($ordenId = 0, $productoId = 0, $cantidad = 0) {
      $sql = "INSERT INTO orden_x_producto (ordenId, productoId, cantidad) VALUES (:ordenId, :productoId, :cantidad)";
      $pdo = new Connection();
      $pdo = $pdo->open();
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":ordenId", $ordenId);
      $statement->bindValue(":productoId", $productoId);
      $statement->bindValue(":cantidad", $cantidad);
      return $statement->execute();
    }

    /**
     * Get specific attribute
     * @param string $attribute
     * @return attribute
     */
    public function getElement($attribute){
      return $this->$attribute;
    }
  }
