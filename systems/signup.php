<?php include '../backend/config.php'; ?>

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
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>SignUp AQI of Nepal </title>
        <link rel="stylesheet" href="../assets/styles/system.css">
    </head>

    <body>
        <div class="container">
            <div class="box">
                <h4>Sign Up | AQI Index Of Nepal </h4>
                <form id="form" method="post" autocomplete="none">
                    <div class="alert alert-primary" style="display: none;" id="loginalert"></div>
                    <div class="form-group">
                        <label for="name">Your Name : </label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Your Email : </label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Username : </label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Password : </label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Password : </label>
                        <input type="password" name="cpassword" id="cpassword" class="form-control">
                    </div>
                    <div class="form-group">
                        <span>
                            <div class="g-signin2" id="googlelogin" data-onsuccess="gmailLogIn"></div>
                            <input type="text" hidden value="" id="date">
                            <input type="submit" class="btn btn-primary btn-sm" value="Sign Up" id="signup">
                            <a href="./index">Already a user ?</a>
                        </span>

                        <!-- <button class="btn btn-danger" onclick="signOut()">Sign Out</button> -->
                    </div>
                </form>
            </div>
        </div>
        <script src="../apps/jquery.js"></script>
        <script>
        $('#signup').on('click', (e) => {

            e.preventDefault();
            $('#loginalert').css('display', 'block');
            $("#loginalert").text("Please Wait ......");
            var name = $('#name').val();
            var email = $('#email').val();
            var username = $('#username').val();
            var password = $('#password').val();
            var cpassword = $('#cpassword').val();
            var date = new Date();

            if (name == "" && email == "" && username == "" && password == "" && cpassword == "") {
                $('#loginalert').css('display', 'block');
                $("#loginalert").text("Please enter all information !");
            } else {
                if (password == cpassword) {
                    $.ajax({
                        url: 'usersignup.php',
                        type: 'post',
                        data: {
                            'name': name,
                            'email': email,
                            'username': username,
                            'password': password,
                            'signupdate': date
                        },
                        success: function(res) {
                            if (res == 1) {
                                console.log(res);
                                $('#form').trigger('reset');
                                $('#loginalert').css('display', 'block');
                                $('#loginalert').html(
                                    'Please check your emaill for Verification !');
                                setTimeout(() => {
                                    window.location.href =
                                        "<?php echo $localhost; ?>systems";
                                }, 3000);
                            } else if (res == 2) {
                                $('#loginalert').css('display', 'block');
                                $("#loginalert").text(
                                    "Username already exists please try another ! ");

                            } else {
                                $('#loginalert').css('display', 'block');
                                $("#loginalert").text(
                                    "Something went wrong please Try again later ! ");
                            }
                        }
                    });
                } else {
                    $('#loginalert').css('display', 'block');
                    $("#loginalert").text("Password should must match !");
                }
            }
        })

        function gmailLogIn(googleUser) {
            $('#loginalert').css('display', 'block');
            $("#loginalert").text("Please Wait ......");
            var userProfile = googleUser.getBasicProfile();
            $.ajax({
                url: 'userlogin.php',
                type: 'POST',
                data: {
                    'name': userProfile.getName(),
                    'image': userProfile.getImageUrl(),
                    'id': userProfile.getId(),
                    'email': userProfile.getEmail(),
                },
                success: function(res) {
                    if (res == 1 || res == 3) {
                        $('#form').trigger('reset');
                        $('#loginalert').css('display', 'block');
                        $('#loginalert').html('Your sign up was sucessfull ! we will redirect you !');
                        setTimeout(() => {
                            window.location.href = "<?php echo $localhost; ?>systems";
                        }, 5000);
                    } else if (res == 2) {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").text("You are already a user , Please Login !");
                    } else {
                        $('#loginalert').css('display', 'block');
                        $("#loginalert").html("Something went wrong please try again later !!");
                    }
                }
            })
        }
        </script>
    </body>

</html>