<?php
  class Sesion {
    private $id;
    public $email;
    public $name;
    public $address;
    public $age;
    public $phone;
    public $role;

    /**
     * Initial instance 
     * @param int $id
     * @param string $email
     * @param string $name
     * @param string $address
     * @param int $age
     * @param string $phone
     * @param int $role
     */
    public function __construct($id = 0, $email = '', $name = '', $address = '', $age = 0, $phone = '', $role = 0) {
      $this->id = $id;
      $this->email = $email;
      $this->name = $name;
      $this->address = $address;
      $this->age = $age;
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
  }