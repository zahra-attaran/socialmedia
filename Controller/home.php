<?php

include "Model/database.php";
include "Controller/functions.php";

$posts = $db->query("SELECT *, users.id AS id_karbar, post.id AS id_post FROM
                            post INNER JOIN users
                             ON post.user_id = users.id
                             order by time desc 
                             ");

$posts_array = array();

foreach ($posts as $post){
    $post_id=$post["id_post"];
    $post["comments"] =$db->query("select * from comment inner join users 
                                                        on comment.user_id = users.id
                                                        where post_id=$post_id");
    $post["likes"] = $db->query("SELECT COUNT(*) AS count FROM likes WHERE post_id = $post_id")->fetch_assoc();

    $posts_array []=$post;

}

require "view/home.php";
?>