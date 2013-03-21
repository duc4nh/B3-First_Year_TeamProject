<?php 
session_start();
include_once("functions.php");
$user_id = escape_value($_GET['user']);
if(!empty($_POST) AND !empty($_SESSION['email']))
{
	include_once('functions.php');
	$subject = escape_value($_POST['subject']);
	$message = escape_value($_POST['message']);
	if(empty($subject) OR empty($subject))
	$errors[] = 'All fields must be filled<br>';

	require_once('recaptchalib.php');
	$privatekey = "6Ld5t94SAAAAADVqD1eibxkzT3-v-Ue-PJ_gp0NJ ";
	$resp = recaptcha_check_answer ($privatekey,
		                $_SERVER["REMOTE_ADDR"],
		                $_POST["recaptcha_challenge_field"],
		                $_POST["recaptcha_response_field"]);

	if (!$resp->is_valid) {
	// What happens when the CAPTCHA was entered incorrectly
	$errors[] = "Please enter right captha";
	} else {
if(!is_array($errors))	{
include_once('config.php');
$userToSend = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `user_id` = $user_id"));
$toEmail = $userToSend['email'];
$headers = "From: {$_SESSION['email']}\r\n";
$headers .= "Reply-To: {$_SESSION['email']}\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";			
$message = '<html><body>';
mail($toEmail, $subject, $message, $headers);
$sent = true;
} // if

	} // captcha
        


} //if

?>
<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
      </br>
      </br>
      <?php
      if(empty($_SESSION['name'])) 
      {
        echo "Please log in to contact user user";
	}
      elseif($sent)
	{
	echo "Your message sent";
}else{
      ?>
<?php include_once('config.php'); 

?> 

      <div id="register_box">
        <form name="input" action="" method="post">
          <fieldset>
	      <legend>Contact user:</legend></br>
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

            <td width="1%">Subject: </td>
              <td><input type="text" name="subject" style="width: 200px;" value="<?echo $_POST['subject']?>"></td>
            </tr><tr></tr>
            <tr>
	    
	    <td width="1%">Message</td>
              <td><textarea name="message"><?echo $_POST['message'];?></textarea></td>
            </tr><tr></tr>
            <tr>
	     
	     <td width="1%">Security check: </td>
              <td style="height: 133px;">
  <script type="text/javascript"
     src="http://www.google.com/recaptcha/api/challenge?k=6Ld5t94SAAAAABdIc2zapY4ASfvIDocDwUuefDbz">
  </script>
  <noscript>
     <iframe src="http://www.google.com/recaptcha/api/noscript?k=6Ld5t94SAAAAABdIc2zapY4ASfvIDocDwUuefDbz"
         height="300" width="500" frameborder="0"></iframe><br>
     <textarea name="recaptcha_challenge_field" rows="3" cols="40">
     </textarea>
     <input type="hidden" name="recaptcha_response_field"
         value="manual_challenge">
  </noscript>

</td>
            </tr><tr></tr>
            <tr>
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
