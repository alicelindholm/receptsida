<?php
require_once "db.php";
echo "hej";
if (isset($_POST["signup-submit"])) {
    $user = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($user);
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
        header("Location:../signup?error=invalidemailusername");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../signup?error=invalidemail&username=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../signup?error=invalidusername&email=" . $email);
        exit();
    } else if ($pwd !== $pwdRepeat) {
        header("Location:../signup?error=passwordcheck&username" . $username . "&email=" . $email);
        exit();
    } else {
        $check = checkUsername($username);
        if ($check > 0) {
            header("Location:../signup?error=sqlerror=usertaken&email=" . $email);
            exit();
        } else {
            userQuery();
        }
    }
} else {
    header("location: ../");
}

