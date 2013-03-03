<?php
include('header_menuleft.php'); 
echo "<div id='body'>
    <div id='top_search'>
      <input class='search_box' type='text'><input class='search_button' value='SEARCH' type='submit'/>
    </div>" ;
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

if($email && $password)
{
  $connect = mysql_connect("ramen.cs.man.ac.uk", "12_COMP10120_B3", "jIho9xRbbSbPvcIC") or die ("Could not connect!");
  mysql_select_db("12_COMP10120_B3", $connect) or die("Could not find db!");
  
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
      
      echo "<br />You are logged in! <a href='userpage.php?id=".$user_id."'>Click here </a> to go to your profile! ";
    }
    else
    {
    	 echo "Incorrect password!";
    }
  }
  else
  {
    die ("The user does not exist!");
  }


}
else
{
  die("Please enter email and password!");
}
echo "</div>";
include('footer.php');
?>
