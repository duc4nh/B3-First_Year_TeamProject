<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->

</br>
<h3>Welcome to the registration page</h3>
Please fill the blanks below</br></br>

<div id="register_box">
  <form name="input" action="register.php" method="post" enctype="multipart/form-data">
    <fieldset style="padding-left: 6px;">
      <legend>Personal information:</legend></br>
      <table width="100%" border="0" cellpadding="0" cellspacing="2">
      <tr>
      <td width="230px">Your first name:</td><td><input type="text" name="refirstname"><br></td>
      </tr><tr></tr>
      <tr>
      <td>Your last name:</td><td><input type="text" name="relastname"><br></td>
      </tr><tr></tr>
      <tr>
      <td>E-mail adress:</td><td><input type="text" name="regemail"><br></td>
      </tr><tr></tr>
      <tr>
      <td>Password:</td><td><input type="password" name="regpass1"><br></td>
      </tr><tr></tr>
      <tr>
      <td>Re-type password:</td><td><input type="password" name="regpass2"><br></td>
      </tr><tr></tr>
      <tr>
      <td> <label for="file">Upload Your Image:</label> </td>
      </tr><tr></tr>
      <td><input type="file" name="file" size="40"></td>
      <tr>
      <td><input type="submit" value="Register"></td>
      </tr><tr></tr>
      </table></br>
    </fieldset>  
  </form>
</div>

  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
