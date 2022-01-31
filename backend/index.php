<?php
include './config.php';
session_start();

if (isset($_SESSION['backlogin'])) {
    echo "<script>window.location.href='{$backhost}complains'; </script>";
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login into Backend</title>
    </head>
    <style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
    }

    .main {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        width: 100%;
    }

    .box {
        width: 90%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .box form .row {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 10px 0;
        width: 100%;
    }

    .box form .row label {
        width: 100%;
        text-align: left;
        font-size: 12px;
    }

    .box form .row input {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
    }

    .submit {
        cursor: pointer;
        width: 100%;
    }
    </style>

    <body>
        <div class="main">
            <div class="box">

                <form method="post" action='<?php echo $_SERVER[
                    'PHP_SELF'
                ]; ?>'>
                    <div class="row">
                        <?php if (isset($_POST['submit'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            try {
                                $stmt = $con->prepare(
                                    'SELECT * FROM backendusers WHERE `username` = :username AND `password` = :passwordd LIMIT 1'
                                );

                                $stmt->bindParam(':username', $username);
                                $stmt->bindParam(':passwordd', $password);
                                if ($stmt->execute()) {
                                    $res = $stmt->fetch(PDO::FETCH_ASSOC);
                                    if ($res) {
                                        $_SESSION['backlogin'] = true;
                                        $_SESSION['user'] = $username;
                                        echo 'You logged in Successfully ! <br> <center>Please wait a Moment ! </center>';
                                        echo "<script>setTimeout(() => { window.location.replace('{$backhost}complains');}, 5000);</script>";
                                    } else {
                                        echo 'Please contact admin for this !';
                                    }
                                }
                            } catch (PDOException $e) {
                                echo 'error : ' . $e->getMessage();
                            }
                        } ?>
                    </div>
                    <div class="row">
                        <label for="username">
                            Enter your username
                        </label>
                        <input type="text" name="username" required id="username" class="inputbox">
                    </div>
                    <div class="row">
                        <label for="password">
                            Enter your Password
                        </label>
                        <input type="password" required name="password" id="password" class="inputbox">
                    </div>
                    <div class="row">
                        <input type="submit" name="submit" value="Login" id="submit" class="submit">
                    </div>

                </form>
            </div>
        </div>
    </body>

</html>