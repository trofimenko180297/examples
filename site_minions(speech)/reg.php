<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <?php include ('php/register.php'); ?>
  <title>TEST</title>
<script type="text/javascript">
    function valid(form)
    {
      var name = form.user.value;
      var login = form.login.value;
      var email = form.email.value;
      var password = form.password.value;
      var repassword = form.confirm.value;
      var fail = false;
      var true_email = /[0-9a-z_-]+@[0-9a-z_-]+\.[a-z]/i;
        if(name == "" || login == "" || password == "" || repassword == ""){
          fail = "Присутні пусті поля!"
        }else if (password != repassword) {
          fail = "Різні паролі!";
        }else if (true_email.test(email) == false) {
          fail = "Невірна адреса!"
        }
          if(fail){
            alert(fail);
          }
    }

    var speaker = new webkitSpeechRecognition();
    var words = "";
    var synth = window.speechSynthesis;
    speaker.interimResults = true;
    speaker.lang = 'uk-UK';
    speaker.onresult = function (event) {
        var result = event.results[event.resultIndex];
        if (result.isFinal) {
            words = result[0].transcript;
            retran();
        } else {
            console.log('Промежуточный результат: ', result[0].transcript);
        }
    };

    function retran()
    {
        if(words.indexOf("вхід") != -1 || words.indexOf("увійти") != -1){
            var utterance = new SpeechSynthesisUtterance('authentication page');
            synth.speak (utterance);
            window.location = "auth.html";
        }else if(words.indexOf("інформація") != -1 && words.indexOf("вас") != -1){
            var utterance = new SpeechSynthesisUtterance('information about us');
            synth.speak (utterance);
            window.location = "about.html";
        }else if(words.indexOf("зворотній зв'язок") != -1 || words.indexOf("повідомлення") != -1){
            var utterance = new SpeechSynthesisUtterance('write your message for us');
            synth.speak (utterance);
            window.location = "feedback.html";
        }else if(words.indexOf("реєстрація") != -1 || words.indexOf("зареєструватись") != -1){
            var utterance = new SpeechSynthesisUtterance('registration on web site');
            synth.speak (utterance);
            window.location = "reg.html";
        }else if(words.indexOf("головна") != -1 || words.indexOf("головну") != -1){
            var utterance = new SpeechSynthesisUtterance('general page');
            synth.speak (utterance);
            window.location = "index.html";
        }
    }

    function speech()
    {
        speaker.start();
        setTimeout("speech()", 8500);
    }

    function reg_ok()
    {
       $('#check').animate({
           width: $('#check').width() * 100,
           height: $('#check').height() * 100
       },800);


    }
</script>
</head>
<body onload="speech()">
<div id="page">
<header>
<a href="index.php" title="На головну" id="logo">TROFIMENKO</a><span class="contact"><a href="about.html" title="Інформація про нас">Про нас</a></span>
<input type="text" class="field" placeholder="Пошук" /><span class="right"><span class="contact"><a href="reg.php" title="Зареєструватись">Реэстрація</a></span>
<span class="contact"><a href="auth.php" title="Вхід">Увійти</a></span>
</span>
</header>
<center>
  <div id="menu">
      <a href="about.html">Про нас</a>
      <a href="feedback.html">Зворотній зв'язок</a>
      <a href="auth.php">Вхід</a>
      <a href="reg.php">Реєстрація</a>
  </div>
<!--<span class="right" id="speak"><img src="img/speak.png" onclick="speech()" title="Розпізнати мову"></span>-->
</center>
<div id="wrapper">
    <div id="articles"><?php if (isset($msg)) { ?><center><span id="message"><?=$msg?></span></center><?php } ?>
        <?php if (!$ok) { ?>
        <form class="reg" action="" method="post" id="form">
        <label for="name" >User name</label>
          <input type="text" id="name" name="user" placeholder=" Ім'я" value="<?=$register->getUser()?>">
        <label for="login">Login</label>
          <input type="text" <?php if (isset($result)) {?>class="warning" <?php } ?> id="login" name="login" placeholder=" Логін" value="<?=$register->getLogin()?>"/>
          <label for="email" >Email</label>
            <input type="email" <?php if (isset($result_email)) {?>class="warning" <?php } ?> id="email" name="email" placeholder=" Ел.пошта" value="<?=$register->getEmail()?>"/>
        <label for="password" >Password</label>
          <input type="password" id="password" name="password" placeholder=" Пароль" value="<?=$register->getPassword()?>"/>
          <label for="password_confirm" >Confirm password</label>
            <input type="password" id="password_confirm" name="confirm" placeholder=" Повторіть пароль" value="<?=$register->getPassword()?>"/>
          <input id="send" type="submit" value="Відправить" onclick="valid(document.getElementById('form'))" /><br />
      </form>
        <?php }else{ ?><center><img id="check" src="img/check.png" onload="reg_ok()" /></center><?php } ?>
    </div>
</div>
</div>
<footer>
<span class="left" id="foo">Всі права захищені &copy 2017</span>
<span class="right" id="social"><a href="http://vk.com/id65839255" target='_blank'><img src="img/vk.png" alt="Вконтакті"></a></span>
</footer>
</body>
</html>
