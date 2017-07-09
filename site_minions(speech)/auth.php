<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
  <!--<script type="text/javascript" src="JS/script.js"></script>-->
  <?php
  include ("php/login.php");
  require_once "php/session.class.php";
  ?>
  <title>Login</title>
<script>
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
        if(words.indexOf("вхід") != -1 || words.indexOf("увійти") != -1 || words.indexOf("Увійти") != -1){
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
        }else if(words.indexOf("привіт") != -1){
            var utterance = new SpeechSynthesisUtterance('Hello');
            synth.speak (utterance);
        }else if(words.indexOf("справи") != -1){
            var utterance = new SpeechSynthesisUtterance('I am fine,thanks');
            synth.speak (utterance);
        }
    }

    function speech()
    {
        speaker.start();
        setTimeout("speech()", 8500);
    }
</script>
</head>
<body onload="speech()">
<div id="page">
<header>
<a href="index.php" title="На головну" id="logo">TROFIMENKO</a><span class="contact"><a href="about.html" title="Інформація про нас">Про нас</a></span>
<input type="text" class="field" placeholder="Пошук" />
<span class="right"><?php if (Session::has('user')) { ?><span class="contact"><a href="php/logout.php" title="Вийти"><?=Session::get('user')?>, Вихід</a></span><?php }else{ ?>
<span class="contact"><a href="reg.php" title="Зареєструватись">Реэстрація</a></span>
<span class="contact"><a href="auth.php" title="Вхід">Увійти</a></span></span><?php } ?>
    <div class="clear"></div>
</header>
<center>
  <div id="menu">
      <a href="about.html">Про нас</a>
      <a href="feedback.html">Зворотній зв'язок</a>
      <?php if (Session::has('user')) { ?><a href="php/logout.php">Вихід</a><?php }else{ ?>
      <a href="auth.php">Вхід</a>
      <a href="reg.php">Реєстрація</a><?php } ?>
  </div>
<!--<span class="right" id="speak"><img src="img/speak.png" onclick="speech()" title="Розпізнати мову"></span>-->
</center>
<div id="wrapper">
    <div id="articles"><?php if (isset($msg)) { ?><center><span id="message"><?=$msg?></span></center><?php } ?>
      <form class="reg" action="" method="post">
        <label for="login">Login</label>
          <input type="text" id="login" name="login" placeholder=" Логін" />
        <label for="password" >Password</label>
          <input type="password" id="password" name="password" placeholder=" Пароль">
          <input id="send" type="submit" value="Увійти" /><br />
      </form>
    </div>
</div>
</div>
<footer>
<span class="left" id="foo">Всі права захищені &copy 2017</span>
<span class="right" id="social"><a href="http://vk.com/id65839255" target='_blank'><img src="img/vk.png" alt="Вконтакті"></a></span>
</footer>
</body>
</html>
