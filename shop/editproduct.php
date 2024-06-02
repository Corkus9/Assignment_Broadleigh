<?php
session_start(); 
require_once 'inc/functions.php';
require __DIR__ . "/inc/header.php";


if (isset($_GET['product'])){
    $product = $controllers->products()->get_product_by_id((int)$_GET['product']);
  
   } else {
    redirect('admin');
   }
?>


<div class="container w-100">
    <form method ="post" action="updateproduct.php?product=<?php echo$_GET['product']?>">
        <div class="row w-100">
            <div class="col-12 col-md-6 row mx-auto border border-dark">
                <img src="<?php echo $product['image']?>" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 row mx-auto px-0">
                <div class="col-12 border border-dark">
                        <h1><input type="text" value="<?php echo $product['name']?>"name="name"></h1>
                </div>
                <div class="col-6 border border-dark d-flex justify-content-center">
                    <input type ="text" class="text-muted align-self-center"value="<?php echo $product['price']?>"name="price">
                </div>
                <div class="col-6 border border-dark d-flex justify-content-center">
                    <button class="btn btn-success align-self-center">Save</button>
                </div>
                <div class="col-12 border border-dark">
                <input type="text" value="<?php echo $product['description']?>" name="description">
                </div>
            </div>
            </form>
        </div>