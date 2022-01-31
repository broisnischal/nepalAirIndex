<?php
include '../backend/config.php';
if (!isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['image'])) {
    die('Accessed Denied !!');
}
$gid = $_POST['id'];
$gname = $_POST['name'];
$email = $_POST['email'];
$imageurl = $_POST['image'];

$stmt = $con->prepare(
    'SELECT * FROM gloginusers WHERE email = :gemail OR `gmail_id` = :gid'
);
$stmt->bindParam(':gemail', $email);
$stmt->bindParam(':gid', $gid);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!count($res)) {
    if (!empty($gid && $gname && $email && $imageurl)) {
        $stmt1 = $con->prepare(
            'INSERT INTO gloginusers(gname , email , gmail_id, image_url) VALUES (:gname, :email , :gmail_id , :imageurl)'
        );
        $stmt1->bindParam(':gname', $gname);
        $stmt1->bindParam(':email', $email);
        $stmt1->bindParam(':gmail_id', $gid);
        $stmt1->bindParam(':imageurl', $imageurl);
        $msg =
            "<center><h3>Thank you for Registrating in our Website for more </h3></center><br><ul><li><a href='http://nees.eu5.net'>Our Portfolio</li><li><a href='https://neeswebservices.business.site'>Our Web services</li></ul>";
        function smtp_mailer($to, $subject, $msg)
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
            $mail->Username = 'your username';
            $mail->Password = 'your password';
            $mail->SetFrom('set from');
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
        if ($stmt1->execute()) {
            if (
                smtp_mailer(
                    $email,
                    'Welcome to Nepal AQI of Neeswebservices !',
                    $msg
                ) == 1
            ) {
                echo 3;
            } else {
                echo 1;
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