<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>

  <!-- Main body for page -->
  <div id="body">
    <div id="top_search">
      <input class="search_box" type="text"><input class="search_button" value="SEARCH" type="submit"/>
    </div>
    
    <div id="item_page">
      <div id="left_item">
        <div id="profile_pic">
          <img src="images/smile.jpg">
        </div>
        <br/>
        <div id="user_contact">
          <button type="submit" name="send_mess" />Send message</button>
        </div>
      </div>
      <div id="item_title">

        <h3><?php echo $_SESSION['name']." ".$_SESSION['last_name']; ?> </h3>
	<div id="description"><h4>Description</h4>
	<p>My Manchester is a personalised online space for current students, which provides easy access to learning resources, services, student support and information, all in one place.
If you are not a current student you can still access certain resources from this page, such as the Crucial Guide Live and our 'askme' Help and Support resources.
Features include:</p>
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
      <li id="item_table"><a href="index.html">Item 1</a>
      <li id="item_table"><a href="index.html">Item 2</a>
      <li id="item_table"><a href="index.html">Item 2</a>
      <li id="item_table"><a href="index.html">Item 2</a>
    </td>
    <td>
      <li id="item_table"><a href="index.html">Item 1</a>
      <li id="item_table"><a href="index.html">Item 2</a>
      <li id="item_table"><a href="index.html">Item 2</a>
      <li id="item_table"><a href="index.html">Item 2</a>
    </td>
  </tr>
</table>
</div>

      
      <div id="item_comments">
        <form method="post">
          <h4>User Feedbacks:</h4>
          </br><hr>
	  <li><a href="index.html">User 1</a> : Good! <hr>
          <li><a href="index.html">User 2</a> : Good! <hr>
          <li><a href="index.html">User 3</a> : Good! <hr>
          <li><a href="index.html">User 4</a> : Good! <hr>
          <li><a href="index.html">User 5</a> : Good! <hr>
	  </br>
	  <textarea name="comments" >Leave your feedback here</textarea><br />
          <button type="submit" name="send_mess" />Submit</button>
        </form>      
      </div>

    </div>
   
  </div>

  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
