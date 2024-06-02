<?php
session_start(); 
require_once 'inc/functions.php';

$controllers->products()->delete_product($_GET['product']);
redirect('admin')

?>