<!-- header and menu left -->
<?php include_once("functions.php"); 
include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->
  
<?php
$email = escape_value($_POST['regemail']);
$pass1 = escape_value($_POST['regpass1']);
$pass2 = escape_value($_POST['regpass2']);
$firstname = escape_value($_POST['refirstname']);
$lastname = escape_value($_POST['relastname']);
$picture = escape_value($_POST['repicture']);


include('config.php');
$result = mysql_query("SELECT * FROM users WHERE email = '$email' ");
$numrows = mysql_num_rows($result);
 
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
if (!preg_match('/^[a-zA-Z\" "]*$/', $firstname) 
    || !preg_match('/^[a-zA-Z\" "]*$/', $lastname)
    || !preg_match("~^(\w|\\-|\\.){1,}@(([a-z]|[A-Z]|\\-)*\\.?)*\\.([a-z]|[A-Z]|\\-){1,4}$~", $email)
    || $pass1!=$pass2)
    {
      echo "<h2>Sorry. Your inputs are invalid!</h2>";
      echo "Click <a href='registerForm.php'>here</a> to try again.";
    }  
    else 
      if($numrows != 0)
      {
        echo "<h2>Sorry. User email is already in use.</h2>";
        echo "Click <a href='registerForm.php'>here</a> to try again.";
      }
      else
      {
        mysql_query("INSERT into users (email, password, name, last_name , picture) values('$email','".md5($pass1)."','$firstname','$lastname','$file')") or die (mysql_error());
        echo "<h2>Thank you!!! You have sucessfully registered</h2>";
        echo "Please log in, on the top of the page";
      }
			
if(is_array($errors)) {
	echo "<div style='color:red;'>";
	foreach($errors as $e) {
		echo "<p>{$e}</p>";
	}
	echo "</div>";
}
			
?>
  
  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
