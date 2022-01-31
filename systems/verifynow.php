<?php

include '../backend/config.php';
isset($_GET['keytoverify'])
    ? ($key = $_GET['keytoverify'])
    : die('Access Denied !');

$stmt = $con->prepare('SELECT * FROM users WHERE vkey = :vkey LIMIT 1');
$stmt->bindParam(':vkey', $key);
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$row = $res[0];
if (count($res)) {
    $updatevkey = $row['vkey'];
    $uname = $row['uname'];
    $email = $row['email'];
    $stmt1 = $con->prepare(
        'UPDATE users SET vstatus = 1 WHERE vkey = :newvkey AND uname = :uname'
    );
    $stmt1->bindParam(':newvkey', $updatevkey);
    $stmt1->bindParam(':uname', $uname);
    if ($stmt1->execute()) {
        echo "
            <div class='box'
                style='height: 90vh; width: 100vw; display: flex; align-items: center; justify-content: center; flex-direction: column;font-family: sans-serif;'>
                <h3 style='font-size: 40px;'>Hello {$uname} !, Thanks for your verification .</h3>
                <p style='font-family: Arial; font-size: 25px;'>We are redirecing you please wait !</p>
                <p style='font-family: Arial; font-size: 25px; display: inline-block;margin: 0; padding: 0;box-sizing: border-box;'>
                    We will send mail to <strong>{$email}</strong> for updating our regular
                    users ! !</p>
            </div>";
        echo "
            <script>
                setTimeout(() => {
                    window.location.href = '{$localhost}systems'
                }, 3000);
            </script>";
    }
}
?>