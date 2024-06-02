<?php session_start(); ?>

<?php require __DIR__ . "/inc/header.php"; ?>
   
<?php
 require_once './inc/functions.php'; //Make sure the function php file is there
 $products =$controllers->products()->get_all_products(); //Retrieve all products from the get_all_products from the ProductController and store in $products
 foreach ($products as $product) {//For each product in $product
   echo '<div class="card" style="width: 18rem;"><img src="'.$product['image'] .'" class="card-img-top" alt="Card image cap"><div class="card-body"><h5 class="card-title">'. $product['name'].'</h5><p class="card-text">' .$product['description'] .'</p><p class="card-text"><small class="text-muted">'.$product['price'].'</small></p><a href="#" class="btn btn-primary">Details</a></div></div>';
 }
   //'<h1>'. $product['id'] .'</h1><h2>'. $product['name'] . '</h2>';//Output the data for the selected product
?>
   <h1>Our Products!</h1>
   <p>In this display we show all of our current flowers, this will be updated each season!</p>

<?php require __DIR__ . "/inc/footer.php"; ?>
