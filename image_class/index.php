<?php
require_once ('classSimpleImage.php');

$image = new SimpleImage();
$image->load($_FILES['picture']['tmp_name']);
$image->resize(400, 200);
$image->save('image1.jpg');
?>







<form method="post" enctype="multipart/form-data">
    <input type="file" name="picture"></br><br/>
    <input type="submit">
</form>
