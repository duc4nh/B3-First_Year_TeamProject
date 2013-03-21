<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>  
<!-- Main body for page -->
<?
include_once("functions.php");
$item_id = escape_value($_GET['id']);
mysql_query("DELETE FROM `items` WHERE `items`.`item_id` = $item_id");
mysql_query("DELETE FROM `whishlist` WHERE `item_id` = $item_id");
mysql_query("DELETE FROM `Trade` WHERE `bidded_item_id` = $item_id");
echo "The item has been deleted. <a href='index.php'>Click here </a> to go back to Home Page!";

?>
<!-- Main body for page ends -->  
<!-- Footer information -->
<?php include('footer.php'); ?>
