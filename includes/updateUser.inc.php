<?php
require_once "db.php";
if (isset($_POST["submit"])) {
    session_start();
    $user = getUser($_SESSION['username']);
    $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    $username = $input["username"];
    $email = $input["email"];
    if ($input['pwd'] === "") {
        unset($input['pwd']);
        unset($input['pwd-repeat']);
    } else {
        $pwd = $input["pwd"];
        $pwdRepeat = $input["pwd-repeat"];
    }
    unset($input['submit']);


    foreach ($input as $value) {
        if (empty($value)) {
            header("Location:../signup?error=emptyfields&username=" . $username . "&email=" . $email);
            exit();
        }
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../profil/redigera/".$user['id']."?error=invalidemailusername");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:../profil/redigera/".$user['id']."?error=invalidemail&username=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../profil/redigera/".$user['id']."?error=invalidusername&email=" . $email);
        exit();
    } else if (isset($pwd) && $pwd !== $pwdRepeat) {
            header("Location:../profil/redigera/".$user['id']."?error=passwordcheck&username" . $username . "&email=" . $email);
            exit();
    } else {
        $check = checkUsername($username);
        var_dump($check);
        if ($check > 0) {
           header("Location:../profil/redigera/".$user['id']."?error=sqlerror=usertaken&email=" . $email);
            exit();
        } else {
            updateUser($input);
            session_unset();
            session_destroy();
            header("Location:../?update=success");
        }
    }
} else {
    header("location: ../");

}
