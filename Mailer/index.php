
<body>



    <!-- contact -->
    <section class="container contact">

      <div class="row">
      <div class="col s12">
    	<h2 class="heading-1 title">填寫需求/詢價表單</h2>
    	<div class="heading-2 sub_title">
    	<div class="paragraph text">
    		如有任何詢價或規格詢問 歡迎填寫下列表單 我們會立即與您洽談
    		或直接<a href="#">聯絡我們</a>
    	</div>
    	</div>
    	<form action="" method="post" class="form"  id="submitBtn">
        <div class="contact_filed">
    	     <label class="heading-3">聯絡人<b class="required">*</b></label>
           <input type="text" name="name" placeholder="必填">
        </div>
        <div class="contact_filed">
           <label class="heading-3">公司名稱</label>
           <input type="text" name="company">
        </div>
        <div class="contact_filed">
           <label class="heading-3">聯絡手機<b class="required">*</b></label>
          <input type="text" name="phone" placeholder="必填 09********">
        </div>
        <div class="contact_filed">
           <label class="heading-3">聯絡信箱</label>
           <input type="text" name="mail" >
        </div>
        <div class="contact_filed">
           <label class="heading-3">驗證碼<b class="required">*</b></label>
           <img id="captcha" style="width:100px;" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
           <input type="text" name="captcha" placeholder="必填">
        </div>
        <div class="contact_filed">
           <label class="heading-3">需求說明<b class="required">*</b></label>
           <textarea rows="8" cols="0"  name="comment" placeholder="必填 請簡述訂製需求"></textarea>
        </div>
        <div class="center_align">
    		<button class="button" type="submit" >送出表單</button>
    		</div>
    	</form>
      </div>
      </div>
    </section>

<?php 
    //phpMailer
    require './sendmail.php';
    if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action 
      $sendMailer = new sendMailer();
      $isSend = $sendMailer -> sendFormToMail($_POST);
    }
?>


