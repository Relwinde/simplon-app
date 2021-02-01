<?php


function userNameExists($username)
{
    require 'connect.php';
    $result;
    $stmt = $database->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function emailExists($email)
{
    require 'connect.php';
    $result;
    $stmt = $database->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
function pwdNotMatch($pwd, $pwdrpt)
{
    $result = false;
    if ($pwd !== $pwdrpt) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}



function creatUser($firstname, $lastname, $email, $username, $pwde)
{
    require 'connect.php';
    $result;
    $stmt = $database->prepare("INSERT INTO admins (firstname, lastname, email, username, userpass) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $username, $pwde);
    if ($stmt->execute()) {
        $result = true;
        $stmt->close();
    } else {
        $result = false;
    }
    return $result;
}
