<?php

class ReviewController {

    protected $db;

    public function __construct(DatabaseController $db)
    {
        $this->db = $db;
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

    public function get_review_by_product_id(int $id)
    {
        $sql = "SELECT * FROM product WHERE id = $id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql)->fetchAll();
    }

    public function get_all_reviews()
    {
        $sql = "SELECT * FROM review";
        return $this->db->runSQL($sql)->fetchAll();
    }
    public function get_all_user_reviews(int $id){
        $sql = "SELECT * FROM review";
        return $this->db->runSQL($sql)->fetchAll();
    }

    public function get_all_reviews_search(string $search)
    {
        $sql = "SELECT * FROM review WHERE review_text LIKE '%$search%";
        $args = ["search"=> $search];
        return $this->db->runSQL($sql)->fetchAll();
    }

    public function update_review(array $review)
    {
        $sql = "UPDATE review SET review_text = :review_text, review_rating = :review_rating";
        return $this->db->runSQL($sql, $review)->execute();
    }

    public function delete_review(int $id)
    {
        $sql = "DELETE FROM review WHERE id = :id";
        $args = ['id' => $id];
        return $this->db->runSQL($sql, $args)->execute();
    }

}

?>