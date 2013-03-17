<!-- header and menu left -->
<?php include('header_menuleft.php'); 
  $item_id = $_GET['id'];

  include('config.php');
  $query = mysql_query("SELECT * FROM items WHERE item_id = '$item_id' ");
  while ($row = mysql_fetch_assoc($query)) 
  {
    $user_id = $row['user_id'];
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
  if($picture == NULL)
    $picture = 'http://www.worldofchemicals.com/Woclite/tmp/chem/no_image.gif';
    
  $user = mysql_query("SELECT * FROM users WHERE user_id = '$user_id' ");
  while ($row = mysql_fetch_assoc($user)) 
  {
    $user_name = $row['name'];
    $user_last_name = $row['last_name'];
  }
  $category = mysql_query("SELECT * FROM categories WHERE category_id = '$category_id' ");
  while ($row = mysql_fetch_assoc($category)) 
  {
    $category_name = $row['category_name'];
  }

?>
  
  <!-- Main body for page -->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=182540261879239";
    fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));</script>

    <div id="item_page">
      <div id="left_item">
        <div id="profile_pic">
          <img height="150" weight="150" src="<?php echo $picture; ?>">
        </div>
        <br/>
        <div id="user_contact">
<<<<<<< HEAD
          <?php
          if($type==2)
            echo "
          <h5>Owner: <a href='userpage.php?id=".$user_id."'>".$user_name." ".$user_last_name."</a></h5>";
          else
            echo "
          <h5>Requester: <a href='userpage.php?id=".$user_id."'>".$user_name." ".$user_last_name."</a></h5>";
          ?>
          <button type="submit" name="send_mess" />Send message</button>
        </div>
=======
          <h5>Owner: <a href="index.html"><?php echo $user_name." ".$user_last_name; ?> </a></h5>
          <button type="submit" name="send_mess" />Send message</button></br>
          <?
      include_once('functions.php');
      $qry = mysql_query("SELECT * FROM `items` WHERE `item_id` = '$item_id'");
      if (mysql_num_rows($qry) != 0)
      {
        $data = mysql_fetch_array($qry); 
      }?>
	
	<?php if ($data['user_id'] == $_SESSION['user_id']) : ?>
	   <a href="edit_item_page.php?id=<?php echo $item_id;?>"><button>Edit item</button></a>	 
	<?php endif; ?>	   
	</div>
>>>>>>> dedbd64b7aab352c4b003d3322e49233d8b1deaa
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
      <div id="item_trade">
       <?php
       if($_SESSION('user_id') != $user_id)
        echo "
        <form action='trade_item.php?id=".$item_id."' ><button type='submit' />Trade</button></form>
      
        <a href='wishList.php?id=".$item_id."'><button>Add to wishlist</button></a>";
       ?>
      </div>
      
                 
          
      <br><br><br>
      <div id="description"><h4>Description</h4>

        <p><?php echo $description; ?></p>
      </div>

      <br>
      <br>
      <div id="item_comments">
        <h4>Comments</h4>
  
                <div class="fb-comments" data-href="http://rtd.lt/fbcomments/?id=<?php echo $item_id;?>" data-width="675" data-num-posts="10"></div>

      </div>
      
      <div id="profile_wanted_items">
        <h4><a href="userpage.php?id=<?php echo $user_id; ?>"> <?php echo $user_name." ".$user_last_name; ?></a>  is looking for:</h4>
        <br>
     
     <?  
     
     echo "<ul>"; 
     $query3 = mysql_query("SELECT * FROM items");
     while ($row = mysql_fetch_assoc($query3)) 
     {
              $item_id_togo = $row['item_id'];
              $user_id_togo = $row['user_id'];
              $status = $row['status'];
              $type = $row['type'];
              $name = $row['name'];
                    if($status == 1 && $type == 1 && $user_id == $user_id_togo && $item_id != $item_id_togo)
                    {
                        echo "<li><a href='item_page.php?id=$item_id_togo'>$name</a>";
                    }
     }
     
    ?>
	
      </div>


<<<<<<< HEAD
  
   
  
=======
    </div>


  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
