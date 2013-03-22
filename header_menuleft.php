<?php session_start(); ?>
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<? // slider begins **********************************************
if(basename($_SERVER["SCRIPT_NAME"]) == "index.php"){
?>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/css3-mediaqueries.js"></script>
<script src="js/jquery.columnizer.min.js"></script>
<!-- Lof slider -->
<script src="js/jquery.easing.js"></script>
<script src="js/lof-slider.js"></script>
<link rel="stylesheet" href="css/lof-slider.css" media="all"  /> 
<!-- ENDS slider -->
<!-- JCarousel -->
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<!-- ENDS JCarousel -->

<!-- SKIN -->
<link rel="stylesheet" media="all" href="css/skin.css"/>		
<!-- flexslider -->
<link rel="stylesheet" href="css/flexslider.css" >
		
<? } // slider ends **********************************************?>
</head>
<body>

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
        echo "Welcome, ".$_SESSION['name']."!";
      ?>
    </div>
    <div id="logo">
      <a href="index.php" class="nav1"><img alt="logo" width="200" src="images/logo2.gif" /></a>
    </div>
    <div id="login_top">
      <?php
    
      if(empty($_SESSION['name'])) 
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
      include('config.php');
      $count = 0;
      $user_id = $_SESSION['user_id'];
      $queryy=mysql_query("SELECT * FROM Trade WHERE owner_view = '0' AND owner_id ='$user_id' OR bidder_view = '0' AND bidder_id ='$user_id'");
      while($row = mysql_fetch_assoc($queryy))
      {
        $count++;
      }
         if(empty($_SESSION['picture']))
           $picture='images/no_image.jpg';
         else
    	   $picture="uploads/".$_SESSION['picture'];     
         
         echo "<div id='notification'><img height='30' width='30' src='".$picture."' >";
         echo "Hello, ".$_SESSION['name']."!
              <ul>
                <li class = 'notification-container'>
                  <i class='icon-globe'><a href='offers.php'><img src='images/mail.png'/></a></i>
                  <span class='notification-counter'>".$count."</span>
                </li>
              </ul>
               ";
         echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php'>Log out!</a></div>";

      }
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
                         <li><a href='wishpage.php' class='nav4'>My Wishlist</a></li>
                         <li class='divider'></li>";
			  } ?>                         
                         <li><a href="about_us.php" class="nav5">About Us </a></li>
                         <li class="divider"></li>
                         <li><a href="contact_us.php" class="nav6">Contact Us</a></li>
                         <li class="divider"></li>
                         <?php if($_SESSION) {

                  echo  "<li><a href='upload_item.php' class='nav7'>Add Item</a></li>
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
      <li><a href="items_by_category.php?id=1">Books</a>
      <li><a href="items_by_category.php?id=2">Stationary</a>
      <li><a href="items_by_category.php?id=3">Technology</a>
      <li><a href="items_by_category.php?id=4">Music</a>
      <li><a href="items_by_category.php?id=5">Games</a>
      <li><a href="items_by_category.php?id=6">Fashion</a>
      <li><a href="items_by_category.php?id=7">Kitchen</a>
      <li><a href="items_by_category.php?id=8">Other</a>
    </ul>
<?php
include('config.php');
  
  $item1 = mysql_query("SELECT * FROM items ORDER BY item_id DESC LIMIT 1");
  while ($row = mysql_fetch_assoc($item1)) 
  {
      $item_id = stripslashes($row['item_id']);
      $picture = stripslashes($row['picture']);
      $price = stripslashes($row['price']);
      $name = strlen($row['name']) > 21 ? substr(stripslashes($row['name']),0,18).'...' : stripslashes($row['name']);
      if($picture == NULL)
        $picture='images/no_image.jpg';
      else
    	$picture="uploads/".$picture;
  }
  
  

echo "<div class='prod_box_left'>
        	<div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a title='{$row['name']}' href='item_page.php?id=".$item_id."'>Latest added</a></div>
                 <center><h6>".$name."</h6></center>
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' width='94'  src='".$picture."'></a></div>
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
     
      $item2_id = stripslashes($row['item_id']);
      $picture2 = stripslashes($row['picture']);
      $price2 = stripslashes($row['price']);
      $name2 = strlen($row['name']) > 21 ? substr(stripslashes($row['name']),0,18).'...' : stripslashes($row['name']);
      if($picture2 == NULL)
        $picture2='images/no_image.jpg';
    
  
   }

if($name2 == NULL)
      {
        
        random($item_id);
        return 0;
      }
echo "<div class='prod_box_left'>
          <div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a title='{$row['name']}' href='item_page.php?id=".$item2_id."'>Random product</a></div>
                 <center><h6>".$name2."</h6></center>
                 <div class='product_img'><a href='item_page.php?id=".$item2_id."'><img border='0' height='94' width='94'  src='uploads/". $picture2 ."'></a></div>
                 <div class='prod_price'><span class='price'>£".$price2."</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
</div>";

}
$item3 = mysql_query("SELECT * FROM items ORDER BY views DESC LIMIT 1");
  while ($row = mysql_fetch_assoc($item3)) 
  {
      $item3_id = stripslashes($row['item_id']);
      $picture = stripslashes($row['picture']);
      $price3 = stripslashes($row['price']);
      $name3 = strlen($row['name']) > 21 ? substr(stripslashes($row['name']),0,18).'...' : stripslashes($row['name']);
      if($picture == NULL)
        $picture='images/no_image.jpg';
      else
    	$picture="uploads/".$picture;
  }
echo "<div class='prod_box_left'>
        	<div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a title='{$row['name']}' href='item_page.php?id=".$item3_id."'>Most popular</a></div>
                 <center><h6>".$name3."</h6></center>
                 <div class='product_img'><a href='item_page.php?id=".$item3_id."'><img border='0' height='94' width='94'  src='".$picture3."'></a></div>
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

<div id="main_body">

<!-- Main body for page -->
