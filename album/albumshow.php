<?php
   include_once "connMysql.php";
   $album_id = $_GET['id'];
   try {
          $query_RecAlbum = "
       	   SELECT album.album_title, albumphoto.*
       	   FROM album,albumphoto
       	   WHERE (album.album_id = albumphoto.album_id)AND  ( albumphoto.album_id = $album_id)
       	   ORDER BY `albumphoto`.`ap_date` DESC
          ";
          $query = $DB_con->prepare($query_RecAlbum);
          $query->execute();
          // $row_RecAlbum = $query->fetch(PDO::FETCH_ASSOC);
          $count = $query->rowCount();
   } catch (Exception $e) {
       echo 'Caught exception: ',  $e->getMessage(), "\n";
   }

	
?>

<h1></h1>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
</head>
<body>

<span>總共<?php echo $count?>張</span>
<ul>
	<?php 
	  $i=1;
	  while($row = $query->fetch(PDO::FETCH_ASSOC)){
	  	$showTitle = $i!==1 ? '':'<h1 style="color:red">['.$row['album_title'].']</h1>';
	  	?>
		<?php echo $showTitle ?>
		<li>	
				<figure>
					<img src="<?php echo $row['ap_picurl'] ?>" alt="<?php echo $row['ap_subject'] ?>">
				</figure>
				<h2><?php echo $i++."/". $row['ap_subject'] ?></h2>
				<figcaption>
				<?php echo $row['ap_desc'] ?> 	
				</figcaption>
		</li>

	<?php 
	  }
	?>
</ul>
   
 <a onclick="window.history.back()">返回上一頁</a>  

</body>
</html>

<script>	


</script>