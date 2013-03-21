<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->
  
    <div class="index_box">
  	<div class="index_box_body">
	  <?php include('slider.php'); ?>
	</div>
    </div>
    
    <div class="index_box">
    
    <!-- Feature row -->
          
	<div class="index_box_body">
	<h2>Featured</h2>
<?
include('config.php');
  
  $item1 = mysql_query("SELECT * FROM items WHERE type='2' AND status=1 ORDER BY views DESC LIMIT 4");
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
echo "
<div class='prod_box'>
            <div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a title='{$row['name']}' href='item_page.php?id=".$item_id."'>".$name."</a></div>
                
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' width='94'  src='".$picture."'></a></div>
                 <div class='prod_price'><span class='price'>£".$price."</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
</div> 
";

}
?>
	</div>
	</br></br>
	<!-- End Feature row -->
	<br>
<!-- 2 column -->	
<div id="buy_sell">

<!-- column1 -->
<div class="column1">
<h2>Recently Posted</h2>
<?php

  
  $item1 = mysql_query("SELECT * FROM items WHERE type='2' ORDER BY item_id DESC LIMIT 4");
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
  

echo "
<div class='prod_box'>
            <div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a title='{$row['name']}' href='item_page.php?id=".$item_id."'>".$name."</a></div>
                
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' width='94'  src='".$picture."'></a></div>
                 <div class='prod_price'><span class='price'>£".$price."</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
</div> 
";

}
?>
</div>

<!-- end column1 -->

<!-- column2 -->
<div class="column2">
<h2>Recently Requested</h2>
<?php


  
  $item1 = mysql_query("SELECT * FROM items WHERE type='1' ORDER BY item_id DESC LIMIT 4");
  $endline_count=0;
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
  
  
$endline_count++;
echo "
<div class='prod_box'>
            <div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a title='{$row['name']}' href='item_page.php?id=".$item_id."'>".$name."</a></div>
                
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' width='94'  src='".$picture."'></a></div>
                 <div class='prod_price'><span class='price'>£".$price."</span></div>                        
            </div>
            <div class='bottom_prod_box'></div>             
</div> 
";

if($endline_count==2)
{
  $endline_count=0; 
  echo "<br>";
}


}
?>


</div>
<!-- end column2 -->

</div>
<!-- End 2 column -->
	
    </div>	

  <!-- Main body for page ends -->
  
  
<!-- Footer information -->
<?php include('footer.php'); ?>
   
