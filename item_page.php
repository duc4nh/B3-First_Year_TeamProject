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
          <img src="images/ipad.jpg">
        </div>
        <br/>
        <div id="user_contact">
          <h5>Owner: <a href="index.html">Chris Johnson</a></h5>
          <button type="submit" name="send_mess" />Send message</button>
        </div>
      </div>
      <div id="item_title">
        <b>Title:</b>  IPad 3
        <hr>
      
        <b>Price:</b>  $450
        <hr>
        <b>Payment:</b>  Paypal
        <hr>
      
        <b>Delivery:</b>  By mail
        <hr>
        <b>Location:</b>  Manchester
        <hr>
      
        <b>ZIP</b>  M14
        <hr>
        <b>Details</b>  -
        <hr>
      </div> 
      <div id="item_trade">
        <button type="submit" name="send_mess" />Trade</button>
        <button type="submit" name="send_mess" />Add to wishlist</button>
      </div>
      <div id="description"><h4>Description</h4>

        <p>Everything you do with iPad, you do through its large, beautiful display. And when the display is better, the entire iPad experience is better. The Retina display on iPad features a 2048-by-1536 resolution, rich color saturation, and an astounding 3.1 million pixels. That’s four times the number of pixels in iPad 2 and a million more than an HDTV. Those pixels are so close together, your eyes can’t discern individual ones at a normal viewing distance. When you can’t see the pixels, you see the whole picture. Or article. Or game. In ways you never could before.
        </p>
      </div>
      <div id="item_comments">
        <form method="post">
          <h4>Comments:</h4>
          <textarea name="comments" >Hey! What do you think about this product?</textarea><br />
          <button type="submit" name="send_mess" />Submit comment</button>
        </form>      
      </div>
      <div id="profile_wanted_items">
        <h4>User wishlist</h4>
        This is the list of products <a href="index.html"> Chris Johnson</a> is looking for:
        <br />
        <ul>
          <li><a href="index.html">product 1</a>
          <li><a href="index.html">product 2</a>
          <li><a href="index.html">product 3</a>
          <li><a href="index.html">product 4</a>
          <li><a href="index.html">product 5</a>
        </ul>
      </div>


    </div>
   
  </div>

  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
