<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html >
<head>
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
      if(!$_SESSION) 
      {
        echo "Welcome Student!  You can Log in or <a href='registerForm.php'>Create an account</a>";
      }
      else
        echo "Welcome ".$_SESSION['name']." ".$_SESSION['last_name']."!";
      ?>
    </div>
    <div id="logo">
      <img alt="logo" width="200" src="images/logo2.gif" />
    </div>
    <div id="login_top">
      <?php
      if(!$_SESSION) 
      {
        echo 
      "<form name='login_form' action='login.php' method='post'>
        <table width='100% border='0' cellpadding='0' cellspacing='2'>
          <tr>
            <td width='1%''>Email</td>
            <td><input type='text' name='email' /></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input type='password' name='password' /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><button type='submit' name='login_btn' />Log in</button></td>
          </tr>
        </table>
      </form>";
      }
      else
      {
         echo "<img height='30' weight='30' src='".$_SESSION['picture']."' >";
         echo "Hello, ".$_SESSION['name']." ".$_SESSION['last_name']."!<br>";
         echo "<a href='logout.php'>Log out!</a>";
      }
     ?>
    </div>
    
    <div id="menu_tab">
            <div class="left_menu_corner"></div>
                    <ul class="menu">
                         <li><a href="index.html" class="nav1">  Home </a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav2">Buying</a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav3">Selling</a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav4">My Profile</a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav4">My Wishlist</a></li>
                         <li class="divider"></li>                         
                         <li><a href="about_us.php" class="nav5">About Us </a></li>
                         <li class="divider"></li>
                         <li><a href="about_us.php.html" class="nav6">Contact</a></li>
                         <li class="divider"></li>
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
    
<div class="prod_box_left">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="details.html">Item Of The Day</a></div>
                 <div class="product_img"><a href="details.html"><img border="0" title="" alt="" src="images/laptop.gif"></a></div>
                 <div class="prod_price"><span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
</div>

<div class="prod_box_left">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="details.html">Random Item</a></div>
                 <div class="product_img"><a href="details.html"><img border="0" title="" alt="" src="images/laptop.gif"></a></div>
                 <div class="prod_price"><span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
</div>

<div class="prod_box_left">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="details.html">You are watching this</a></div>
                 <div class="product_img"><a href="details.html"><img border="0" title="" alt="" src="images/laptop.gif"></a></div>
                 <div class="prod_price"><span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
</div>
    
  </div>

  
   
  
  
  <!-- Menu ends -->
