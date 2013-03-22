<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>  
<!-- Main body for page -->
<?
include_once("functions.php");
include_once("config.php");
$item_id = escape_value($_GET['id']);
$query = mysql_query("SELECT * FROM items WHERE `user_id` = '{$_SESSION['user_id']}' AND `item_id` = {$item_id}");
if(mysql_num_rows($query))
{
mysql_query("DELETE FROM `items` WHERE `items`.`item_id` = $item_id");
mysql_query("DELETE FROM `whishlist` WHERE `item_id` = $item_id");
mysql_query("DELETE FROM `Trade` WHERE `bidded_item_id` = $item_id");
echo "The item has been deleted. <a href='index.php'>Click here </a> to go back to Home Page!";
}else
echo "Wow wow wow. Item doesn't belong to you";

?>
<!-- Main body for page ends -->  
<!-- Footer information -->
<?php include('footer.php'); ?>
