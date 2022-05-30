<?php

include "Model/database.php";
try{
    $text = $_POST["textcomment"];
    $post_id = $_POST["id_post"];
    $user_id =$_SESSION["UserID"];


//echo $text . $post_id . $user_id;
//
    $result=$db->query("INSERT INTO comment(text, post_id, user_id) VALUES('$text', $post_id, $user_id)");

    echo 1;
}

catch (Exception $e){
    echo 0;
}

// header("Location: home.php");



?>