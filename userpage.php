<!-- header and menu left -->
<?php include('header_menuleft.php'); 
 include_once("functions.php");
include_once("config.php");
        $user_id = escape_value($_GET['id']);
       
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
          $picture='images/no_image_person.gif';
         else
    	  $picture="uploads/".$picture;
      
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
          <img height="150" width="150" src="<?php echo $picture; ?>">
        </div>
        <br/>
        <div id="user_contact">
          <? if(!empty($_SESSION['user_id'])) echo "
          <a href='message.php?user={$user_id}'  name='send_mess' />Send message</a>"; ?>
          <br>
	  <br>
	  
	  <?php
	  $local_id = $_GET['id'];
	  $logged_id = $_SESSION['user_id'];
	  if($local_id == $logged_id)
	  echo "
	  <a href=edit_profile.php><button>Edit Your Profile</button></a>" ;
	  ?>
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
    <td style="text-align:center;">

    <?  
     echo "<ul>"; 
     $query3 = mysql_query("SELECT * FROM items WHERE user_id = '$user_id' ");
     while ($row = mysql_fetch_assoc($query3)) 
     {
              $item_id_togo = $row['item_id'];
              $user_id_togo = $row['user_id'];
              $status = $row['status'];
              $type = $row['type'];
              $name = $row['name'];
                    if($status == 1 && $type == 1)
                    {
                        echo "<li><a href='item_page.php?id=$item_id_togo'>$name</a></li>";
                    }
     }
     echo "</ul>"; 
    ?>
  
    </td>
    <td style="text-align:center;">

    <?  
     echo "<ul>"; 
     $query3 = mysql_query("SELECT * FROM items WHERE user_id = '$user_id' ");
     while ($row = mysql_fetch_assoc($query3)) 
     {
              $item_id_togo = $row['item_id'];
              $user_id_togo = $row['user_id'];
              $status = $row['status'];
              $type = $row['type'];
              $name = $row['name'];
                    if($status == 1 && $type == 2)
                    {
                        echo "<li><a href='item_page.php?id=$item_id_togo'>$name</a></li>";
                    }
     }
     echo "</ul>"; 
    ?>
      
    </td>
  </tr>
</table>
</div>

      
      <div id="item_comments">
                <div class="fb-comments" data-href="http://rtd.lt/fbcomments/users.php?id=<?php echo $user_id;?>" data-width="675" data-num-posts="10"></div>
      </div>

    </div>

  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
