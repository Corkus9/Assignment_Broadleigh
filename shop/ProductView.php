<?php session_start(); ?>
<?php require __DIR__ . "/inc/header.php"; ?>
   
<?php
 require_once './inc/functions.php';
 if (isset($_GET['Product'])){
  $product = $controllers->products()->get_product_by_id((int)$_GET['Product']);

 } else {
  redirect('products');
 }
?>
   
<div class ="container w-100">
<div class="row">
<?php echo '<h1>'. $product['name'] .''. $product[' description'] .'</h2>' ?>

</div>
</div>
   


<?php require __DIR__ . "/inc/footer.php"; ?>
