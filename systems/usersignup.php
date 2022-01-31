<?php

include '../backend/config.php';

$name = clean($_POST['name']);
$email = clean($_POST['email']);
$username = clean($_POST['username']);
$password = clean($_POST['password']);
$date = clean($_POST['signupdate']);

$safepwd = password_hash("{$password}", PASSWORD_BCRYPT);
$vkey = md5(time() . $safepwd);
$usercode = md5(time() . $vkey);

$msg = "<div style='background: black;padding: 20px;border-radius: 5px;font-family: sans-serif;'
                class='box'>
                <div class='header'>
                    <h3 style='border-bottom: 2px solid #efefef;color: white;padding: 3px;'>Thanks for Submitting ! </h3>
                </div>
                <div class='body'>
                    <p style='display: inline-block;text-align: justify;letter-spacing: 0.2px;color: white;font-size: 20px; '>
                        Thanks for Registrating into our service !
                        Please check your email for verification !
                        And to know more about us .
                        Please contact ->
                        neeswebservices@gmail.com
                        you can view into our web too.
                    </p>
                </div>
                <div class='third'>
                    <h4 style='color: orange;'>Click to verify your Account.</h4>
                    <a style='background: white;padding: 4px 15px;text-decoration: none; text-transform: uppercase;font-family:
                        Segoe UI;color: black;'
                        href='{$localhost}systems/verifynow.php?keytoverify={$vkey}'>Verify
                        Now !</a>
                </div>
            </div>";

function usermailer($to, $subject, $msg)
{
    include '../backend/mailing/smtp/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = 'your username ';
    $mail->Password = 'your password';
    $mail->SetFrom('mail set from');
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false,
        ],
    ];
    if (!$mail->Send()) {
        return 0;
    } else {
        return 1;
    }
}
$stmt = $con->prepare(
    'SELECT * FROM users WHERE uname = :uname OR vkey = :vkey'
);
$stmt->bindParam(':uname', $username);
$stmt->bindParam(':vkey', $vkey);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!count($res)) {
    if (!empty($name && $email && $username && $password && $date)) {
        if (usermailer($email, 'Nepal AQI signup Registration !', $msg) == 1) {
            $stmt1 = $con->prepare(
                'INSERT INTO users (name , email , uname , pkey , vkey, usercode) VALUES (:uname , :uemail , :username , :passkey , :verifykey, :usercode)'
            );
            $stmt1->bindParam(':uname', $name);
            $stmt1->bindParam(':uemail', $email);
            $stmt1->bindParam(':username', $username);
            $stmt1->bindParam(':passkey', $safepwd);
            $stmt1->bindParam(':verifykey', $vkey);
            $stmt1->bindParam(':usercode', $usercode);
            if ($stmt1->execute()) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
} else {
    echo 2;
}

?>