<?php session_start(); ?>
<?php require __DIR__ . "/inc/header.php"; ?>
<script>
  function validationForm(){
    let x = document.forms["Review"]["Rating"].value;
    let y = document.forms["Review"]["Review_Text"].value;
    if (x== ""){
      alert("Please enter a rating.");
      return false;
    }
    else if (y == ""){
      alert ("Please enter a description for your review");
      return false;
    }



  }
</script>
   
<?php
 require_once './inc/functions.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
    $ReviewText = $_POST['Review_Text'];
    $ReviewRating = (int)$_POST['Rating'];
    var_dump($_POST);
    $args= ['product_id' => (int)$_GET['Product'],'user_id' => $_SESSION['user']['id'], 'review_text' => $ReviewText, 'review_rating' => $ReviewRating];
    var_dump($args);
    echo $_SESSION['user']['id'];
    $controllers ->products()->create_review($args);

  }
 if (isset($_GET['Product'])){
  $product = $controllers->products()->get_product_by_id((int)$_GET['Product']);
  $reviews = $controllers->products()->get_review_by_product_id((int)$_GET['Product']);

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
        <form name="Review" method="post" onsubmit="return validationForm()">
        <div class="row w-100">
            <div class="col-2 border border-dark d-flex justify-content-center">
                <select class="form-select align-self-center" aria-label="Rating select" name="Rating">
                    <option selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="col-8 border border-dark">
                <input type ="text" class="form-control" id="exampleFormControlTextarea1" rows="3" name="Review_Text">
            </div>
            <div class="col-2 border border-dark d-flex justify-content-center">
                <input type="Text" value="<?php echo $product['id']?>" hidden>
                <button type="submit" class="btn btn-primary align-self-center <?php if(!isset($_SESSION['user'])){echo 'disabled';}?>">Submit</button>
            </div>
        </div>
        </form>
        <?php foreach($reviews as $review){
            echo '<div class="row w-100 d-flex">
            <div class="col-2 border border-dark d-flex justify-content-center">
                <h3 class="align-self-center">'. $review['review_rating'] .'</h3>
            </div>
            <div class="col-8 h-100 border border-dark align-self-center">
            '. $review['review_text'].'
            </div>
            <div class="col-2 border border-dark d-flex justify-content-center">
                <text class="text-muted align-self-center">
                    ' . $review['modifiedOn'] . '
                </text>
            </div>
        </div>';
        }


        
     ?> 
   


<?php require __DIR__ . "/inc/footer.php"; ?>
