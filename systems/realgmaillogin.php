<?php
include '../backend/config.php';

if (!isset($_POST['name'], $_POST['email'], $_POST['gid'], $_POST['image'])) {
    die('Acess Denied !');
}

$name = $_POST['name'];
$email = $_POST['email'];
$id = $_POST['gid'];
$image = $_POST['image'];

$sql =
    'SELECT * FROM gloginusers WHERE email = :email AND gmail_id  = :id LIMIT 1';
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':email', $email);
$stmt->execute();

$res = $stmt->fetch(PDO::FETCH_ASSOC);

if ($res) {
    $gid = $res['gmail_id'];
    $gname = $res['gname'];
    $imageurl = $res['image_url'];
    $gemail = $res['email'];

    setcookie('cat', $gname, time() + 60 * 60 * 24 * 30, '/');
    setcookie('email', $gemail, time() + 60 * 60 * 24 * 30, '/');
    setcookie('uid', $gid, time() + 60 * 60 * 24 * 30, '/');
    setcookie('imgurl', $imageurl, time() + 60 * 60 * 24 * 30, '/');
    setcookie('login', true, time() + 60 * 60 * 24 * 30, '/');
    $_SESSION['login'] = true;
    $_SESSION['imgurl'] = $imageurl;
    $_SESSION['cat'] = $gname;
    $_SESSION['email'] = $gemail;
    $_SESSION['uid'] = $gid;
    echo 1;
} else {
    echo 0;
}

?>