<?php 
    session_start(); 
    require_once 'inc/functions.php';

    if (!isset($_SESSION['user']))
    {
        redirect('login', ["error" => "You need to be logged in to view this page"]);
    }

    $title = 'Member Page'; 
    require __DIR__ . "/inc/header.php"; 
?>

<h1>Welcome <?= $_SESSION['user']['firstname'] ?? 'Member' ?>!</h1>
<p>If you have any problems, please contact an admin.</p>

<?php echo '<pre>';
var_dump($_SESSION);
echo '</pre;';
?>

<?php require __DIR__ . "/inc/footer.php"; ?>

