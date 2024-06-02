<?php
session_start(); 
require_once 'inc/functions.php';
require __DIR__ . "/inc/header.php";


if (!isset($_SESSION['user']))
    {
        redirect('login', ["error" => "You need to be logged in to view this page"]);
    }

    else if (($_SESSION['user']['admin'])==null)
    {
        redirect('login', ["error" => "Log in on an admin account to view this page."]);
    }

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $target_dor ="images/";
        $target_file =$target_dor . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false){
            $uploadOk = 1;
        } 
        else{
            echo 'This is not a valid image';
            $uploadOk = 0;
        }
        if(file_exists($target_file)){
            echo'This image already exists';
            $uploadOk = 0;
    }
    
    if($imageFileType != "webp"&& $imageFileType != "png" && $imageFileType != "jpg"&& $imageFileType != "jpeg")
    {
        echo'This is not an accepted file type';
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"]> 500000){
        echo 'This image is too big to upload';
        $uploadOk = 0;
    }

    if($uploadOk ==0){

    } else{
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $args = ["name"=> $_POST['name'],'description' =>$_POST['description'],'price' => $_POST['price'],'image' => $target_file];
        $controllers ->products()->create_product($args);
        redirect('admin');
    }

    }



?>


<div class="container w-100">
    <form method ="post" enctype="multipart/form-data">
        <div class="row w-100">
            <div class="col-12 col-md-6 row mx-auto border border-dark">
                <input type= "file" name="image" id="image">
            </div>
            <div class="col-12 col-md-6 row mx-auto px-0">
                <div class="col-12 border border-dark">
                        <h1><input type="text" name="name"></h1>
                </div>
                <div class="col-6 border border-dark d-flex justify-content-center">
                    <input type ="text" class="text-muted align-self-center"name="price">
                </div>
                <div class="col-6 border border-dark d-flex justify-content-center">
                    <button class="btn btn-success align-self-center">Save</button>
                </div>
                <div class="col-12 border border-dark">
                <input type="text" name="description">
                </div>
            </div>
            </form>
        </div>