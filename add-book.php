<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include "header.html";
    include "database.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $errorExists = false;
        if (!isset($_POST["title"])|| $_POST["title"]==="" ){
            ?>
            <p class="error">No title recieved</p>
            <?php
            $errorExists = true;
        }
        if (!isset($_POST["author"])|| $_POST["author"]==="" ){
            ?>
            <p class="error">No title recieved</p>
            <?php
            $errorExists = true;
         }
        if (!isset($_POST["slug"])|| $_POST["slug"]==="" ){
            ?>
            <p class="error">No slug recieved</p>
            <?php
            $errorExists = true;
        }

        if(!$errorExists){
            $book = createBook($_POST["title"],$_POST["author"],$_POST["slug"]);
            ?>
            <p>New book created: <?=$book["title"]?> </p>
            <?php
        }

    }
    ?>
    <form action="./add-book.php" method="POST">
        <label for="title-input" >Title</label>
        <input type="text" name="title" id="title-input" >
        <label for="author-input" >Author</label>
        <input type="text" name="author" id="author-input" >
        <label for="slug-input">Slug</label>
        <input type="text" name="slug" id="slug-input" >
        <input type="submit" value="Add book">
    </form>
</body>
</html>