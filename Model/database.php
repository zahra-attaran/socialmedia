<?php
//create mysql object
$db = new mysqli("localhost","root","","socialmedia");
if($db->connect_error)
{
    echo "error!";
    echo $db->connect_error;
}
else{
    $db->query("SET CHARACTER SET utf8");
}

?>