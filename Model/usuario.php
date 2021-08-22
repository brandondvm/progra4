<?php
  include "Model/connection.php";
  
  class Usuario {
    private $id;
    public $email;
    public $name;
    public $address;
    public $phone;
    public $age;
    public $password;
    public $role;

    /**
     * Initial instance 
     * @param string $email
     * @param string $name
     * @param string $address
     * @param int $age
     * @param string $password
     * @param int $phone
     * @param int $role     
     * @param int $id
     */
    public function __construct($email = '', $name = '', $address = '', $age = 0, $password = '', $phone = '',  $role = 0, $id = 0) {
      $this->id = $id;
      $this->email = $email;
      $this->name = $name;
      $this->address = $address;
      $this->age = $age;
      $this->password = $password;
      $this->phone = $phone;
      $this->role = $role;
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
     * 
     * @param type $value
     */
    function setId($value){
      $this->id = $value;
    }

    /**
     * Get all users or user by ID from database
     * @return user's array
     */
    public function select($id = 0){
      $sql = "SELECT * FROM usuarios";
      if ($id) $sql .= " where usuarioId='{$id}'";

      $pdo = new Connection();
      $pdo = $pdo->open();
      $rows = $pdo->query($sql);

      $users = [];
      foreach($rows->fetchAll() as $row){     
        $users[] = new Usuario($row['usuarioCorreo'], $row['usuarioNombre'], $row['usuarioDireccion'], $row['usuarioEdad'], $row['usuarioPassword'], $row['usuarioTelefono'], $row['usuarioRoleId'], $row['usuarioId']);
      }

      return $users;
    }

    /**
     * Insert in datase a new user
     * @return boolean TRUE if user has been inserted or false otherwise
     */
    public function insert() {
      $sql = "INSERT INTO usuarios (usuarioNombre, usuarioPassword, usuarioEdad, usuarioCorreo, usuarioDireccion, usuarioTelefono, usuarioRoleId) VALUES (:name, :password, :age, :email, :address, :phone, :roleId)";
      $pdo = new Connection();
      $pdo = $pdo->open();
      $statement = $pdo->prepare($sql);
      $statement->bindValue(":name", $this->name);
      $statement->bindValue(":password", md5($this->password));
      $statement->bindValue(":age", $this->age);
      $statement->bindValue(":email", $this->email);
      $statement->bindValue(":address", $this->address);
      $statement->bindValue(":phone", $this->phone);
      $statement->bindValue(":roleId", $this->role);
      return $statement->execute();
    }

    /**
     * Update one product on database
     * @return boolean
     */
    public function update(){
      $sql = "UPDATE usuarios SET usuarioNombre='{$this->name}', usuarioEdad='{$this->age}', usuarioCorreo='{$this->email}', usuarioDireccion='{$this->address}', usuarioTelefono='{$this->phone}', usuarioRoleId='{$this->role}'";
      if ($this->password != "") {
        $encryptedPassword = md5($this->password);
        $sql .= ", usuarioPassword='{$encryptedPassword}'";
      }
      $sql .= " WHERE usuarioId='{$this->id}'";
      
      return Connection::query($sql);
    }

    /**
     * Delete user by ID 
     * @return boolean 
     */
    public function delete($id = 0 ){
      $query = "DELETE FROM usuarios WHERE usuarioId='{$id}'";
      return Connection::query($query);
    }
  }