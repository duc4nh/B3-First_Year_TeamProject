<html>
<head>
<title> register </title>
</head>

<body>
<?php
$email = $_POST['regemail'];
$pass1 = $_POST['regpass1'];
$pass2 = $_POST['regpass2'];

include('config.php');
$result = mysql_query("SELECT * FROM users WHERE email = '$email' ");
$numrows = mysql_num_rows($result);
if(!preg_match("~^(\w|\\-|\\.){1,}@(([a-z]|[A-Z]|\\-)*\\.?)*\\.([a-z]|[A-Z]|\\-){1,4}$~", $email))
{
  echo "Your e-mail is invalid";
}

else 
  if($pass1!=$pass2)
  {
    echo "Passwords do not match";
  }
  
  else 
  {
    if($numrows != 0)
    {
      echo "User email is already in use";
    }
  
    else
    {

      

      mysql_query("INSERT into users (email, password) values ('$email','$pass1')") or die (mysql_error());

      echo "<h1>you have registered sucessfully</h1>";
      echo "<a href='index.php'>go to login page</a>";

    }
  }
?>
</body>
</html>
