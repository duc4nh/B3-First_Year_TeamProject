<?php 
session_start();
if(!empty($_POST) AND !empty($_SESSION['email']))
{
	include('functions.php');
	$type = escape_value($_POST['type']);
	$item_name = escape_value($_POST['item_name']);
	$category = escape_value($_POST['category']);
	$description = escape_value($_POST['description']);
	$price = escape_value($_POST['price']);	
	if(empty($type))
		$errors[] = "Please enter type<br>";
	if(empty($item_name))
		$errors[] = "Please enter item name<br>";
	if(empty($category))
		$errors[] = "Please enter category<br>";
	if(empty($description))
		$errors[] = "Please enter description<br>";
	if(empty($price))
		$errors[] = "Please enter price<br>";
	if(!is_numeric($price))
		$errors[] = "Price has to be a number<br>";

	// if no errors, deal with upload
	if(!is_array($errors))
	{
		if($_FILES['file']['name'] != "") { 	
			$f = explode(".",$_FILES['file']['name']);
			$ext = strtolower(end($f));
			$goodExtensions = array('jpg','png','tiff','gif'); 
			if(!in_array($ext,$goodExtensions)) $errors[] = 'File extension not allowed<br>';
			if(in_array($ext, $goodExtensions)) {
				$nameFile = md5(microtime()).".".$ext;   
				if (!is_array($errors)) {  
					if (move_uploaded_file($_FILES['file']['tmp_name'], "uploads/".$nameFile)) { 
						$file = $nameFile;
						chmod("uploads/".$nameFile, 0644);		 
					}
					else $errors[] = 'Upload failed<br>';
				}
	 
			}
		} // upload ended	
	} // if

	// By this point everything is cleanned and ready to put into database
	if(!is_array($errors))
	{
		include_once('config.php');
		$dateNow = date("Y-m-d H:i:s", time());
		$dateLater = date("Y-m-d H:i:s", time() + (21 * 24 * 60 * 60));
		$query = "INSERT INTO `items` (
					`user_id` ,
					`creation_date` ,
					`expiration_date` ,
					`price` ,
					`status` ,
					`type` ,
					`name` ,
					`description` ,
					`picture` ,
					`category_id`
					) VALUES (
					'{$_SESSION["user_id"]}', 
					'{$dateNow}', 
					'{$dateLater}',
					'{$price}',
					'1', 
					'{$type}', 
					'{$item_name}', 
					'{$description}', 
					'{$file}', 
					'{$category}')";
		mysql_query($query);
		$id = mysql_insert_id();
		$message = "Succesfully inserted you can view you item <a href='item_page.php?id={$id}'>Here</a>";
	} // insert if

} //if

?>
<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->

      <?php
      if(!$_SESSION) 
      {
        echo "Please log in to post an item";
      }
      elseif(!empty($message))
	{
	echo $message;
	}else{
      ?>
<?php include_once('config.php'); ?>
        <h3>Upload Your Item</h3></br>

        Please fill the blanks below</br>
        </br>
      <div id="register_box">
        <form name="input" action="" method="post" enctype="multipart/form-data">
          <fieldset>
	      <legend>Personal information:</legend></br>
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

            <td width="30%">Type: </td>
              <td><select name="type">
  		    <option value="1" <?if($_POST["type"] == 1) echo 'selected="selected"'; ?>>I am looking for this item</option>
	     	    <option value="2" <?if($_POST["type"] == 2) echo 'selected="selected"'; ?>>I want to trade this item</option>
		</select>
			  </td>
            </tr><tr></tr>
            <tr>
            <td>Item name: </td>
              <td><input type="text" name="item_name" value="<?=stripslashes($_POST["item_name"]);?>"></td>
            </tr><tr></tr>
            <tr>
              <td>Item Category:</td>
              <td>
              <select name="category">
		<?
		$query = mysql_query("SELECT * FROM categories");
		while($cat = mysql_fetch_array($query)){
			echo "<option value={$cat['category_id']} ";
			if($_POST["category"] == $cat["category_id"]) echo 'selected="selected"';
			echo ">{$cat['category_name']}</option>";
		}
		?>
			  </select>
              </td>
            </tr><tr></tr>
            <tr>
              <td>Description:</td>
              <td><textarea name="description" rows="8" cols="36"><?=stripslashes($_POST["description"]);?></textarea></td>
            </tr><tr></tr>
            <tr>
              <td>Upload Image:</td>
              <td><input type="file" name="file" size="40"></td>
            </tr><tr></tr>
            <tr>
              <td>I think this item is worth:</td>
              <td><input type="text" name="price" value="<?=stripslashes($_POST["price"]);?>"></td>
            <tr>
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
