<?php 
session_start();
include('header_menuleft.php'); 
include('config.php'); 
$user_id = $_SESSION['user_id'];



echo " 
      <div id='top_search'>
      <input class='search_box' type='text'><input class='search_button' value='SEARCH' type='submit'/>
    </div><table border='0'>
<tr>
<th id='title_table'><h4>Name</h4></th>
    <th id='title_table'><h4>Created on</h4></th>
    <th id='title_table'><h4>Expires on</h4></th>
    <th id='title_table'><h4>Price £</h4></th>
    <th id='title_table'><h4>Owner</h4></th>
    <th id='title_table'><h4>Views</h4></th>
    <th id='title_table'><h4>Category</h4></th>
</tr>";

     $query3 = mysql_query("SELECT * FROM items");
     while ($row = mysql_fetch_assoc($query3)) 
     {           $item_id = $row['item_id'];
                 $user_id = $row['user_id'];
                 $creation_date = $row['creation_date'];
                 $expiration_date = $row['expiration_date'];
                 $price = $row['price'];
                 $status = $row['status'];
                 $type = $row['type'];
                 $name = $row['name'];
                 $category_id = $row['category_id'];
                 $views = $row['views'];
              $query4 = mysql_query("SELECT * FROM users WHERE user_id = '$user_id' ");
              while ($row = mysql_fetch_assoc($query4)) 
              {
                $owner_name = $row['name'];
                $owner_last_name = $row['last_name'];
                $query5 = mysql_query("SELECT * FROM categories WHERE category_id = '$category_id' ");
                while ($row = mysql_fetch_assoc($query5)) 
                {
                  $category_name = $row['category_name'];
                  
                    if($status == 1 && $type == 2)
                    {
                        echo "<tr id='item_table'>
                        <td> <a href='item_page.php?id=".$item_id."'>".$name."</a></td>
                        <td> ".$creation_date ."</td>
                        <td> ".$expiration_date ."</td>
                        <td> ".$price."</td>
                        <td> ".$owner_name." ".$owner_last_name."</td>
                        <td> ".$views."</a></td>
                        <td> ".$category_name."</a></td>

                        </tr>";
                    }
                }
              }
     }
echo "</table>";
include('footer.php'); 
?>