<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->
  <div id="body">
    <div id="top_search">
      <input class="search_box" type="text"><input class="search_button" value="SEARCH" type="submit"/>
    

Welcome to the registration page</br>

Please fill the blanks for creating new account</br>


<form name="input" action="register.php" method="get">
Username: <input type="text" name="regname"><br>
E-mail adress: <input type="text" name="regemail"><br>
Password: <input type="text" name="regpass1"><br>
Re-type password: <input type="text" name="regpass2"><br>
<input type="submit" value="Submit">
</form>
   
    </div>
   
  </div>

  <!-- Main body for page ends -->
  
<!-- Footer information -->
<?php include('footer.php'); ?>
