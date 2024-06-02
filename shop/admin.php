<?php 
    session_start(); 
    require_once 'inc/functions.php';



    


    if (!isset($_SESSION['user']))
    {
        redirect('login', ["error" => "You need to be logged in to view this page"]);
    }

    else if (($_SESSION['user']['admin'])==null)
    {
        redirect('login', ["error" => "Log in on an admin account to view this page."]);
    }

    $members =$controllers->members()->get_all_members();
    $reviews =$controllers->products()->get_all_reviews();
    $products =$controllers->products()->get_all_products();

    $title = 'Member Page'; 
    require __DIR__ . "/inc/header.php"; 
?>

<div class="container">
            <div class="row">
                <div class="row">
                    <h2>Admin Details</h2>
                </div>
                <form action="AccountUpdate.php" method="post">
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        Name : 
                    </div>
                    <div class="col-8">
                        <input type="text" value="<?php echo $_SESSION['user']['firstname']?>" name="Name">
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        Surname : 
                    </div>
                    <div class="col-8">
                        <input type="text" value="<?php echo $_SESSION['user']['lastname']?>" name="Lastname">
                    </div>
                    </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-2">
                        Email : 
                    </div>
                    <div class="col-8">
                        <input type="text" value="<?php echo $_SESSION['user']['email']?>" name="Email">
                    </div>
                </div>
                    <div class="row d-flex">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
            <div class="row mt-5">
                <div class="row">
                    <h2>User Accounts</h2>
                </div>
                <div class="row">
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date Created</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($members as $member){
                                echo'<tr>
                                <th scope="row">' . $member['firstname'] .' '. $member['lastname'].' </th>
                                <th>'. $member['email'].'</th>
                                <th>'. $member['createdOn'].'</th>
                                <th><a href="deleteuser.php?user='. $member['id'] .'">DELETE</a></th>
                            </tr>';} ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-5">
                <div class="row">
                    <h2>User Reviews</h2>
                </div>
                <div class="row">
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Review Text</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Date</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach($reviews as $review){
                                echo'<tr>
                                <th scope="row">' . $review['name'].' </th>
                                <th>'. $review['review_text'].'</th>
                                <th>'. $review['review_rating'].'</th>
                                <th>'. $review['modifiedOn'].'</th>
                                <th><a href="deletereview.php?review='. $review['id'] .'">DELETE</a></th>
                            </tr>';} ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-5">
                <div class="row">
                    <h2>Products</h2>
                </div>
                <div class="row">
                    <a href="createproduct.php">Create</a>
                </div>
                <div class="row">
                    <table class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach($products as $product){
                                echo'<tr>
                                <th scope="row">' . $product['name'].' </th>
                                <th>'. $product['description'].'</th>
                                <th>'. $product['price'].'</th>
                                <th>'. $product['modifiedOn'].'</th>
                                <th><a href="editproduct.php?product='. $product['id'] .'">EDIT</a></th>
                                <th><a href="deleteproduct.php?product='. $product['id'] .'">DELETE</a></th>
                            </tr>';} ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </body>
</html>


<?php require __DIR__ . "/inc/footer.php"; ?>