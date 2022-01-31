<?php
$admin = 'neeswebservices@gmail.com';
$clientid =
    '724077778480-rclm656n8s87b20t1vp89s078kfo1aqk.apps.googleusercontent.com';
$clientsecret = 'xs5vI7u9sBm84UfCw6WvtB9t';
$localhost = 'http://localhost/manojproj/';
define('LOCALHOST', 'http://localhost/manojproj/');
$backhost = 'http://localhost/manojproj/backend/';

$serverhost = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nepalAqi';

define('SERVERHOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DBNAME', 'nepalAqi');

function strEncrypt($str, $iv)
{
    $key = 'neeschal123456789!@#$%^&*()secured###keyis##$$%best[]';
    $option = 0;
    $cipher = 'AES-128-CTR';
    return openssl_encrypt($str, $cipher, $key, $option, $iv);
}

function strDecrypt($str, $iv)
{
    $key = 'neeschal123456789!@#$%^&*()secured###keyis##$$%best[]';
    $option = 0;
    $cipher = 'AES-128-CTR';
    return openssl_decrypt($str, $cipher, $key, $option, $iv);
}

try {
    $con = new PDO(
        "mysql:host={$serverhost};dbname={$dbname}",
        "{$username}",
        "{$password}"
    );
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error ' . $e->getMessage();
}

function clean($input)
{
    $input = str_replace('<', '&lt', $input);
    $input = str_replace('>', '&gt', $input);
    $input = str_replace('=', '&#61', $input);
    $input = str_replace("'", '&#39', $input);
    $input = str_replace('"', '&quot', $input);
    $input = str_replace(';', '&#59', $input);
    $input = str_replace('/', '&#47', $input);
    return $input;
}

?>