<?php

include "Model/database.php";

$password = $_POST["password"];
$confirm_password = $_POST["confirm-password"];

if ($password !== $confirm_password) {
    header("Location: index.php");
}
else {
    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];

    $account_name = $_POST["account-name"];
    $email = $_POST["email"];

    $mobile_number = $_POST["mobile-number"];

    $form_check_value = $_POST['gender'];

    $birthday = $_POST["date-of-birth"];

    if ($form_check_value == "female") {
        $gender = 0;
    } else {
        $gender = 1;
    }
//   check krdn uniq bodan username
    $user_count = $db->query("SELECT * FROM USERS WHERE username=$account_name")->num_rows;
    if ($user_count == 0) {
        $secure_password = md5($password);
        $db->query("INSERT INTO users(first_name, last_name, username, pass, email, mobile, gender, birtday) VALUES ('$first_name', '$last_name', '$account_name', '$secure_password', '$email', '$mobile_number', $gender, '$birthday')");

        $_SESSION["message"] = "تبریک به جمع ما خوش آمدی";
        $_SESSION["message_type"] = "tabrik";
    } else {
        $_SESSION["message"] = "نام کاربری شما تکراری است";
        $_SESSION["message_type"] = "error";
    }


    header("Location: index.php");

}