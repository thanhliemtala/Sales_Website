<?php
require_once('models/connection.php');
class Product
{
    public $id;
    public $product_name;
    public $product_price;
    public $product_note;
    public $product_subcategory;
    public $image_path;
    public $types;
    public $color;
    public $style;

    public function __construct($id, $product_name, $image_path, $product_note, $product_subcategory, $product_price, $types, $color, $style)
    {
        $this->id = $id;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->product_note = $product_note;
        $this->product_subcategory = $product_subcategory;
        $this->image_path = $image_path;
        $this->types = $types;
        $this->color = $color;
        $this->style= $style;
    }

    static function getAll()
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['product_name'],
                $product['image_path'],
                $product['product_note'],
                $product['product_subcategory'],
                $product['product_price'],
                $product['types'],
                $product['color'],
                $product['style']
            );
        }
        return $products;
    }
    static function getAlltypes($types)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE types = '$types'");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['product_name'],
                $product['image_path'],
                $product['product_note'],
                $product['product_subcategory'],
                $product['product_price'],
                $product['types'],
                $product['color'],
                $product['style']
            );
        }
        return $products;
    }
    static function get($id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE id = $id");
        $result = $req->fetch_assoc();
        $product = new Product(
            $result['id'],
            $result['product_name'],
            $result['image_path'],
            $result['product_note'],
            $result['product_subcategory'],
            $result['product_price'],
            $result['types'],
            $result['color'],
            $result['style']
        );
        return $product;
    }

    static function getDataAt($types, $id)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM product WHERE (id = $id AND types = '$types')");
        $result = $req->fetch_assoc();
        $product = new Product(
            $result['id'],
            $result['product_name'],
            $result['image_path'],
            $result['product_note'],
            $result['product_subcategory'],
            $result['product_price'],
            $result['types'],
            $result['color'],
            $result['style']
        );
        return $product;
    }

    static function insert($id, $product_name, $product_price, $product_note, $product_subcategory, $image_path, $type, $color, $style)
    {
        $db = DB::getInstance();
        $req = $db->query(
            "INSERT INTO product (id, product_name, image_path, product_note, product_subcategory, product_price, types, color, style)
             VALUES ('$id', '$product_name', '$image_path', '$product_note', '$product_subcategory', $product_price, '$type', '$color', '$style');");
        return $req;
    }
    static function delete($id)
    {
        $db = DB::getInstance();
        $req = $db->query("DELETE FROM product WHERE id = '$id'");
        return $req;
    }
    static function update($id, $product_name, $product_price, $product_note, $product_subcategory, $image_path, $types, $style, $color)
    {
        $db = DB::getInstance();
        $req = $db->query(
            " UPDATE product
              SET product_name = '$product_name', product_price = $product_price, product_note = '$product_note', product_subcategory = '$product_subcategory', image_path = '$image_path', types = '$types', style = '$style', color = '$color'
              WHERE id = $id
            ;");
    }
    static function search($keyword) {
        $searchKeyword = "%" . $keyword . "%";
        $db = DB::getInstance();
        $req = $db->query(
            " SELECT * FROM product WHERE product_name LIKE '$searchKeyword' OR product_note LIKE '$searchKeyword' OR product_subcategory LIKE '$searchKeyword'
            ;");
        $products = [];
        foreach ($req->fetch_all(MYSQLI_ASSOC) as $product)
        {
            $products[] = new Product(
                $product['id'],
                $product['product_name'],
                $product['image_path'],
                $product['product_note'],
                $product['product_subcategory'],
                $product['product_price'],
                $product['types'],
                $product['color'],
                $product['style']
            );
        }
        return $products;
    }

}
?>