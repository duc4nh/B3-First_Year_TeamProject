<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
  <!-- Main body for page -->
  <div id="body">
    <div id="top_search">
      <input class="search_box" type="text"><input class="search_button" value="SEARCH" type="submit"/>
    
        </br>
        </br>
        <h3>Welcome to the registration page</h3></br>

        Please fill the blanks for creating new account</br>
        </br>
      <div id="register_box">
        <form name="input" action="register.php" method="get">  
          <table width="100%" border="0" cellpadding="0" cellspacing="2">
            <tr>
            <td width="1%">Username: </td>
              <td><input type="text" name="regname"></td>
            </tr><tr></tr>
            <tr>
              <td width="1%"> E-mail adress: </td>
              <td> <input type="text" name="regemail"></td>
            </tr><tr></tr>
            <tr>
              <td width="1%">Password:</td>
              <td><input type="password" name="regpass1"></td>
            </tr><tr></tr>
            <tr>
              <td width="1%">Re-type password: </td>
              <td><input type="password" name="regpass2"></td>
            <tr>
              <td>&nbsp;</td>
              <td><button type="submit" />     Submit      </button></td>
            </tr><tr></tr>
          </table>
        </form>
      </div>
    </div>
   
  </div>

  <!-- Main body for page ends -->
    
<!-- Footer information -->
<?php include('footer.php'); ?>
