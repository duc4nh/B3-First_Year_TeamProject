<?php 
session_start();
include('header_menuleft.php'); 
include("pagination.php");
include_once("functions.php");
include('config.php'); 
$category_id = escape_value($_GET['id']);
?>
    <?php 
$p = new pagination();
$conn = mysql_query("SELECT * FROM `items` WHERE `category_id` = '$category_id'  AND `status` = 1 ");
$j = 0;
while($temp = mysql_fetch_assoc($conn)){
	$j++;
}
if(!isset($_GET['page'])){ $page = 1; } else { $page = escape_value($_GET['page']); }
$arr = $p->calculate_pages($j, 12, $page); //pagination				

$pagehtml = "&nbsp;&nbsp;<br clear=all><p style='font-size:14px !important; display:block;'>Pages:</p> <ul class='pagination'>";
if($arr['current'] > 1){
	$pagehtml .= "<li><a href=?id={$category_id}&page={$arr['previous']}><<</a></li>";
}
$max_number = $arr['current'] + 6;
foreach($arr['pages'] as $pageid){
	if($arr['current'] == $pageid){
		$pagehtml .= "<li>{$pageid}</li>";
	} else {
		if($pageid <= $max_number AND $pageid > $arr['current'] ){
			$pagehtml .= "<li><a href=?id={$category_id}&page={$pageid}>{$pageid}</a></li>";
		}
	}
}
if($arr['current']+2 <= (int)$arr['last']){
	$arrows = $arr['current']+5;
	$pagehtml .= "<li><a href=?id={$category_id}&page={$arrows}>>></a></li>";
}
$pagehtml .= "</ul><br/>";

$i = 0;



    $qry = mysql_query("SELECT * FROM `categories` WHERE `category_id` = '$category_id'");
    if (mysql_numrows($qry) != 0)
    {
      $data = mysql_fetch_array($qry);
    }?>
     
     <div class="selling_box_body">
     <h2><?echo $data['category_name']?></h2>
     

<?php

    

     //$query3 = mysql_query("SELECT * FROM `items` WHERE `category_id`='$category_id'");
$query3 = mysql_query("SELECT * FROM `items` WHERE `category_id`='$category_id' AND `status` = 1 ORDER BY `item_id` DESC {$arr['limit']}");
     $endline_count=0;
     while ($row = mysql_fetch_array($query3)) 
     {           

		$item_id = $row['item_id'];
                 $user_id = $row['user_id'];
                 $creation_date = $row['creation_date'];
                 $expiration_date = $row['expiration_date'];
                 $price = $row['price'];
                 $status = $row['status'];
                 $type = $row['type'];
                 $name = stripslashes($row['name']);
                 $category_id = $row['category_id'];
                 $views = $row['views'];
		 
		 $picture = $row['picture'];
		 
		 if($picture == NULL)
                   $picture='images/no_image.jpg';
                 else
    	           $picture="uploads/".$picture; 
		   
              $query4 = mysql_query("SELECT * FROM users WHERE user_id = '$user_id' ");
              while ($row = mysql_fetch_assoc($query4)) 
              {
                $owner_name = $row['name'];
                $owner_last_name = $row['last_name'];
                
                    if($status == 1 )
                    {
		$endline_count++;

		 if($type == 1)
		  $print_type = "Buying";
		 else
		  $print_type = "Selling";
		 

echo "
<div class='prod_box'>
            <div class='top_prod_box'></div>
            <div class='center_prod_box blocks'>            
                 <div class='product_title'><a href='item_page.php?id=".$item_id."'>".$name."</a></div>
                 <div class='product_img'><a href='item_page.php?id=".$item_id."'><img border='0' height='94' weight='94'  src='".$picture."'></a></div>
		 <div class='creation_date'>Created: <span class='creation'>".$creation_date ."</span></div> 
                 <div class='expiration_date'>Expires: <span class='expiration'>".$expiration_date ."</span></div>
                 <div class='price_set'>Price: <span class='price'>".$price ."</span></div> 
                 <div class='created_by'>Owner: <span class='user'>".$owner_name." ".$owner_last_name."</span></div>
                 <div class='views_product'>Views: <span class='views'>".$views ."</span></div>  
                 <div class='type'>Type: <span class='type'>".$print_type." </span></div>
            </div>
            <div class='bottom_prod_box'></div>             
</div>
";

                    }
                }
              }
if($endline_count != 0)   echo $pagehtml;
if($endline_count == 0) echo "Sorry the category is empty";
?>

</div>
<script>
var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;

 $('.blocks').each(function() {

   $el = $(this);
   topPostion = $el.position().top;
   
   if (currentRowStart != topPostion) {

     // we just came to a new row.  Set all the heights on the completed row
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }

     // set the variables for the new row
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);

   } else {

     // another div on the current row.  Add it to the list and check if it's taller
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

  }
   
  // do the last row
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
   
 })
</script>

<?php

include('footer.php'); 
?>
 
