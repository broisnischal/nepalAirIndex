<?php
include './backend/config.php';
session_start();
$iv = openssl_random_pseudo_bytes(16);
$hexiv = bin2hex($iv);
$error = false;
$e = '';
$pollutionimage = '';
$success = false;
if (isset($_FILES['image'])) {
    if ($_FILES['image']['name'] == '') {
        $error = false;
        $pollutionimage = '';
    } else {
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $filetype = $_FILES['image']['type'];
        $filetmpname = $_FILES['image']['tmp_name'];
        $extensions = ['png', 'jpg', 'jpeg', 'webm'];
        $tmp = explode('.', $filename);
        $ext = end($tmp);
        $pollutionimage = clean($filename);

        if (!in_array($ext, $extensions)) {
            $error = true;
            $e = 'File not Supported , Use png, jpg , jpeg , webm Format .';
            echo "<script>window.location.href='{$localhost}complain?e={$e}';</script>";
        }
        if ($filesize > 5145728) {
            $error = true;
            $e = "File shouldn't be more than 5 Mb .";
            echo "<script>window.location.href='{$localhost}complain?e={$e}';</script>";
        }
        if ($error == false) {
            move_uploaded_file(
                "{$filetmpname}",
                './assets/img/systemimages/' . $filename
            );
        }
    }
}
$pollutiontype = clean($_POST['pollution']);
$pollutiondescription = clean($_POST['description']);
$pollutionlocation = clean($_POST['pollutionlocation']);
$country = clean($_POST['country']);
$district = clean($_POST['district']);
$city = clean($_POST['city']);
$municipality = clean($_POST['municipality']);
$region = clean($_POST['region']);
$province = clean($_POST['province']);
$road = clean($_POST['road']);
$village = clean($_POST['village']);
$username = clean($_POST['name']);
$useremail = clean($_POST['email']);
$usergeolocation = clean($_POST['geolocation']);
$userphonenumber = clean($_POST['phonenumber']);
$usersociallink = clean($_POST['sociallink']);

try {
    $stmt = $con->prepare(
        'INSERT INTO complain(pollutionname , pollutiondescription, pollutionlocation , country , district ,city, municipality , region , province , road , village, pollutionimage , username , useremail , usergeolocation , userphonenumber , usersociallink, randombytes ) VALUES (:pollutionname , :pollutiondescription, :pollutionlocation , :country , :district , :city, :municipality , :region , :province , :road , :village, :pollutionimage , :username , :useremail , :usergeolocation , :userphonenumber , :usersociallink, :randombytes)'
    );
    $stmt->bindParam(':pollutionname', $pollutiontype);
    $stmt->bindParam(':pollutiondescription', $pollutiondescription);
    $stmt->bindParam(':pollutionlocation', $pollutionlocation);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':municipality', $municipality);
    $stmt->bindParam(':region', $region);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':road', $road);
    $stmt->bindParam(':village', $village);
    $stmt->bindParam(':pollutionimage', $pollutionimage);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':useremail', $useremail);
    $stmt->bindParam(':usergeolocation', $usergeolocation);
    $stmt->bindParam(':userphonenumber', $userphonenumber);
    $stmt->bindParam(':usersociallink', $usersociallink);
    $stmt->bindParam(':randombytes', $hexiv);
    if ($stmt->execute()) {
        $success = true;
        echo 'Please Wait a moment !';
        echo "<script>window.location.href='{$localhost}complain';</script>";
    }
} catch (PDOException $e) {
    echo 'Error : ' . $e->getMessage();
}

$cat = $_SESSION['cat'];
$sessionemail = $_SESSION['email'];
$msg = "Pollution Type : {$pollutiontype} <br> Pollution Description : {$pollutiondescription} <br> Pollution Location : {$pollutionlocation} <br> Country : {$country} <br> District : {$district} <br>  City : {$city} <br> Municipality : {$municipality} <br> Region : {$region} <br> Province No . {$province}  <br> Road Address : {$road} <br> Village : {$village} <br> Sent by {$cat} , {$sessionemail} , User location : {$usergeolocation} , <br> User Phone Number : {$userphonenumber} , <br> User social LINK : {$usersociallink} !!";
function complainmailer($to, $msg, $email)
{
    include './backend/mailing/smtp/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = 'neeswebservices@gmail.com';
    $mail->Password = 'Passwd@@12';
    $mail->SetFrom($email);
    $mail->Subject = "Complain From nees NEPAL AQI from - {$email} ";
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
echo complainmailer($admin, $msg, $useremail);
?>