<html>
<head>
<title> register </title>
</head>

<body>
<?php

$result = mysql_query("SELECT * FROM names WHERE `name` = '".$_GET['regname']."'");

if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",
$_GET["regemail"]))
{
  echo "Your e-mail is invalid"
}

else if($_GET["regpass1"]!=$_GET["regpass2"])
  {
    echo "Passwords do not match"
  }
  
  else if(!mysql_numrows($result))
  {
    echo "User name is already in use"
  }
  
  else
  {

  $conn= mysql_connect("ramen.cs.man.ac.uk", "12_COMP10120_B3", "jIho9xRbbSbPvcIC")
  or die('Could not connect: ' . mysql_error());

  mysql_select_db("12_COMP10120_B3",$conn);

  $sql="insert into users (name,email,password)values('$_GET[regname]','$_GET[regemail]','$_GET[regpass1]')";

  $result=mysql_query($sql,$conn) or die(mysql_error());


  echo "<h1>you have registered sucessfully</h1>";



  echo "<a href='index.php'>go to login page</a>";

  }
?>
</body>
</html>
