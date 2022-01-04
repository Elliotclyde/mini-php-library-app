<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include "header.html";
include "database.php";

$book = getBookBySlug($_GET["slug"]);
if($book == null){
    header('Location: /');
}
?>
<h1><?=$book["title"] ?></h1>
<p>Author: <?=$book["author"] ?></p>
    
</body>
</html>