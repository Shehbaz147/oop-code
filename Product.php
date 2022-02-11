<?php
require_once 'Dimensions.php';

class Product extends Dimensions
{
    private $products = [];

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $type
     */
    private $type;

    /**
     * @var float $price
     */
    private $price;

    public function __construct()
    {
        $this->products = include 'Data.php';
    }

    /**
     * @param $name
     * Set Product Name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $type
     * Set Product Type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function setProperties($name, $width, $height, $depth, $type, $price)
    {
        $this->setName($name);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setDepth($depth);
        $this->setType($type);
        $this->setPrice($price);
    }

    public function getProducts()
    {
        return $this->products;
    }
}