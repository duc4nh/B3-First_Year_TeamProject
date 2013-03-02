<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->
  <div id="body">
    <div id="top_search">
      <input class="search_box" type="text"><input class="search_button" value="SEARCH" type="submit"/>
    
        </br>
        </br>
        <h3>Upload Your Item</h3></br>

        Please fill the blanks below</br>
        </br>
      <div id="register_box">
        <form name="input" action="item/upload.php" method="get">
          <fieldset>
	      <legend>Personal information:</legend></br>
          <table width="100%" border="0" cellpadding="0" cellspacing="2">
            <tr>
            <td width="1%">Type: </td>
              <td><select>
  			    <option value="buy">I am looking for this item</option>
	     	    <option value="sell">I want to trade this item</option>
			  </select>
			  </td>
            </tr><tr></tr>
            <tr>
            <td width="1%">Item name: </td>
              <td><input type="text" name="item_name"></td>
            </tr><tr></tr>
            <tr>
              <td width="1%">Item Category:</td>
              <td>
              <select>
  			    <option value="books">Books</option>
  			    <option value="clothes">Clothes</option>
  			    <option value="games">Games</option>
  			    <option value="pc">PC</option>
  			    <option value="phone">Phone</option>
	     	    <option value="food">Food</option>
	     	    <option value="food">Other</option>
			  </select>
              </td>
            </tr><tr></tr>
            <tr>
              <td width="1%">Description:</td>
              <td><textarea name="description" rows="8" cols="36"></textarea></td>
            </tr><tr></tr>
            <tr>
              <td width="1%">Upload Image:</td>
              <td><input type="file" name="image" size="40"></td>
            </tr><tr></tr>
            <tr>
              <td width="1%">Price:</td>
              <td><input type="text" name="price"></td>
            <tr>
              <td>&nbsp;</td>
              <td><button type="submit" />     Submit      </button></td>
            </tr><tr></tr>
          </table>
        </br></fieldset>  
        </form>
      </div>
    </div>
   
  </div>

  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
