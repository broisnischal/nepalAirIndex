<?php
include '../backend/config.php';
session_start();
if (isset($_COOKIE['login']) || isset($_SESSION['login'])) {
    $_SESSION['login'] = $_COOKIE['login'];
    $_SESSION['cat'] = $_COOKIE['cat'];
    $_SESSION['uid'] = $_COOKIE['uid'];
    $_SESSION['email'] = $_COOKIE['email'];
    $_SESSION['user'] = $_COOKIE['user'];
    echo "<script>window.location.href = '{$localhost}documentation'</script>";
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="google-signin-client_id"
            content="724077778480-rclm656n8s87b20t1vp89s078kfo1aqk.apps.googleusercontent.com">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <script src="https://kit.fontawesome.com/573e62a9c5.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>SignUp AQI of Nepal </title>
        <link rel="stylesheet" href="../assets/styles/system.css">
    </head>

    <body>
        <div class="container">
            <div class="box">
                <h4 class="text text-primary">Login Up | AQI Index of Nepal </h4>
                <form id="form" method="post" autocomplete="none">
                    <div class="alert alert-primary" style="display: none;" id="loginalert"></div>
                    <div class="form-group">
                        <label for="name">Username / Email : </label>
                        <input type="text" name="uemail" id="uemail" class="form-control">
                    </div>
                    <div class="form-group" id="password-div">
                        <label for="name">Password : </label>
                        <input type="password" name="password" id="password" class="form-control">
                        <div class="showpwd">
                            <input type="checkbox" onclick="showpassword()"><samp>Show Password</samp>
                        </div>
                    </div>
                    <div class="form-group">
                        <span>
                            <div class="g-signin2" id="googlelogin" data-onsuccess="gmailLogIn"></div>
                            <input type="submit" class="btn btn-primary btn-sm" value="Log In" style="width: 100px;"
                                id="signup">
                            <a href="./signup">Not a user ?</a>
                        </span>
                        <!-- <button class="btn btn-danger" onclick="signOut()">Sign Out</button> -->
                    </div>
                </form>
            </div>
        </div>
        <script src="../apps/jquery.js"></script>
        <script>
        $("#form").on('submit', (e) => {
            e.preventDefault();
        })
        $('#signup').on('click', (e) => {
            e.preventDefault();
            var uemail = $('#uemail').val();
            var password = $('#password').val();
            if (uemail == "" && password == "") {
                $('#loginalert').css('display', 'block');
                $("#loginalert").text("Please fill all information !");
            } else {
                $.ajax({
                    url: 'realuserlogin.php',
                    type: 'post',
                    data: {
                        'uemail': uemail,
                        'password': password,
                    },
                    success: function(res) {
                        if (res == 1) {
                            $('#form').trigger('reset');
                            $('#loginalert').css('display', 'block');
                            $('#loginalert').html('Your login was Successfull, Redirecting ...!');
                            setTimeout(() => {
                                window.location.href =
                                    "<?php echo $localhost; ?>documentation";
                            }, 2000);
                        } else if (res == 2) {
                            $('#loginalert').css('display', 'block');
                            $("#loginalert").text(
                                "Username is not valid || not Verified !");
                        } else if (res == 0) {
                            $('#loginalert').css('display', 'block');
                            $("#loginalert").text(
                                " Password doesn't matched  !! ");
                        } else if (res == 3) {
                            $('#loginalert').css('display', 'block');
                            $("#loginalert").text("Please fill all information !");
                        }

                    }
                });
            }
        })

        function showpassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function gmailLogIn(googleUser) {
            var userProfile = googleUser.getBasicProfile();
            $.ajax({
                url: 'realgmaillogin.php',
                type: 'POST',
                data: {
                    'name': userProfile.getName(),
                    'image': userProfile.getImageUrl(),
                    'gid': userProfile.getId(),
                    'email': userProfile.getEmail(),
                },
                success: function(res) {
                    if (res == 1) {
                        console.log(res);
                        $('#form').trigger('reset');
                        $('#loginalert').css('display', 'block');
                        $('#loginalert').html('Gmail Logged in successfully !!!');
                        setTimeout(() => {
                            window.location.href = "<?php echo $localhost; ?>";
                        }, 4000);
                    } else if (res == 0) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text(
                            "Please SignUp first then login !!");
                        const auth2 = gapi.auth2.getAuthInstance();
                        console.log(auth2);
                        auth2.signOut();
                    } else {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("Something went wrong please try again later !!");
                    }
                }
            })
        }

        function signOut() {
            const auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then((res) => {
                console.log(res);
            })
        }
        </script>
    </body>

</html>