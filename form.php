<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>
<?php
if(copy("source.txt","target.txt")){
  echo '複製成功';
}else{
  echo '失敗';
};
?> 


<form action="test.php" method="post" enctype="multipart/form-data">
  <input type="text" name="user_name" />
  <input type="password" name="user_password" />
 　　<input type="checkbox" name="item[]" value="A" checked="checked" />a
　　<input type="checkbox" name="item[]" value="B" />b
　　<input type="checkbox" name="item[]" value="C" />c
　　<input type="checkbox" name="item[]" value="D" />d
<br />
<input type="radio" name="sex" value="boy"  />男
<br />
<input type="radio" name="sex" value="girl"  />女
<br />
<input type="radio" name="sex" value="girl"  />其他
<br />
<input type="radio" name="other" value="1"  />這是另一個單選框
<br />
<input type="radio" name="other" value="2"  />這是另一個單選框2
<br/>
<textarea rows="3" cols="20" name="message">預設訊息</textarea>
<br>
<input type="hidden" name="hidden" value="hidden"  />
<br>
 
<select name="select_name">
  <option value="1">Android</option>
  <option value="2">UNITY3D</option>
  <option value="3">SHIVA3D</option>
  <option value="4">ANDROID(高階)</option>
  <option value="5" selected="selected">雲端</option>        
</select>
<br>
  <select name="cpu">
      <optgroup label="INTEL">
          <option value="i3">i3</option>
          <option value="i4">i4</option>
          <option value="i5">i5</option>
        </optgroup>
        <optgroup label="AMD">
          <option value="AM3+">AM3+</option>
          <option value="FM2">FM2</option>
        </optgroup>
    </select>
      <input type="submit" value="登入" />
    <input type="reset" value="重填" />
</form>



</body>
</html>