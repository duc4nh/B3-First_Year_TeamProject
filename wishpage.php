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
    while ($row = mysql_fetch_assoc($query2)) 
         {
           $item_id = $row['item_id'];
         
         
            $query3 = mysql_query("SELECT * FROM items WHERE item_id = '$item_id' ");
            $endline_count=0;
            while ($row = mysql_fetch_assoc($query3)) 
            {
              $item_name_wish = $row['name'];
              $owner_id = $row['user_id'];
            
              $query4 = mysql_query("SELECT * FROM users WHERE user_id = '$owner_id' ");
              while ($row = mysql_fetch_assoc($query4)) 
              {
                $owner_name = $row['name'];
                $owner_last_name = $row['last_name'];
                $endline_count++;
                echo "
           <div class='prod_box'>
             <div class='top_prod_box'></div>
             <div class='center_prod_box'>            
                  <div class='product_title'><a href='item_page.php?id=".$item_id."'>".$name."</a></div>
                  <div class='created_by'>User: <span class='user'>".$owner_name." ".$owner_last_name."</span></div>
            </div>
            <div class='bottom_prod_box'></div>             
</div>
";

if($endline_count==4)
{
  $endline_count=0;
  echo "<br>";
}
              }
         
            }
     }

?>

</div>

<?php

include('footer.php'); 
?>
