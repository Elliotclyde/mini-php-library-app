<?php
include "database.php";

header("content-type:application/json");

$deleted = deleteBook($_POST["id"]);
if($deleted){
    echo json_encode(["result"=>"okay"]); //{result:okay}
}
else{
    echo json_encode(["result"=>"error"]);
}

?>