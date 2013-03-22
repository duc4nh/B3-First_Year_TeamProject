<?php
session_start();
include('config.php');
include_once("functions.php");
$answer = escape_value($_GET['id']);
$offer_item_id = escape_value($_GET['idq']);
$offer_trade_id = escape_value($_GET['idw']);
$offer_trade_name = escape_value($_GET['ide']);
$offer_trade_email = escape_value($_GET['idr']);

while ($row = mysql_fetch_assoc($query4)) 
{    
  $item_name = $row['name'];
  $status = $row['status'];
} 
echo $offer_item_id;
echo $offer_trade_id;
echo $offer_trade_name;
if($answer == 'accept')
{
$to = $offer_trade_email;
$subject = "MyUniTrader offer notification";
$message = "Hello! Your offer was accepted! Please contact the owner!";
$headers = "From MyUniTrader";
mail($to,$subject,$message,$headers);
if($offer_trade_name == '-')
{
  mysql_query("UPDATE `items` 
               SET `status`='0'
         WHERE `item_id`='$offer_item_id'");
  mysql_query("DELETE FROM `Trade` WHERE `bidded_item_id` = $offer_trade_id AND `item_id` = $offer_item_id");
}
else
 { mysql_query("UPDATE `items` 
               SET `status`='0'
         WHERE `item_id`='$offer_item_id'");
mysql_query("UPDATE `items` 
               SET `status`='0'
         WHERE  `item_id`='$offer_trade_id'");
  mysql_query("DELETE FROM `Trade` WHERE `bidded_item_id` = $offer_trade_id AND `item_id` = $offer_item_id");

 }
 header("Location: offers.php");
}
if($answer == 'decline')
  {
    $to = $offer_trade_email;
    $subject = "MyUniTrader offer notification";
    $message = "Hello! Your offer was declined! Please contact the owner!";
    $headers = "From MyUniTrader"; 
    mail($to,$subject,$message,$headers);
    mysql_query("DELETE FROM `Trade` WHERE `bidded_item_id` = $offer_trade_id AND `item_id` = $offer_item_id");
    header("Location: offers.php");
  }


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
 
  $item_found=0;

     $query3 = mysql_query("SELECT * FROM Trade WHERE owner_id = '$user_id' OR bidder_id='$user_id'");
     while ($row = mysql_fetch_assoc($query3)) 
     {
       $item_found=1;
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
         $status = $row['status'];
       } 
      
       $query5 = mysql_query("SELECT * FROM items WHERE item_id = '$bidder_item_id' ");
                        
       if($bidder_item_id == 0) 
         $bidder_item_name = "-";
       else 
       {
         while ($row = mysql_fetch_assoc($query5)) 
         { 
           $bidder_item_name = $row['name'];
         }  
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
         $bidder_email = $row['email'];
       }   
        if($status != 0)
        {echo "<tr id='item_table'>
              <td> <a href='item_page.php?id=".$item_id."'>".$item_name."</a></td>
              <td> ".$owner_name ."</td>
              <td> ".$bidder_item_name."</td>
              <td> ".$bidder_price."</a></td>
              <td> ".$bidder_name."</a></td>
              <td> ".$date."</a></td>";
           if($_SESSION['user_id'] == $owner_id)
             {echo "<td> <a href='offers.php?id=accept&idq=".$item_id."&idw=".$bidder_item_id."&ide=".$bidder_item_name."&idr=".$bidder_email."'><button>Accept offer</button></a>
                             <a href='offers.php?id=decline&idq=".$item_id."&idw=".$bidder_item_id."&ide=".$bidder_item_name."&idr=".$bidder_email."'><button>Decline offer</button></a></td>
              </tr>"; }
           else
             echo "<td></td></tr>";
          }
     }

echo "</table>";
if ($item_found != 1)
  echo "Sorry, there are no items in your Ofgfer list!";
include('footer.php'); 
?>

