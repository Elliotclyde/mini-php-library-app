<?php

$conn = mysqli_connect("127.0.0.1", "jonathon", "asdf","library");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function getAllBooks(){
    global $conn;
    $result = [];
    $databaseResult = $conn->query("SELECT * FROM books;");
    while($row = $databaseResult->fetch_assoc()) {
        array_push($result,$row);
        }
    return $result;
}

function getBookById($id){
    global $conn;

    $databaseResult = $conn->query("SELECT * FROM books WHERE  id=" . $id . " ;");
    if ($databaseResult->num_rows > 0) {
      return $databaseResult->fetch_assoc();
    }else{
        return null;
    }
}

function getBookBySlug($slug){
    global $conn;
    $databaseResult = $conn->query("SELECT * FROM books WHERE  slug='" . $slug . "' ;");
    if ($databaseResult->num_rows > 0) {
      return $databaseResult->fetch_assoc();
    }else{
        return null;
    }
}

function createBook($title,$author,$slug){
    global $conn;
    $conn->query("INSERT INTO `books` (`title`, `author`,`slug`) VALUES ('" . $title."', '". $author."', '".$slug."' );");
    $databaseResult = $conn->query("SELECT * FROM books WHERE  title='" . $title . "' AND author='" . $author . "' ;");
    
    if ($databaseResult->num_rows > 0) {
      return $databaseResult->fetch_assoc();
    }else{
        return null;
    }
}



