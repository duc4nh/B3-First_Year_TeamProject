<?php 
session_start();
$id1 = $_SESSION['user_id'];
if(!empty($_POST) AND !empty($_SESSION['email']))
{
	include('functions.php');
	$name = escape_value($_POST['name']);
	$last_name = escape_value($_POST['last_name']);
	$email = escape_value($_POST['email']);
	$password = escape_value($_POST['password']);
	$phone_number = escape_value($_POST['phone_number']);
	$status = escape_value($_POST['status']);
	$description = escape_value($_POST['description']);
	$picture = escape_value($_POST['file']);
        
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
		
		$query = "UPDATE `users` SET 
					`name` = '{$name}', 
					`last_name` = '{$last_name}',
					`email` = '{$email}',
					`phone_number` = '{$phone_number}',
					`status` = '{$status}',
					`description` = '{$description}'";
if(!empty($password)) $query .= ", `password` = '".md5($password)."'";
if($_FILES['file']['name'] != "" AND !empty($password))	$query .= ", ";
		if($_FILES['file']['name'] != "") $query .= ", `picture` = '{$file}'";					
					$query .= " WHERE `user_id` = '{$id1}'";
		mysql_query($query);
		$id = mysql_insert_id();
		$message = "Profile successfully updated! Click <a href='userpage.php?id={$id1}'>here</a> to view
		your profile";
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['description'] = $description;
      $_SESSION['picture'] = $file;
	} // insert if

} //if

?>
<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
      </br>
      </br>
      <?php
      if(!$_SESSION) 
      {
        echo "Please log in to edit your profile";
      }
      elseif(!empty($message))
	{
	echo $message;
	}else{
      ?>
<?php include_once('config.php'); 

 $qry = mysql_query("SELECT * FROM users WHERE user_id = '$id1'");
 if (mysql_numrows($qry) != 0)
 {
   $data = mysql_fetch_array($qry);
 }?>   
	
	<h3>Edit your profile</h3></br>

        All fields are optional</br>
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

            <td width="1%">Name: </td>
              <td><input type="text" name="name" value="<?echo $data['name']?>"></td>
            </tr><tr></tr>
            <tr>
	    
	    <td width="1%">Last name: </td>
              <td><input type="text" name="last_name" value="<?echo $data['last_name'];?>"></td>
            </tr><tr></tr>
            <tr>
	     
	     <td width="1%">E-mail: </td>
              <td><input type="text" name="email" value="<?echo $data['email'];?>"></td>
            </tr><tr></tr>
            <tr>
	    
	     <td width="1%">Password: </td>
              <td><input type="password" name="password" value=""></td>
            </tr><tr></tr>
            <tr>
	    
	    <td width="1%">Phone number: </td>
              <td><input type="text" name="phone_number" value="<?echo $data['phone_number'];?>"></td>
            </tr><tr></tr>
            <tr>
            
	    <td width="1%">Upload Image:</td>
              <td><input type="file" name="file" size="40"></td>
            </tr><tr></tr>
            <tr>
	    
	    <td width="1%">Description:</td>
              <td><textarea name="description" rows="8" cols="36"><?echo $data['description'];?></textarea></td>
            </tr><tr></tr>
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
