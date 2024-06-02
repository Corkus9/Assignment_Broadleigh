<?php
  session_start();
  require_once './inc/functions.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fname = $_POST['Name'];
    $sname = $_POST['Lastname'];
    

   if((!$fname == null)&& (!$sname ==null))
    {
      $args = ['id' => $_SESSION['user']['id'],
              'firstname' => $fname,
               'lastname' => $sname];
               
               
               $member =$controllers->members()->update_member($args);
               //var_dump($args);
               
               redirect('login');
  } else {
   
    redirect ('admin');
  }
}