<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html >
<head>
  <script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<title>MyUniTrader</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php session_start(); ?>
<!-- Main holder to center page -->
<div id="wrapper">
  <!-- Header information -->
  <div id="header">
    <div id="top_selection">

      <?php
      echo "Welcome!";
      ?>
    </div>
    <div id="logo">
      <a href="index.php" class="nav1"><img alt="logo" width="200" src="images/logo2.gif" /></a>
    </div>
    <div id="login_top">
      <?php
         echo "<br>Welcome to MyUniTrader !";
      ?>
    </div>
    
    <div id="menu_tab">
            <div class="left_menu_corner"></div>
                    <ul class="menu">
                         <li><a href="index.php" class="nav1">  Home </a></li>
                         <li class="divider"></li>
                         <li><a href="buying.php" class="nav2">Buying</a></li>
                         <li class="divider"></li>
                         <li><a href="selling.php" class="nav3">Selling</a></li>
                         <li class="divider"></li>
			 <?php
      			 if(!empty($_SESSION['user_id']))
			 { echo"
			 <li><a href='userpage.php?id=".$_SESSION['user_id']."' class='nav4'>My Profile</a></li>
			 <li class='divider'></li>
                         <li><a href='wishpage.php'' class='nav4'>My Wishlist</a></li>
                         <li class='divider'></li>";
			  } ?>                         
                         <li><a href="about_us.php" class="nav5">About Us </a></li>
                         <li class="divider"></li>
                         <li><a href="contact_us.php" class="nav6">Contact Us</a></li>
                         <li class="divider"></li>
                         <?php if($_SESSION) {

                  echo  "<li><a href='upload_item.php' class='nav7'>Upload item</a></li>
                         <li class='divider'></li>";
                         }
                         ?>
                    </ul>

             <div class="right_menu_corner"></div>
            </div><!-- end of menu tab -->
  </div>
  <!-- Header ends --> 
            
  <!-- Make menu Left -->
  <div id="menu">
    <h4 class="categories">CATEGORIES</h4>
    <ul>
      <li><a href="index.html">Books</a>
      <li><a href="index.html">Stationary</a>
      <li><a href="index.html">Technology</a>
      <li><a href="index.html">Music</a>
      <li><a href="index.html">Games</a>
      <li><a href="index.html">Fashion</a>
      <li><a href="index.html">Kitchen</a>
      <li><a href="index.html">Other</a>
    </ul>
<?php
include('config.php');
  
  $item1 = mysql_query("SELECT * FROM items ORDER BY item_id DESC LIMIT 1");
  while ($row = mysql_fetch_assoc($item1)) 
  {
      $item_id = $row['item_id'];
      $picture = $row['picture'];
      $price = $row['price'];
      $name = $row['name'];
      if($picture == NULL)
        $picture='http://www.tiesummit.com/wp-content/uploads/2012/10/noimage.jpg';
  }
  
  

echo "<div class='prod_box_left'>
        	<div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a href='item_page.php?id=".$item_id."'>Latest added</a></div>
                 <center><h6>".$name."</h6></center>
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' weight='94'  src='".$picture."'></a></div>
                 <div class='prod_price'><span class='price'>£".$price."</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
</div>";
random($item_id);
function random($item_id)
{

$random_item = rand (1, $item_id );
$item1 = mysql_query("SELECT * FROM items WHERE item_id = '$random_item'");
  while ($row = mysql_fetch_assoc($item1)) 
  {
     
      $item2_id = $row['item_id'];
      $picture2 = $row['picture'];
      $price2 = $row['price'];
      $name2 = $row['name'];
      if($picture2 == NULL)
        $picture2='http://www.tiesummit.com/wp-content/uploads/2012/10/noimage.jpg';
    
  
   }

if($name2 == NULL)
      {
        
        random($item_id);
        return 0;
      }
echo "<div class='prod_box_left'>
          <div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a href='item_page.php?id=".$item2_id."'>Random product</a></div>
                 <center><h6>".$name2."</h6></center>
                 <div class='product_img'><a href='item_page.php?id=".$item2_id."'><img border='0' height='94' weight='94'  src='". $picture2 ."'></a></div>
                 <div class='prod_price'><span class='price'>£".$price2."</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
</div>";

}
$item3 = mysql_query("SELECT * FROM items ORDER BY views DESC LIMIT 1");
  while ($row = mysql_fetch_assoc($item3)) 
  {
      $item3_id = $row['item_id'];
      $picture3 = $row['picture'];
      $price3 = $row['price'];
      $name3 = $row['name'];
      if($picture3 == NULL)
        $picture3='http://www.tiesummit.com/wp-content/uploads/2012/10/noimage.jpg';
  }
echo "<div class='prod_box_left'>
        	<div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a href='item_page.php?id=".$item3_id."'>Most popular</a></div>
                 <center><h6>".$name3."</h6></center>
                 <div class='product_img'><a href='item_page.php?id=".$item3_id."'><img border='0' height='94' weight='94'  src='".$picture3."'></a></div>
                 <div class='prod_price'><span class='price'>£".$price3."</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
</div>
";
  ?>  
  </div>

  <!-- Menu ends -->
  

<div id="body">
<div id="top_search">
<form method="post" action="search.php">
<input class="search_box" type="text" name="search"><input class="search_button" value="SEARCH" type="submit"/>
</form>
</div>   
</div>

<div id="body">

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
    	 echo "Incorrect password! <a href='index.php'>Click here </a> to go back to Home Page!";
    }
  }
  else
  {
    echo "The user does not exist! <a href='index.php'>Click here </a> to go back to Home Page!";
  }


}
else
{
  echo "Please enter email and password! <a href='index.php'>Click here </a> to go back to Home Page!";
}
include('footer.php');
?>
