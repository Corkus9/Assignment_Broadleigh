<?php
session_start(); 
require_once 'inc/functions.php';

$controllers->products()->delete_review($_GET['review']);

if (!$_SESSION['user']['admin']==null){
    redirect("admin");

}
else{
    redirect("member");
}

?>