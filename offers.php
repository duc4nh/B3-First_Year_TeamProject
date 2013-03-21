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
<th id='title_table'><h5>Item name</h5></th>
    <th id='title_table'><h5>Owner name</h5></th>
    <th id='title_table'><h5>Offered item</h5></th>
     <th id='title_table'><h5>Offered price</h5></th>
    <th id='title_table'><h5>Trader name</h5></th>
    <th id='title_table'><h5>Date</h5></th>
    <th id='title_table'><h5>Answer</h5></th>
</tr>";

     $query3 = mysql_query("SELECT * FROM Trade WHERE owner_id = '$user_id' OR bidder_id='$user_id'");
     while ($row = mysql_fetch_assoc($query3)) 
     {
       $item_id = $row['item_id'];
       $item_type = $row['item_type'];
       $owner_id = $row['owner_id'];
       $bidder_item_id = $row['bidded_item_id'];
       $bidder_id = $row['bidder_id'];
       $date = $row['date'];
       $bidder_price = $row['price'];


       $query4 = mysql_query("SELECT * FROM items WHERE item_id = '$item_id' ");
       while ($row = mysql_fetch_assoc($query4)) 
       {    
         $item_name = $row['name'];
       } 

       $query5 = mysql_query("SELECT * FROM items WHERE item_id = '$bidder_item_id' ");
                        echo $bidder_item_id;
if($bidder_item_id == 0) 
         $bidder_item_name = "-";
         else {
       while ($row = mysql_fetch_assoc($query5)) 
       { 
         

         $bidder_item_name = $row['name'];
       }  }
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
              <td> ".$owner_name ."</td>
              <td> ".$bidder_item_name."</td>
              <td> ".$bidder_price."</a></td>
              <td> ".$bidder_name."</a></td>
              <td> ".$date."</a></td>
              <td> <a href='answer.php?id=accept'><button>Accept offer</button></a>
                             <a href='answer.php?id=decline'><button>Decline offer</button></a></td>
              </tr>"; 
     }
echo "</table>";
include('footer.php'); 
?>

?>