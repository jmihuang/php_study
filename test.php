<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>

<p>
GET : <?php print_r($_GET);?>
</p>
<p>
POST : <?php print_r($_POST);?>
</p>
<!-- 檔案上傳 -->
<?php print_r($_FILES) ?>
  $_FILES:<?php print_r($_FILES['file_upload']['name'] ) ?>

<!-- 驗證碼是否正確 -->

<?php
  session_start();
  print_r($_SESSION['token']);
if( $_SESSION['token'] == $_POST['token']){
	echo '<p>驗證碼正確</p>';
}else{
	echo '<p>驗證碼錯誤</p>';
}
?>


</body>
</html>
