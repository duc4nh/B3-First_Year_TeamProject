<!-- header and menu left -->
<?php include('header_menuleft.php'); ?>
  
<div class="main_body">

  <!-- Main body for page ends -->
	<?php
	if(!empty($_POST['search']))
	{
		include_once("config.php");
		include_once("functions.php");
		$search = escape_value($_POST['search']);
		$query = "SELECT * FROM `items` WHERE `status` = 1 AND `name` LIKE '%{$search}%' OR `description` LIKE '%{$search}%'";
		 $data = mysql_query($query); 
		 echo "<div id='all_items'>"; 
		 if(mysql_num_rows($data))
		 {
			 while($info = mysql_fetch_array($data)) 
			 { 
				$image = $info['picture'];
				if(empty($image))
					$image = 'images/no_image.jpg';		
				else
					$image = "uploads/".$image;
			?>
				<div class="item_in_list">
					<div class="item_in_list_image">
						<a href="item_page.php?id=<?=$info['item_id']?>"><img height="150" width="150" alt="<?=$info['name'];?>" src="<?=$image?>"></a>
					</div>
					<div class="item_in_list_name">
						<a href="item_page.php?id=<?=$info['item_id']?>"><b><?=stripslashes(substr($info['name'],0,150));?></b></a>
					</div>
					<div class="item_in_list_description">
						<a href="item_page.php?id=<?=$info['item_id']?>"><?=stripslashes(substr($info['description'],0,150));?></a>
					</div>
					<div class="item_in_list_price">
						<?=stripslashes(substr($info['price'],0,150));?> &#163;
					</div>				
				</div>
			 <? } 
		 } // if
		 else
			echo "Nothing found";
		 echo "</div>"; 
	} // if
	?>

</div>
<!-- Footer information -->
<?php include('footer.php'); ?>
