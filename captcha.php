<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>


<!-- captcha -->
<form action="testcaptcha.php" method="post">
  <label for="token" >
  驗證碼 : <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" /></label>

<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Different Image ]</a>

  <input type="text" name="captcha_code" id="captcha_code"  />
    <input type="submit"  />


</form>


</body>
</html>