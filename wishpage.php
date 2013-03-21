<?php 
session_start();
include('header_menuleft.php'); 
include('config.php'); 
$user_id = $_SESSION['user_id'];

?>
 
<div class="wishlist_box_body">
<h2>Wishlist</h2>

<?php
$query2 = mysql_query("SELECT * FROM wishlist WHERE user_id = '$user_id' "); 
    while ($row = mysql_fetch_array($query2)) 
         {
           $item_id = $row['item_id'];
           $item_found;
         
            $query3 = mysql_query("SELECT * FROM items WHERE item_id = '$item_id' ");
            $endline_count=0;
            while ($row = mysql_fetch_array($query3)) 
            {
              $item_found = 1;
              $item_name_wish = $row['name'];
              $owner_id = $row['user_id'];
              

              $item_id = $row['item_id'];
              $user_id = $row['user_id'];
              $creation_date = $row['creation_date'];
              $expiration_date = $row['expiration_date'];
              $status = $row['status'];
              $type = $row['type'];
              $name = $row['name'];
              $category_id = $row['category_id'];
              $views = $row['views'];
	      $category_name = mysql_fetch_array(mysql_query("SELECT * FROM categories WHERE category_id = '$category_id' "));
	      $category_name = $category_name['category_name'];


              $picture = $row['picture'];
  
              if($picture == NULL)
                 $picture='images/no_image.jpg';
	      else
    		$picture="uploads/".$picture;

              $query4 = mysql_query("SELECT * FROM users WHERE user_id = '$owner_id' ");
              while (($row = mysql_fetch_array($query4)) && $endline_count < 10) 
              {
                $owner_name = $row['name'];
                $owner_last_name = $row['last_name'];
                $endline_count++;
                echo "
           <div class='prod_box'>
             <div class='top_prod_box'></div>
             <div class='center_prod_box'>            
                  <div class='product_title'><a href='item_page.php?id=".$item_id."'>".$name."</a></div>

                 <div class='creation_date'>Created: <span class='creation'>".$creation_date ."</span></div> 
                 <div class='expiration_date'>Expires: <span class='expiration'>".$expiration_date ."</span></div> 

                  <div class='created_by'>By: <span class='user'>".$owner_name." ".$owner_last_name."</span></div>
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' weight='94'  src='".$picture."'></a></div>

                 <div class='views_product'>Views: <span class='views'>".$views ."</span></div>  
                 <div class='category_name'>Category: <span class='category'>".$category_name ."</span></div> 

            </div>
            <div class='bottom_prod_box'></div>             
</div>
";

if($endline_count % 4 == 0)
{
  echo "<br>";
}
              }
         
            }
     }

if ($item_found != 1)
  echo "Sorry, there are no items in your wishlist!";
?>

</div>

<?php

include('footer.php'); 
?>
