<?php
session_start();
include('config.php');
$user_id = $_SESSION['user_id'];
$check = mysql_query("SELECT * FROM Trade WHERE owner_id ='$user_id' OR bidder_id ='$user_id'");
while($check_row = mysql_fetch_assoc($check))
{
  if($user_id == $check_row['owner_id'])
    mysql_query("UPDATE Trade SET owner_view='1' WHERE owner_id='$user_id'");
  elseif ($user_id == $check_row['bidder_id']) 
    mysql_query("UPDATE Trade SET bidder_view='1' WHERE bidder_id='$user_id'");
}

include('header_menuleft.php'); 
 




echo " 
      <table border='0'>
<tr>
<th id='title_table'><h4>Item name</h4></th>
    <th id='title_table'><h4>Item type</h4></th>
    <th id='title_table'><h4>Owner name</h4></th>
    <th id='title_table'><h4>Offered item</h4></th>
    <th id='title_table'><h4>Trader name</h4></th>
    <th id='title_table'><h4>Date</h4></th>
</tr>";

     $query3 = mysql_query("SELECT * FROM Trade WHERE owner_id = '$user_id' OR bidder_id='$user_id'");
     while ($row = mysql_fetch_assoc($query3)) 
     {
       $item_id = $row['item_id'];//
       $item_type = $row['item_type'];//
       $owner_id = $row['owner_id'];
       $bidder_item_id = $row['bidded_item_id'];//
       $bidder_id = $row['bidder_id'];
       $date = $row['date'];//

       $query4 = mysql_query("SELECT * FROM items WHERE item_id = '$item_id' ");
       while ($row = mysql_fetch_assoc($query4)) 
       {    
         $item_name = $row['name'];
       } 

       $query5 = mysql_query("SELECT * FROM items WHERE item_id = '$bidder_item_id' ");
       while ($row = mysql_fetch_assoc($query5)) 
       {    
         $bidder_item_name = $row['name'];
       }  
       $query6 = mysql_query("SELECT * FROM users WHERE user_id = '$owner_id' ");
       while ($row = mysql_fetch_assoc($query6)) 
       {    
         $owner_name = $row['name'];
       } 
       $query7 = mysql_query("SELECT * FROM users WHERE user_id = '$bidder_id' ");
       while ($row = mysql_fetch_assoc($query7)) 
       {    
         $bidder_name = $row['name'];
       }   
                        echo "<tr id='item_table'>
                        <td> <a href='item_page.php?id=".$item_id."'>".$item_name."</a></td>
                        <td> ".$item_type ."</td>
                        <td> ".$owner_name ."</td>
                        <td> ".$bidder_item_name."</td>
                        <td> ".$bidder_name."</a></td>
                        <td> ".$date."</a></td>

                        </tr>";
                    
                
              
     }
echo "</table>";
include('footer.php'); 
?>

?>