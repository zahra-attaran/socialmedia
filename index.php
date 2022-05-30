<?php
session_start();

date_default_timezone_set("Asia/Tehran");
$request = $_SERVER["REQUEST_URI"];
$request = str_replace("/socialmedia", "", $request);

switch ($request) {
    case ("/"):
    case ("/index"):
        require "Controller/index.php";
        break;
    case ("/login.php"):
    case ("/login"):
        require "Controller/login.php";
        break;
    case ("/home.php"):
    case ("/home"):
        if (isset($_SESSION["login_status"])) {
            if ($_SESSION["login_status"] == true) {
                require "Controller/home.php";
                break;
            } else {
                require "Controller/index.php";
                break;
            }
        } else {
            require "Controller/index.php";
            break;
        }
    case ("/home2.php"):
    case ("/home2"):
        require "View/home2.php";
        break;
    case ("/personal.php"):
    case ("/personal"):
        require "Controller/personal.php";
        break;
    case ("/register_process"):
        require "Controller/register_process.php";
        break;
    case ("/logout"):
        require "Controller/logout.php";
        break;
    case ("/signIn"):
        require "Controller/login.php";
        break;
    case ("/send_comment"):
        require  "Controller/send_comment.php";
        break;
    default:
        require "Controller/404.php";
        break;
}
?>