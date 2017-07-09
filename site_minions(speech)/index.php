<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />
  <link href="img/icon.ico" rel="shortcut icon" type="image/x-icon" />
  <!--<script type="text/javascript" src="JS/script.js"></script>-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <?php
        session_start();
        require_once "php/session.class.php";
   ?>
<script>

    /* Зміна мікрофона */
    $(document).ready(function () {
       $("#speak_img").bind("click", function () {
           var src = (($(this)).attr("src") === "img/speak_off.png") ? "img/speak.png" : "img/speak_off.png";
           $("#speak_img").attr("src", src);
           speech();
       });
    });
    /* _____КІНЕЦЬ_____ */


    /* Розпізнавання мови і спікер */
    var speaker = new webkitSpeechRecognition();
    var words = "";
    var synth = window.speechSynthesis;
    var take_on = false;
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
        if(speaker){
            speaker.stop();
            return;
        }
        setTimeout("speech()", 9000);
        speaker.start();
    }
    /*_______КІНЕЦЬ__________*/

</script>

</head>
<body>
<div id="page">
<header>
<a href="index.php" title="На головну" id="logo">TROFIMENKO</a><span class="contact"><a href="about.php" title="Інформація про нас">Про нас</a></span>
<input type="text" class="field" placeholder="Пошук" />
<span class="right"><?php if (Session::has('user')) { ?><span class="contact"><a href="php/logout.php" title="Вийти"><?=Session::get('user')?>, Вихід</a></span><?php }else{ ?>
<span class="contact"><a href="reg.php" title="Зареєструватись">Реэстрація</a></span>
<span class="contact"><a href="auth.php" title="Вхід">Увійти</a></span></span><?php } ?>
<div class="clear"></div>
</header>
<div class="all">
<div class="center">
  <div id="menu">
      <a href="about.php">Про нас</a>
      <a href="feedback.php">Зворотній зв'язок</a>
      <?php if (Session::has('user')) { ?><a href="php/logout.php">Вихід</a><?php }else{ ?>
      <a href="auth.php">Вхід</a>
      <a href="reg.php">Реєстрація</a><?php } ?>
  </div>
</div>
<span class="right" id="speak"><img id="speak_img" src="img/speak_off.png" title="Просто скажіть,що вам потрібно" ></span>


<div id="wrapper">
    <div id="articles">
        <article>
          <img src="img/1.jpg" alt="Зображення" title="Зображення">
          <h2>Заголовок</h2>
          <p>Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!
          Текст тут!</p>
          <a href="index.html" title="Читати статтю">Читати...</a>
        </article>
        <article>
          <img src="img/2.jpg" alt="Зображення" title="Зображення">
          <h2>Заголовок</h2>
          <p>Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!
          Текст тут!</p>
          <a href="index.html" title="Читати статтю">Читати...</a>
        </article>
        <article>
          <img src="img/3.jpg" alt="Зображення" title="Зображення">
          <h2>Заголовок</h2>
          <p>Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!
          Текст тут!</p>
          <a href="index.html" title="Читати статтю">Читати...</a>
        </article>
</div>
  <div class="clear">
    <div id="main_soc_block">
<center>
    <div id="main_soc_block_in">
          <span id="more">
          <h3>Побачити більше..</h3>
          <a href="reg.php">Реєстрація</a>
          </span>
    </div>
</center>
  </div>
</div>
<div id="articles">
    <article>
      <img src="img/2.jpg" alt="Зображення" title="Зображення">
      <h2>Заголовок</h2>
      <p>Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!
      Текст тут!</p>
      <a href="index.html" title="Читати статтю">Читати...</a>
    </article>
    <article>
      <img src="img/3.jpg" alt="Зображення" title="Зображення">
      <h2>Заголовок</h2>
      <p>Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!
      Текст тут!</p>
      <a href="index.html" title="Читати статтю">Читати...</a>
    </article>
    <article>
      <img src="img/1.jpg" alt="Зображення" title="Зображення">
      <h2>Заголовок</h2>
      <p>Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!Текст тут!
      Текст тут!</p>
      <a href="index.html" title="Читати статтю">Читати...</a>
    </article>
<div class="clear"><br /></div>
</div>
</div>
</div>
<footer>
<span class="left" id="foo">Всі права захищені &copy 2017</span>
<span class="right" id="social"><a href="http://vk.com/id65839255" target='_blank'><img src="img/vk.png" alt="Вконтакті"></a></span>
<div class="clear"></div>
</footer>
</body>
</html>
