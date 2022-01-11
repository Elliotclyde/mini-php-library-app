<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "header.html"; ?>
    <h1>Your Books</h1>
    <ul>
<?php
include "database.php";
include "utility.php";



$books = getAllBooks();
for($i = 0; $i < count($books); $i++)
    {
    ?>
    
    <li>
        <a href="book.php?slug=<?= spaceToDash($books[$i]["slug"]) ?>"><?= $books[$i]["title"] ?></a>
        <a href="edit.php?slug=<?= spaceToDash($books[$i]["slug"]) ?>">Edit</a>
        <button class="delete-button" data-book-id="<?= $books[$i]["id"]?>">Delete</button>
    </li>
    <?php
    }
?></ul>
<script src="script.js"></script>
</body>
</html>
