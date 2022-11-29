<?php

session_start();
include '../includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST)) {
    die("You are Unethical person !!");
} else {
    $un = $_POST["username"];
    $pass = $_POST["pass"];
    $usersData = json_decode(file_get_contents("../local_data/users.json"));
    foreach ($usersData as $userdata) {
        if ($un == $userdata->username  && $pass == $userdata->password) {
            $_SESSION["validUserData"] = $userdata;
            $_SESSION["vaildUserName"] = $userdata->display_name;
            ani_redirect("../home.php");
        }
    }
    $_SESSION["errorMsg"] = "The username or password you’ve entered is incorrect !";
    ani_redirect("../");
}