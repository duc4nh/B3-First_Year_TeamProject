<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->
  
<?php
$email = $_POST['regemail'];
$pass1 = $_POST['regpass1'];
$pass2 = $_POST['regpass2'];
$firstname = $_POST['refirstname'];
$lastname = $_POST['relastname'];

include('config.php');
$result = mysql_query("SELECT * FROM users WHERE email = '$email' ");
$numrows = mysql_num_rows($result);
if (!preg_match('/^[a-zA-Z\" "]*$/', $firstname) 
    || !preg_match('/^[a-zA-Z\" "]*$/', $lastname)
    || !preg_match("~^(\w|\\-|\\.){1,}@(([a-z]|[A-Z]|\\-)*\\.?)*\\.([a-z]|[A-Z]|\\-){1,4}$~", $email)
    || $pass1!=$pass2)
    {
      echo "<h2>Sorry. Your inputs are invalid!</h2>";
      echo "Click <a href='registerForm.php'>here</a> to try again.";
    }  
    else 
      if($numrows != 0)
      {
        echo "<h2>Sorry. User email is already in use.</h2>";
        echo "Click <a href='registerForm.php'>here</a> to try again.";
      }
      else
      {
        mysql_query("INSERT into users (email, password, name, last_name) values('$email','$pass1','$firstname','$lastname')") or die (mysql_error());
        echo "<h2>Thank you!!! You have sucessfully registered</h2>";
        echo "Please log in, on the top of the page";
      }
?>
  
  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
