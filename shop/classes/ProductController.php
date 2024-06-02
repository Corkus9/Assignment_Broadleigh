<?php

class ProductController {

    protected $db;

    public function __construct(DatabaseController $db)
    {
        $this->db = $db;
    }

    public function create_product(array $product) 
    {
        try {

            $sql = "INSERT INTO products(name, description, price, image) 
                    VALUES (:name, :description, :price, :image)"; 

            return $this->db->runSQL($sql, $product)->fetch();

        } catch (PDOException $e) {

            if ($e->getCode() == 23000) { //Could be 1062
                return false;
            }
            throw $e;
        }
    }


    public function create_review(array $review) 
    {
        try {

            $sql = "INSERT INTO review(product_id, user_id, review_text, review_rating) 
                    VALUES (:product_id, :user_id, :review_text, :review_rating)"; 

            return $this->db->runSQL($sql, $review)->fetch();

        } catch (PDOException $e) {

            if ($e->getCode() == 23000) { //Could be 1062
                return false;
            }
            throw $e;
        }
    }

    public function get_product_by_id(int $id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args)->fetch();
    }


    public function get_review_by_product_id(int $id)
    {
        $sql = "SELECT * FROM review WHERE product_id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args)->fetchAll();
    }

    public function get_all_products()
    {
        $sql = "SELECT * FROM products";
        return $this->db->runSQL($sql)->fetchAll();
    }

    public function get_all_reviews()
    {
        $sql = "SELECT * FROM review";
        return $this->db->runSQL($sql)->fetchAll();
    }

    public function get_all_products_search(string $search)
    {
        $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
        $args = ["search"=> $search];
        return $this->db->runSQL($sql)->fetchAll();
    }

    public function update_product(array $product)
    {
        $sql = "UPDATE products SET name = :name, description = :description, price = :price, iamge = :image WHERE id = :id";
        return $this->db->runSQL($sql, $product)->execute();
    }

    public function delete_product(int $id)
    {
        $sql = "DELETE FROM products WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args)->execute();
    }

}

?>