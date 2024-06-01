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

    $title = 'Member Page'; 
    require __DIR__ . "/inc/header.php"; 
?>

<h1>Welcome <?= $_SESSION['user']['firstname'] ?? 'Member' ?>!</h1>

<?php require __DIR__ . "/inc/footer.php"; ?>