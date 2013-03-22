<?php 
session_start();
if(!empty($_POST) AND !empty($_SESSION['email']))
{
	include('functions.php');

	$bidded_item_id = escape_value($_POST['item']);
  $bidder_price = escape_value($_POST['bidder_price']);
	if(empty($bidded_item_id) && empty($bidder_price))
		$errors[] = "Please enter item name or sum of money<br>";

  if($bidded_item_id != '0'  && $bidder_price != NULL)
    $errors[] = "Please enter item name OR sum of money<br> Not both at the same time!";

	// By this point everything is cleanned and ready to put into database
	if(!is_array($errors))
	{
		include_once('config.php');
include_once('functions.php');
		$item_id = escape_value($_GET['id']);
  
    $item = mysql_query("SELECT * FROM items WHERE item_id = '$item_id'");
    while($row = mysql_fetch_assoc($item))
    {
      $item_type = $row['type'];
      $owner_id = $row['user_id'];
      $item_name = $row['name'];
    }
    
    
      $dateNow = date("Y-m-d H:i:s", time());
		
		  $query = "INSERT INTO `Trade` (
					`item_id` ,
					`item_type` ,
					`owner_id` ,
					`bidded_item_id` ,
					`bidder_id` ,
					`date` ,
          `price`
					) VALUES (
					'{$item_id}', 
					'{$item_type}', 
					'{$owner_id}',
					'{$bidded_item_id}',
					'{$_SESSION['user_id']}', 
					'{$dateNow}',
          '{$bidder_price}')";
    if($_SESSION['user_id'] != $owner_id)
    { 
		  mysql_query($query);
		
		  $message = "Offer succesfully made";
    }
    else
    {
      $message = "You can't make an offer to yourself! <a href='item_page.php?id=".$item_id."'>Go back to item page</a>";
      
    }
	} // insert if

} //if

?>
<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->

      <?php
      if(!$_SESSION) 
      {
        echo "Please log in to trade an item";
      }
      elseif(!empty($message))
	{
	echo $message;

	}else{
      ?>
<?php include_once('config.php'); ?>
        <h3>Trade Your Item</h3></br>

        
        <div id="register_box">
        <form name="input" action="" method="post" enctype="multipart/form-data">
          <fieldset>
	      <legend>Item/sum do you want to trade: </legend></br>
			<?
			if(is_array($errors)) {
				echo "<div style='color:red;'>";
				foreach($errors as $e) {
					echo "<p>{$e}</p>";
				}
				echo "</div>";
			}
			?>
          <table width="100%" border="0" cellpadding="0" cellspacing="2">
            
            <tr>
              <td width="1%">Item: </td>
              <td>
              <select name="item">
		<?
include_once('functions.php');
		$item_id = escape_value($_GET['id']);
		
    $item2 = mysql_query("SELECT * FROM items WHERE item_id = '$item_id'");
    while($row = mysql_fetch_assoc($item2))
    {
      $item_type = $row['type'];
      $owner_id = $row['user_id'];
      $item_name = $row['name'];
    }
    if($item_type == 1)
    {
      $var_type = 2;
    }
    else
    {
      $var_type = 1;
    }
    $bidder = $_SESSION['user_id'];
		$query = mysql_query("SELECT * FROM items WHERE type = '$var_type' AND user_id = '$bidder'");
		while($cat = mysql_fetch_array($query))
		{
			echo "<option value={$cat['item_id']} ";
			if($_POST["item"] == $cat["item_id"]) echo 'selected="selected"';
			echo ">{$cat['name']}</option>";
		}
		?>
    <option value="0" ></option>
			  </select>

              </td>
            </tr>
            <td></td><td><b>OR</b></td><td></td>
            <tr>
              <td>Money</td>
              <td><input type="text" name = "bidder_price"/></input></td>
            </tr>
              
            
            
           
            
              <td>&nbsp;</td>
              <td><button type="submit" />     Submit      </button></td>
            </tr><tr></tr>
          </table>
        </br></fieldset>  
        </form>
	</div>
<? }// closing else ?>

  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
