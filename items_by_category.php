<?php 
session_start();
include('header_menuleft.php'); 
include('config.php'); 
$category_id = $_GET['id'];
?>
    <?php 
    $qry = mysql_query("SELECT * FROM `categories` WHERE `category_id` = '$category_id'");
    if (mysql_numrows($qry) != 0)
    {
      $data = mysql_fetch_array($qry);
    }?>
     
     <div class="selling_box_body">
     <h2><?echo $data['category_name']?></h2>
     

<?php

    

     $query3 = mysql_query("SELECT * FROM `items` WHERE `category_id`='$category_id'");
     $endline_count=0;
     while ($row = mysql_fetch_assoc($query3)) 
     {           $item_id = $row['item_id'];
                 $user_id = $row['user_id'];
                 $creation_date = $row['creation_date'];
                 $expiration_date = $row['expiration_date'];
                 $price = $row['price'];
                 $status = $row['status'];
                 $type = $row['type'];
                 $name = $row['name'];
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
            <div class='center_prod_box'>            
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

if($endline_count==4)
{
  $endline_count=0;
  echo "<br>";
}
                    }
                }
              }
     

?>

</div>

<?php

include('footer.php'); 
?>
 
