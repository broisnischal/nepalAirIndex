<?php
include '../backend/config.php';
session_start();

if (!isset($_POST['uemail'], $_POST['password'])) {
    die('Access Denied !');
}

$uemail = clean($_POST['uemail']);
$password = $_POST['password'];

if (!empty($uemail && $password)) {
    $sql =
        'SELECT * FROM users WHERE email = :uemail OR uname = :uname AND vstatus = 1 LIMIT 1';
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':uemail', $uemail);
    $stmt->bindParam(':uname', $uemail);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($res)) {
        $row = $res[0];
        if (password_verify($password, $row['pkey'])) {
            setcookie('cat', $row['name'], time() + 60 * 60 * 24 * 30, '/');
            setcookie('user', $row['uname'], time() + 60 * 60 * 24 * 30, '/');
            setcookie('email', $row['email'], time() + 60 * 60 * 24 * 30, '/');
            setcookie('uid', $row['usercode'], time() + 60 * 60 * 24 * 30, '/');
            setcookie('login', true, time() + 60 * 60 * 24 * 30, '/');
            $_SESSION['login'] = true;
            $_SESSION['cat'] = $row['name'];
            $_SESSION['user'] = $row['uname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['uid'] = $row['usercode'];
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 2;
    }
} else {
    echo 3;
}
?>