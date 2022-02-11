<?php
require_once 'Dimensions.php';
require_once 'Product.php';

class Shelf extends Dimensions
{
    /**
     * @var string $title
     */
    private $title;

    private $shelfProducts = [];

    public $productObj;

    public function __construct()
    {
        $this->productObj = new Product();
    }

    /**
     * @param $title
     * Set Product Title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getShelfProducts()
    {
        return $this->shelfProducts;
    }

    public function getFormattedName()
    {
        return $this->getTitle() . ' ( ' . $this->getDimensions() . ' )';
    }

    public function add($width = 2000, $height = 1000, $depth = 210)
    {
        $this->setTitle('Shelf-1');
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setDepth($depth);
    }

    public function addProduct()
    {
        if ($this->validate()) {
            $this->shelfProducts[] = [
                'id' => count($this->shelfProducts) + 1,
                'title' => $this->productObj->getTitle(),
                'type' => $this->productObj->getType(),
                'price' => $this->productObj->getPrice(),
                'width' => $this->productObj->getWidth(),
                'depth' => $this->productObj->getDepth(),
                'height' => $this->productObj->getHeight(),
            ];
            return "Product added successfully";
        }

        return 'Product dimensions are higher than shelf space';
    }

    public function validate()
    {
        $existingWidth = array_sum(array_column($this->shelfProducts, 'width'));
        $existingHeight = array_sum(array_column($this->shelfProducts, 'height'));

        $remainingWidth = $this->getWidth() - $existingWidth;
        $remainingHeight = $this->getHeight() - $existingHeight;

        if ($this->getDepth() < $this->productObj->getDepth()) {
            return false;
        }
        if ($remainingWidth >= $this->productObj->getWidth() && $remainingHeight >= $this->productObj->getHeight()) {
            return true;
        }
        return false;
    }

    public function sumOfProductPrice()
    {
        return array_sum(array_column($this->shelfProducts, 'price'));
    }

    public function cost_all_product_by_type()
    {
        $product = [];
        foreach ($this->shelfProducts as $shelfProduct) {
            if(isset($product[$shelfProduct['type']])) {
                $product[$shelfProduct['type']] += floatval($shelfProduct['price']);
            }else{
                $product[$shelfProduct['type']] = floatval($shelfProduct['price']);
            }
        }
        return $product;
    }

    public function removeProduct($id)
    {
        $products = [];
        foreach ($this->shelfProducts as $shelfProduct) {
            if($shelfProduct['id'] != $id) {
                $products[] = $shelfProduct;
            }
        }
        $this->shelfProducts = $products;
    }
}

$shelf = new Shelf();
$shelf->add();

$products = $shelf->productObj->getProducts();

$product = $products[0];
$shelf->productObj->setProperties($product['title'], $product['width'], $product['height'], $product['depth'], $product['type'], $product['price']);

echo $shelf->getFormattedName();
echo "<hr>";
echo "Adding product 1<br>";
echo $shelf->productObj->getFormattedName();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";

echo "<hr>";

$product = $products[1];
$shelf->productObj->setProperties($product['title'], $product['width'], $product['height'], $product['depth'], $product['type'], $product['price']);

echo "<hr>";
echo "Adding product 2<br>";
echo $shelf->productObj->getFormattedName();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";

echo "<hr>";

$product = $products[2];
$shelf->productObj->setProperties($product['title'], $product['width'], $product['height'], $product['depth'], $product['type'], $product['price']);

echo "<hr>";
echo "Adding product 3<br>";
echo $shelf->productObj->getFormattedName();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";
echo $shelf->addProduct();
echo "<br>";

echo "<hr>";


echo "<pre>";
echo "Total: ".count($shelf->getShelfProducts());
echo "<br>";
print_r($shelf->getShelfProducts());
echo "<hr>";

echo "Removing product (Product ID: 5) <br>";
$shelf->removeProduct(5);
echo "<hr>";

echo "Total: ".count($shelf->getShelfProducts());
echo "<hr>";
print_r($shelf->getShelfProducts());
echo "</pre>";
echo "<hr>";
echo "Total Sum of cost of products placed on shelf";
echo "<br>";
echo $shelf->sumOfProductPrice();
echo "<hr>";

echo "Total Sum of cost of products by type placed on shelf";
echo "<br>";
print_r($shelf->cost_all_product_by_type());