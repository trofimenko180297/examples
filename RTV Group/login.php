<!DOCTYPE html>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Log</title>
</head>
<body><?php if(isset($msg)) { ?><?=$msg;?><?php } ?>
<form class="reg" action="php/auth/login.php" method="post">
    <label for="login">Login</label>
    <input type="text" id="login" name="login" placeholder=" Логін" /><br />
    <label for="password" >Password</label>
    <input type="password" id="password" name="password" placeholder=" Пароль"><br />
    <input id="send" type="submit" value="Увійти" /><br />
</form>
</body>
</html>
