<?php
include "Model/database.php";

$password = $_POST["password"];
$account_name = $_POST["account-name"];
$secure_password=md5($password);
$result=$db->query("SELECT * FROM users WHERE username='$account_name' and pass='$secure_password'");
$user_count= $result -> num_rows;
if($user_count==1){
    $user=$result->fetch_assoc();
    $_SESSION["login_status"]=true;
    $_SESSION["UserName"]=$account_name;
    $_SESSION["UserID"]=$user["id"];

    header("Location: home");

}

else{
    $_SESSION["message"] = "نام کاربری یا گذرواژه شما صحیح نمی باشد";
    $_SESSION["message_type"] = "error";
    header("Location: index");
}

?>