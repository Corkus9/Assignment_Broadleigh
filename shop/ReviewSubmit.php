<?php
  session_start();
  require_once './inc/functions.php';
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $ReviewText = $_POST['Review_Text'];
    $ReviewRating = (int)$_POST['Rating'];
    var_dump($_POST);
    $args= ['ProductID' => (int)$_GET['Product'],'CustomerID ' => $_SESSION['user']['id'], 'ReviewText' => $ReviewText, 'ReviewRating' => $ReviewRating];
    var_dump($args);
    echo $_SESSION['user']['id'];
    //$controllers ->reviews()->create_review($args);

  }
  ?>