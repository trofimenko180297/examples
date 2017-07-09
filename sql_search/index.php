<?php
include_once ('sqli.php');
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'fulltext_db';
$db = new DB($host,$user,$password,$db_name);
$time = '';
if (isset($_POST['word']) && !empty($_POST['word'])) {
    $word = $db->escape($_POST['word']);
    $query = "SELECT * from test_table WHERE MATCH (content) AGAINST ('$word')";
$start = microtime(true);
    $result = $db->query($query);
$end = microtime(true);
$time = $end - $start;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">
    <title>Search</title>
</head>
<body>
<div id="form">
    <form method="post" action="">
        <label for="word">Пошук:</label>
        <input type="text" id="word" name="word">
        <input type="submit" value="Search">
    </form>
</div>
<div>
    <h3>Час виконання скрипту:<?=1000*round($time,4)?>мс</h3>
</div>
<div id="result">
    <table id="table">
    <?php if (isset($result)) { foreach ($result as $item){ ?>
     <tr>
         <td><?=$item['title']?></td>
         <td><?=$item['content']?></td>
     </tr>
    <?php } ?>
    <?php } ?>
    </table>
</div>
</body>
</html>
