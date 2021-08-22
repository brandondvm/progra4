<?php
  include "Model/connection.php";
  
  class Login {
    private $username;
    private $password;

    /**
     * Initial instance 
     * @param string $username
     * @param string $password
     */
    public function __construct($username = '', $password = '') {
      $this->username = $username;
      $this->password = $password;
    }

    /**
     * Check if user on login has the correct credentials
     * @return boolean TRUE if credentials are correct
     */
    public function login() {
      $encryptedPassword = md5($this->password);
      $sql = "SELECT * FROM usuarios WHERE usuarioCorreo='{$this->username}' AND usuarioPassword='{$encryptedPassword}'";
      $pdo = new Connection();
      $pdo = $pdo->open();
      $rows = $pdo->query($sql);
      $result = $rows->fetch();
      $user = new Sesion($result['usuarioId'], $result['usuarioCorreo'], $result['usuarioNombre'], $result['usuarioDireccion'], $result['usuarioEdad'], $result['usuarioTelefono'], $result['usuarioRoleId']);
      return $user;
    }
  }