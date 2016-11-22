<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <?php 
    //分行標籤
    $showstr = "\nOne line.\nAnother line.";
    echo $showstr;
    echo nl2br($showstr);

    //剥去字符串中的 HTML 标签
    echo strip_tags("Hello <b>world!</b>");

  ?>
</body>
</html>