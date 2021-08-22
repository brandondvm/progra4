<?php
  
  class ProductoCarrito {
    private $id;
    public $name;
    public $price;
    public $cantidad;
    public $stock;

    /**
     * Initial instance 
     * @param int $id
     * @param string $name
     * @param int $price
     * @param int $cantidad
     * @param int $stock
     */
    public function __construct($id = 0, $name = '', $price = 0, $cantidad = 0, $stock = 0) {
      $this->id = $id;
      $this->name = $name;
      $this->price = $price;
      $this->cantidad = $cantidad;
      $this->stock = $stock;
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
