<?php
session_start(); 
require_once 'inc/functions.php';
require __DIR__ . "/inc/header.php";

if($_SERVER['REQUEST_METHOD']== 'POST') {
$args =        ['id' => $_GET['product'],
              'name' => $_POST['name'],
               'description' => $_POST['description'],
               'price' => $_POST['price']];

$controllers->products()->update_product($args);
redirect('admin');
} 
else{
    redirect('admin');
}
?>