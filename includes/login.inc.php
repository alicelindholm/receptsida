<?php
if (isset($_POST['login-submit'])) {
    require_once "db.php";
    $input = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    $mailuid = $input['mailuid'];
    $password = $input['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../login?error=emptyfields");
        exit();
    } else {
        $user = getUser($mailuid);
        var_dump($user);
        if (!empty($user)) {
           $pwdCheck = password_verify($password,$user['pwd']);
           var_dump($pwdCheck);
           if($pwdCheck == false){
               echo "hej";
               header("Location: ../?error=wrongPwd");
               exit();
           }
           else if($pwdCheck == true){
               session_start();
               $_SESSION['id'] = $user['id'];
               $_SESSION['username'] = $user['username'];
               header("Location: ../?login=success");
           }
           else {
               header("Location: ../?error=wrongPwd");
               exit();
           }
        } else {
            header("Location: ../?error=noUser");
            exit();
        }
    }

} else {
    header("Location: ../");
}