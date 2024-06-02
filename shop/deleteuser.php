<?php
session_start(); 
require_once 'inc/functions.php';

$controllers->members()->delete_member($_GET['user']);
redirect('admin')

?>