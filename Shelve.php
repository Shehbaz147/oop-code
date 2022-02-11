<?php
require_once 'Dimensions.php';
require_once 'Product.php';

class Shelve extends Dimensions
{
    private $shelveProducts = [];

    private $allProducts = [];

    private $productObj;

    public function __construct()
    {
        $this->productObj = new Product();
    }

    public function add($width = 2000, $height = 1000, $depth = 210)
    {
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setDepth($depth);
    }

    public function addProduct()
    {
        $product = $this->productObj->getProducts();

        $product = $product[0];

        $this->productObj->setProperties($product['name'], $product['width'],$product['height'],$product['depth'],$product['type'],$product['price']);


    }

    public function validate()
    {
        
    }

    public function cost_all_products()
    {
        
    }

    public function cost_all_product_by_type()
    {
        
    }
}