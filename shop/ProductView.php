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
   
   <div class="container w-100">
        <div class="row w-100">
            <div class="col-12 col-md-6 row mx-auto border border-dark">
                <img src="<?php echo $product['image']?>" class="img-fluid">
            </div>
            <div class="col-12 col-md-6 row mx-auto px-0">
                <div class="col-12 border border-dark">
                        <h1><?php echo $product['name']?></h1>
                </div>
                <div class="col-6 border border-dark d-flex justify-content-center">
                    <text class="text-muted align-self-center">£<?php echo $product['price']?></text>
                </div>
                <div class="col-6 border border-dark d-flex justify-content-center">
                    <button class="btn btn-primary align-self-center">Buy</button>
                </div>
                <div class="col-12 border border-dark">
                <?php echo $product['description']?>
                </div>
            </div>
        </div>
        <div class="row w-100">
            <div class="col-2 border border-dark d-flex justify-content-center">
                <select class="form-select align-self-center" aria-label="Rating select">
                    <option selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col-8 border border-dark">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-2 border border-dark d-flex justify-content-center">
                <button class="btn btn-primary align-self-center" onclick="">Submit</button>
            </div>
        </div>
        <div class="row w-100 d-flex">
            <div class="col-2 border border-dark d-flex justify-content-center">
                <h3 class="align-self-center">STARS</h3>
            </div>
            <div class="col-8 border border-dark align-self-center">
                Review Text Review Text Review Text Review Text Review Text Review Text Review Text Review Text Review Text Review Text Review Text
            </div>
            <div class="col-2 border border-dark d-flex justify-content-center">
                <text class="text-muted align-self-center">
                    DATE
                </text>
            </div>
        </div>
    </div>    
   


<?php require __DIR__ . "/inc/footer.php"; ?>
