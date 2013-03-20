<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>  
<!-- Main body for page -->
<?

$item_id = $_GET['id'];
mysql_query("DELETE FROM `items` WHERE `items`.`item_id` = $item_id");
echo "The item has been deleted. <a href='index.php'>Click here </a> to go back to Home Page!";

?>
<!-- Main body for page ends -->  
<!-- Footer information -->
<?php include('footer.php'); ?>
