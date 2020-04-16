<?php
require_once "db.php";
require_once "login.inc.php";
if (isset($_POST["signup-submit"])) {
    $user = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    $username = $user["username"];
    $email = $user["email"];
    $pwd = $user["pwd"];
    $pwdRepeat = $user["pwd-repeat"];
    foreach ($user as $value) {
        if (empty($value)) {
            header("Location:../signup?error=emptyfields&username=" . $username . "&email=" . $email);
            exit();
        }
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../skapaKontosignup?error=invalidemailusername");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../skapaKontosignup?error=invalidemail&username=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../skapaKontosignup?error=invalidusername&email=" . $email);
        exit();
    } else if ($pwd !== $pwdRepeat) {
        header("Location:../skapaKontosignup?error=passwordcheck&username=" . $username . "&email=" . $email);
        exit();
    } else {
        $check = checkUsername($username);
        if ($check > 0) {
            header("Location:../skapaKontosignup?error=sqlerror=usertaken&email=" . $email);
            exit();
        } else {
            storeUser($user);
            session_start();
           header("Location:../?signup=success");
        }
    }
} else {
    header("location: ../");
}

