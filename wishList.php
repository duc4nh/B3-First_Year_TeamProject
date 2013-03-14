
<?php 
include('header_menuleft.php');
echo "<div id='body'>
    <div id='top_search'>
      <input class='search_box' type='text'><input class='search_button' value='SEARCH' type='submit'/>
    </div><br><br>" ;

include('config.php');

  $item_id = $_GET['id'];
  $user_id = $_SESSION['user_id'];
  $ok =0;
  $search = mysql_query("SELECT * FROM wishlist WHERE user_id = '$user_id' ");
  while($row = mysql_fetch_assoc($search)) 
  {
    $dbuser_id = $row['user_id'];
    $dbitem_id = $row['item_id'];
    if($item_id == $dbitem_id)
    {
      $ok=1;
      break;
    }

  }
  if($ok==1)
    echo "You have already added this to wishlist";
  else
  {
    mysql_query("INSERT INTO wishlist (user_id, item_id) VALUES ('$user_id', '$item_id')");
    echo "Item added!";
  }
echo "</div>";

include('footer.php');
?>
