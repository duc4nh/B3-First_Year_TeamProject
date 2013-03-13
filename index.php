<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->
  <div id="body">
    <div id="top_search">
      <input class="search_box" type="text"><input class="search_button" value="SEARCH" type="submit"/>
    </div>
    <div class="index_box">
  	<div class="index_box_body">
	  <?php include('slider.php'); ?>
	</div>
    </div>
    
    <div class="index_box">
    
    <!-- Feature row -->
          
	<div class="index_box_body">
	<h2>Featured</h2>
<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="details.html">Asus</a></div>
                 <div class="product_img"><a href="details.html"><img border="0" title="" alt="" src="images/laptop.gif"></a></div>
                 <div class="prod_price"><span class="price">270$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
</div>

<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="details.html">Iphone</a></div>
                 <div class="product_img"><a href="details.html"><img border="0" title="" alt="" src="images/iphone.jpeg"></a></div>
                 <div class="prod_price"><span class="price">640$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
</div>

<div class="prod_box">
        	<div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="details.html">Ipad</a></div>
                 <div class="product_img"><a href="details.html"><img border="0" title="" alt="" src="images/ipad.png"></a></div>
                 <div class="prod_price"><span class="price">20$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
</div>

<div class="prod_box">
          <div class="top_prod_box"></div>
            <div class="center_prod_box">            
                 <div class="product_title"><a href="details.html">GPS</a></div>
                 <div class="product_img"><a href="details.html"><img border="0" title="" alt="" src="images/gps.png"></a></div>
                 <div class="prod_price"><span class="price">70$</span></div>                        
            </div>
            <div class="bottom_prod_box"></div>             
</div>


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

include('config.php');
  
  $item1 = mysql_query("SELECT * FROM items WHERE type='2' ORDER BY item_id DESC LIMIT 4");
  while ($row = mysql_fetch_assoc($item1)) 
  {
      $item_id = $row['item_id'];
      $picture = $row['picture'];
      $price = $row['price'];
      $name = $row['name'];
      if($picture == NULL)
        $picture='http://www.tiesummit.com/wp-content/uploads/2012/10/noimage.jpg';
  
  
  

echo "
<div class='prod_box'>
            <div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a href='item_page.php?id=".$item_id."'>".$name."</a></div>
                
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' weight='94'  src='".$picture."'></a></div>
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
      $item_id = $row['item_id'];
      $picture = $row['picture'];
      $price = $row['price'];
      $name = $row['name'];
      if($picture == NULL)
        $picture='http://www.tiesummit.com/wp-content/uploads/2012/10/noimage.jpg';
  
  
  
$endline_count++;
echo "
<div class='prod_box'>
            <div class='top_prod_box'></div>
            <div class='center_prod_box'>            
                 <div class='product_title'><a href='item_page.php?id=".$item_id."'>".$name."</a></div>
                
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' weight='94'  src='".$picture."'></a></div>
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
    </div>

  <!-- Main body for page ends -->
  
  
<!-- Footer information -->
<?php include('footer.php'); ?>
   
