<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reg</title>
</head>
<body><?php if(isset($msg)) { ?><?=$msg;?><?php } ?>
<form class="reg" action="php/auth/register.php" method="post" id="form">
    <label for="login">Login</label>
    <input type="text" name="login" placeholder=" Логін" /><br />
    <label for="email" >Email</label>
    <input type="text" name="email" placeholder=" Ел.пошта" /><br />
    <label for="data">Data</label>
    <input type="date" name="birth" placeholder="дата"><br />
    <label for="password" >Password</label>
    <input type="password" id="password" name="password" placeholder=" Пароль" /><br />
    <input id="send" type="submit" value="Відправить" /><br />
</form>
</body>
</html>