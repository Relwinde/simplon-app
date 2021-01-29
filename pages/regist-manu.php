<?php
    require '../includes/functions.php';
    if (isset($_POST['register'])) {
        if (pwdNotMatch($_POST['pwd'], $_POST['pwdrepeat'])) {
            header("location: register.php?error:passwordmismatch");
        } else {
        }
        echo "pass";
        if (emailExists($_POST['email'])) {
            header("location: register.php?error:emailalreadyregistered");
        } else {
        }
        echo "mail";
        if (userNameExists($_POST['username'])) {
            header("location: register.php?error:usernamealreadyexits");
        } else {
        }
        echo "name";
        if (creatUser($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['username'], $_POST['pwd'])) {
            header("location: register.php?registered");
        } else {
            header("location: register.php?error:registrationproblem");
        }
        echo "regis";
    }