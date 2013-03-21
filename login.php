<!-- header and menu left -->

<?php
session_start();
include_once("functions.php"); 

$email = escape_value($_POST['email']);
$password = escape_value($_POST['password']);

if($email && $password)
{
  include('config.php'); 
  
  $query = mysql_query("SELECT * FROM users WHERE email = '$email' ");
  $numrows = mysql_num_rows($query);
  if($numrows != 0)
  {
    while ($row = mysql_fetch_assoc($query)) 
    {
    	 $dbemail = $row['email'];
    	 $dbpassword = $row['password'];
       $user_id = $row['user_id'];
       $name = $row['name'];
       $last_name = $row['last_name'];
       $description = $row['description'];
       $picture = $row['picture'];
    }
    if ($email == $dbemail && md5($password) == $dbpassword)
    {
      $_SESSION['email'] = $email;
      $_SESSION['user_id'] = $user_id;
      $_SESSION['name'] = $name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['description'] = $description;
      $_SESSION['picture'] = $picture;
      
      $message = "<br />You have logged in! <a href='userpage.php?id=".$user_id."'>Click here </a> to go to your profile!";
    }
    else
    {
    	 $message = "Please check your details! <a href='index.php'>Click here </a> to go back to Home Page!";
    }
  }
  else
  {
    $message = "Please check your details! <a href='index.php'>Click here </a> to go back to Home Page!";
  }


}
else
{
  $message = "Please check your details! <a href='index.php'>Click here </a> to go back to Home Page!";
}
?>

<?php include('header_menuleft.php');?>

<!-- Main body for page -->
<?=$message;?>
<?
include('footer.php');
?>
