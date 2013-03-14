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
		$query = "SELECT * FROM `items` WHERE `status` = 1 AND `name` LIKE '%{$search}%' AND `description` LIKE '%{$search}%'";
		 $data = mysql_query($query); 
		 echo "<div id='all_items'>"; 
		 while($info = mysql_fetch_array($data)) 
		 { 
			$image = $info['picture'];
			if(empty($image))
				$image = 'http://www.worldofchemicals.com/Woclite/tmp/chem/no_image.gif';		
			else
				$image = "uploads/".$image;
		?>
			<div class="item_in_list">
				<div class="item_in_list_image">
					<img height="150" weight="150" alt="<?=$info['name'];?>" src="<?=$image?>">
				</div>
				<div class="item_in_list_description">
					<?=stripslashes(substr($info['description'],0,150));?>
				</div>
				<div class="item_in_list_price">
					<?=stripslashes(substr($info['price'],0,150));?> &#163;
				</div>				
			</div>
		 <? } 
		 echo "</div>"; 
	} // if
	?>

</div>
<!-- Footer information -->
<?php include('footer.php'); ?>
