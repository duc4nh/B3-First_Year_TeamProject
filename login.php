<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>

<!-- Main body for page -->

<?php

$email = $_POST['email'];
$password = $_POST['password'];

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
       if($picture == NULL)
           $picture = 'http://www.worldofchemicals.com/Woclite/tmp/chem/no_image.gif';
    }
    if ($email == $dbemail && $password == $dbpassword)
    {
      $_SESSION['email'] = $email;
      $_SESSION['user_id'] = $user_id;
      $_SESSION['name'] = $name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['description'] = $description;
      $_SESSION['picture'] = $picture;
      
      echo "<br />You have logged in! <a href='userpage.php?id=".$user_id."'>Click here </a> to go to your profile!";
    }
    else
    {
    	 echo "Please check your details! <a href='index.php'>Click here </a> to go back to Home Page!";
    }
  }
  else
  {
    echo "Please check your details! <a href='index.php'>Click here </a> to go back to Home Page!";
  }


}
else
{
  echo "Please check your details! <a href='index.php'>Click here </a> to go back to Home Page!";
}
include('footer.php');
?>
