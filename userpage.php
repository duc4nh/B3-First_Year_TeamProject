<!-- header and menu left -->
<?php include('header_menuleft.php'); 
 
        $user_id = $_GET['id'];
        $connect = mysql_connect("ramen.cs.man.ac.uk", "12_COMP10120_B3", "jIho9xRbbSbPvcIC") or die ("Could not connect!");
        mysql_select_db("12_COMP10120_B3", $connect) or die("Could not find db!");
  
        $query = mysql_query("SELECT * FROM users WHERE user_id = '$user_id' ");
        while ($row = mysql_fetch_assoc($query)) 
         {
           $dbemail = $row['email'];
           $dbpassword = $row['password'];
           $user_id = $row['user_id'];
           $name = $row['name'];
           $last_name = $row['last_name'];
           $description = $row['description'];
           $picture = $row['picture'];
         }
         if($picture == NULL)
           $picture = 'http://www.worldofchemicals.com/Woclite/tmp/chem/no_image.gif';
      
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
  <div id="body">
    <div id="top_search">
      <input class="search_box" type="text"><input class="search_button" value="SEARCH" type="submit"/>
    </div>
    
    <div id="item_page">
      <div id="left_item">
        <div id="profile_pic">
          <img height="150" weight="150" src="<?php echo $picture; ?>">
        </div>
        <br/>
        <div id="user_contact">
          <button type="submit" name="send_mess" />Send message</button>
        </div>
      </div>
      <div id="item_title">
        <h2><?php echo $name." ".$last_name; ?> </h2>
	<div id="description"><h4>Description</h4>
	<p><?php echo $description; ?></p>
      </div>        
    </div>


<div id="description">
<table border="1">
  <tr>
    <th id="title_table"><h2>Items Wanted</h2></th>
    <th id="title_table"><h2>Item for Trading</h2></th>
  </tr>
  <tr>
    <td >
<?php 
  $limit_wish=0;
  $limit_trade=0;
  $query2 = mysql_query("SELECT * FROM wishlist WHERE user_id = '$user_id' "); 
    while ($row = mysql_fetch_assoc($query2)) 
         {
           $item_id = $row['item_id'];
         }
         
  $query3 = mysql_query("SELECT * FROM items WHERE item_id = '$item_id' ");
     while ($row = mysql_fetch_assoc($query3)) 
         {
           $item_name_wish = $row['name'];
           echo "<li id='item_table'><a href='index.html'>".$item_name_wish."</a>";
           $limit_wish++;
           if($limit_wish == 5)
            break;
         }
  echo "</td>
    <td>";

  $query4 = mysql_query("SELECT * FROM items WHERE user_id = '$user_id' ");
     while ($row = mysql_fetch_assoc($query4)) 
         {
           $item_name_trade = $row['name'];
           echo "<li id='item_table'><a href='index.html'>".$item_name_trade."</a>";
           $limit_trade++;
           if($limit_trade == 5)
            break;
         }
         ?>
      
    </td>
  </tr>
</table>
</div>

      
      <div id="item_comments">
       <div class="fb-comments" data-href="http://soba.cs.man.ac.uk/~berianv2/FOLDER/B3-First_Year_TeamProject/userpage.php?id=<?php echo $_SESSION['user_id'];?>" data-width="675" data-num-posts="10"></div>      
      </div>

    </div>
   
  </div>

  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
