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
            
            $updatedBook = updateBook($book["id"],$_POST["title"],$_POST["author"],$_POST["slug"]);
            $book = $updatedBook;
            ?>
            <p>Book updated</p>
            <?php
        }
    }

    ?>
<form action="./edit.php?slug=<?=$book["slug"]?>" method="POST">
        <input type="hidden" name="id" value="<?=$book["id"] ?>"><!-- Insert id -->
        <label for="title-input" >Title</label>
        <input type="text" name="title" id="title-input" value="<?=$book["title"] ?>">
        <label for="author-input" >Author</label>
        <input type="text" name="author" id="author-input" value="<?=$book["author"] ?>">
        <label for="slug-input">Slug</label>
        <input type="text" name="slug" id="slug-input" value="<?=$book["slug"] ?>">
        <input type="submit" value="Update">
    </form>
</body>
</html>