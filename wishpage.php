<?php 
session_start();
include('header_menuleft.php'); 
include('config.php'); 
$user_id = $_SESSION['user_id'];



echo " 
<table border='0'>
<tr>
<th id='title_table'><h3>Items Wanted</h3></th>
    <th id='title_table'><h3>Owner</h3></th>
</tr>";



$query2 = mysql_query("SELECT * FROM wishlist WHERE user_id = '$user_id' "); 
    while ($row = mysql_fetch_assoc($query2)) 
         {
           $item_id = $row['item_id'];
         
         
            $query3 = mysql_query("SELECT * FROM items WHERE item_id = '$item_id' ");
            while ($row = mysql_fetch_assoc($query3)) 
            {
              $item_name_wish = $row['name'];
              $owner_id = $row['user_id'];
            
              $query4 = mysql_query("SELECT * FROM users WHERE user_id = '$owner_id' ");
              while ($row = mysql_fetch_assoc($query4)) 
              {
                $owner_name = $row['name'];
                $owner_last_name = $row['last_name'];

                echo "<tr id='item_table'>
                <td> <a href='item_page.php?id=".$item_id."'>".$item_name_wish."</a></td>
                <td> <a href='userpage.php?id=".$owner_id."'>".$owner_name." ".$owner_last_name."</a></td>
                </tr>";
              }
         
            }
     }
echo "</table>";
include('footer.php'); 
?>
