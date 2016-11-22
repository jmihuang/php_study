<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>

<?php 
	$who ="Lorem ipsum dolor sit amet, consectetur adipisicing elit. A odio rem sint, incidunt possimus culpa recusandae dolore harum ullam atque similique mollitia amet, id animi reiciendis, voluptas. Earum, aspernatur, pariatur.";
	$greeting = "hello World";
	echo $who ." said ". $greeting . "everyday" ;
?>
<p>計算長度<?php echo strlen($who) ?></p>
<p>is it rainny today?
<?php
   $todayWeather = "raniny";
   if( $todayWeather == "raniny"){
      echo "Yes";
   }else{
      echo "No";
   }
?>

<?php
$car = ["Volvo", "BMW", "Toyota"];
echo "I like this car". $car[0] .",how about u";
echo var_dump($car);
?>

<!-- 
associative -->
<?php
	
    $peter = array(
    	'age' => '32',
    	'height' => '185cm',
    	'weight' => '80kg'
    );?>
   <p> 
   <?php
   echo 'he is '.$peter['age'].' years old ,his '.$peter['height'].' and '. $peter['weight'].'<br/>';

  ?>
    </p>



<!-- 多維陣列 -->
<?php
  
  $contry = array(
      "taichung" => array(
           "西屯區",
           "北屯區",
           "南屯區",
           "中區"
        ),
      "taipei" => array(
           "中山區",
           "中正區",
           "北投區"
        )

    );

  print_r($contry['taichung'][0]);
?>



<!-- while迴圈 -->
<?php
  $i=0;
  while($i<=5){
    ?>

     <span><?php echo $i++?></span>
<?php     
  }
?>



<!-- for迴圈 99乘法表 -->
<table>
<?php 
  for ( $i = 1; $i<=9; $i++){
      echo '<tr>';
      for ( $j = 1; $j<=9; $j++){
        echo '<td>'.$i*$j.'</td>';
      }
      echo '</tr>';
  }
?>
</table>

<!-- foreach迴圈 -->
<?php

   foreach( $peter as $index => $item ){
     echo 'Index: ' . $index . ',Value: ' . $item . '<br />';
   } 
   $season = array('spring','summer','Autum','winter');

   foreach( $season as $value){
      echo '一年有四季'. $value.'<br/>';
   }
?>
<!-- foreach 也可用for達成 -->
<?php
    for( $i = 0; $i < count($season); $i++){
      echo '<p>foreach 也可用for達成'.$season[$i].'</p>';
    }
?>
<!-- function -->
<?php 
function greeting(){
  echo 'hello,Mr. J';
}

?>
<p>問候語<?php greeting();?></p>


<!-- 函數(帶參數) -->

<?php
function gender($n){
  echo $n;
}
?>
<p>男生<?php gender('boy')?></p>
<p>女生<?php gender('girl')?></p>

<!-- 函數 ( 帶參數 + 回傳值 ) -->
<?php
   function sum($num1,$num2){
      $summary = $num1+$num2;
      return $summary;
   } 
?>
<p>1255+200=<?php echo sum(1255,200)?></p>

<!-- GET傳遞變數 -->

<!-- index.php?參數1=123&參數2=鬼才好厲害
 -->
<?php
 echo urlencode("鬼才好厲害");
 print_r($_GET);
 // print_r($_GET['參數1']);
?>

<!-- GET判斷有沒傳值 -->
<?php
if( isset($_GET['v1'])){
 ?> 
  <p>GET判斷有傳值<?php $_GET['v1'];?></p>
<?php
 }else{
  ?>
  <p>GET判斷沒傳值</p>
  <?php 
 }
?>

<form action="test.php" method="post" enctype="multipart/form-data">
  <input type="text" name="user_name" />
  <input type="password" name="user_password" />
      <input type="submit" value="登入" />
    <input type="reset" value="重填" />
</form>
<?php
$names = array(
  'Alice Alfred',
  'Bob Bell'
);
$names[] = 'Carol Chaplin';
echo $names[2];
print_r($names);
?>

</body>
</html>