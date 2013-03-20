<!-- header and menu left -->
<?php 
  include('header_menuleft.php'); 
  $item_id = $_GET['id'];


  $query = mysql_query("SELECT * FROM items WHERE item_id = '$item_id' ");
  while ($row = mysql_fetch_assoc($query)) 
  {
    $user_id_i = $row['user_id'];
    $creation_date = $row['creation_date'];
    $expiration_date = $row['expiration_date'];
    $price = $row['price'];
    $status = $row['status'];
    $type = $row['type'];
    $name = $row['name'];
    $description = $row['description'];
    $category_id = $row['category_id'];
    $picture = $row['picture'];
    $views = $row['views'];
  }
  $views += 1;
  
  mysql_query("UPDATE items  SET views = '$views' WHERE item_id = '$item_id'");
  if(empty($picture))
  {
    $picture = 'images/no_image.jpg';
  }
  else
    $picture="uploads/".$picture;

  $user_names = mysql_query("SELECT * FROM users WHERE user_id = '$user_id_i' ");
  while ($rowa = mysql_fetch_assoc($user_names)) 
  {
    $user_name = $rowa['name'];
    $user_last_name = $rowa['last_name'];
  }

  $category = mysql_query("SELECT * FROM categories WHERE category_id = '$category_id' ");
  while ($rowb = mysql_fetch_assoc($category)) 
  {
    $category_name = $rowb['category_name'];
  }

?>
  
  <!-- Main body for page -->
 
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));</script>

  
    <div id="item_page">
      <div id="left_item">
        <div id="profile_pic">
          <img height="150" weight="150" src="<?php echo $picture; ?>">
        </div>
        <br/>
        <div id="user_contact">
          <?php
          if($type==2)
            echo "
          <h5>Owner: <a href='userpage.php?id=".$user_id_i."'>".$user_name." ".$user_last_name."</a></h5>";
          else
            echo "
          <h5>Requester: <a href='userpage.php?id=".$user_id_i."'>".$user_name." ".$user_last_name."</a></h5>";
          ?>
          <button type="submit" name="send_mess" />Send message</button>
        </div>
      </div>
      <div id="item_title">
        <b>Title:</b>  <?php echo $name; ?>
        <hr>
      
        <b>Price:</b>  $<?php echo $price; ?>
        <hr>
        <b>Creation date:</b>  <?php echo $creation_date; ?>
        <hr>
      
        <b>Expiration date:</b> <?php echo $expiration_date; ?>
        <hr>
        <b>Category:</b>  <?php echo $category_name; ?>
        <hr>
      
        <b>Status</b>  
        <?php
          if($status == 1)
            echo "Item is available";
          else
            echo "Item not available";
         ?>
        <hr>
      </div> 
      <br>
      <div id="item_trade">
       <?php
      


       if($_SESSION['user_id'] != $user_id_i)
       { 
          if($status == 1)
            echo "
           <a href='trade_item.php?id=".$item_id."' ><button>Trade</button></a>
        
           <a href='wishList.php?id=".$item_id."'><button>Add to wishlist</button></a>";
        }
	else
	{  
	  echo "<a href='edit_item_page.php?id=".$item_id."'><button>Edit Item</button></a>";
	  echo "<a href='delete_item.php?id=".$item_id."'><button>Delete Item</button></a>";
	}

       ?>
      </div>
      <br><br>
      <div id="description"><h4>Description</h4>
        <p><?php echo $description; ?></p>
      </div>

      <br>
      <br>
      <div id="item_comments">
        <h4>Comments</h4>
  
                <div class="fb-comments" data-href="http://rtd.lt/fbcomments/?id=<?php echo $item_id;?>" data-width="675" data-num-posts="10"></div>
      </div>
  </div>
     
    


  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); 
