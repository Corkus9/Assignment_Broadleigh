<?php session_start(); ?>

<?php require __DIR__ . "/inc/header.php"; ?>
   
<div class="container w-100">
  <div class ="col-12 col-md-6">
<h1>Our Products!</h1>

<p>In this display we show all of our current flowers, this will be updated each season!</p>
</div>
<div class="col-12 col-md-6">
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
<div class ="row">

<?php
 require_once './inc/functions.php'; //Make sure the function php file is there
 if (isset($_GET['Search'])){
  $products =$controllers->products()->get_all_products_search($_GET['Search']);
  
 } else {
  $products =$controllers->products()->get_all_products();//Retrieve all products from the get_all_products from the ProductController and store in $products
 }
 foreach ($products as $product) {//For each product in $product
   echo '<div class="col-12 col-md-6 col-lg-3 px-2"><div class ="card"><img src="'.$product['image'] .'"class="card-img-top img-responsive" style ="height: 300px" alt="Card image cap"><div class="card-body"><h5 class="card-title">'. $product['name'].'</h5><p class="card-text">' .$product['description'] .'</p><p class="card-text"><small class="text-muted">'.$product['price'].'</small></p><a href="ProductView.php?Product='. $product['id'] .'" class="btn btn-primary">Details</a></div></div></div>';
 }
?>
   </div>
</div>
   


<?php require __DIR__ . "/inc/footer.php"; ?>
