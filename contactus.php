<?php

include './header.php'; ?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<style>
.contact-section {
    margin-top: 80px;
}

.jumbotron {
    background: #358CCE;
    color: #FFF;
    border-radius: 0px;
}

.jumbotron-sm {
    padding-top: 24px;
    padding-bottom: 24px;
}

.jumbotron small {
    color: #FFF;
}

.h1 small {
    font-size: 24px;
}

@media screen and (max-width: 1080px) {
    #responsive {
        background-color: white;
        margin: 10px 0;
    }
}
</style>
<div class="contact-section">

    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">
                        Contact us <small>Feel free to contact us</small></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="well well-sm">
                    <form action="<?php echo $_SERVER[
                        'PHP_SELF'
                    ]; ?>" method="post" autocomplete="off" autocapitalize="on">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Enter name" />
                                </div>
                                <div class="form-group">
                                    <label for="email">
                                        Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phoneno">
                                        Phone No :</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="bi bi-telephone-outbound"></span>
                                        </span>
                                        <input type="text" name="number" class="form-control" id="email"
                                            placeholder="Enter Your Number " />
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">
                                        Message</label>
                                    <textarea name="message" style="resize: none;" name="message" id="message" noresize
                                        class="form-control" rows="13" cols="25" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary pull-right" name="contact"
                                    id="btnContactUs">
                                    Send Message</button>
                            </div>
                        </div>
                        <?php if (isset($_POST['contact'])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $phone = $_POST['number'];
                            $msg = $_POST['message'];

                            $to = 'canibeonlyyours@gmail.com';
                            $subject = 'Nepal AQI website Contact Us form !';

                            $msg = "Viewer Name :  $name <br> Email : $email <br> Phone :$phone <br> Message : $msg <br>";

                            function mailer($to, $subject, $msg, $email)
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
                            if (mailer($to, $subject, $msg, $email) == 1) {
                                echo "<div class='alert alert-success mt-5'>
                            Your Message sent Sucessfully ! We will respond Later , Thanks for Contacting !!
                        </div>";
                            } else {
                                echo "<div class='alert alert-danger mt-5'>
                                We are having trouble to send , Please try again later !!
                        </div>";
                            }
                        } ?>
                    </form>

                </div>
            </div>
            <div class="col-md-4" id="responsive">
                <form>
                    <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
                    <address>
                        <strong>kathmandu , Nepal.</strong><br>
                        New-Baneshowr, KTM<br>
                        <abbr title="Phone">
                            PN :</abbr>
                        (1221) 456-7121
                        <div class="info">
                            <h2>More info :</h2>
                            <div><i class="fas fa-map-marker-alt"></i> | Ratopul, Kathmandu, Nepal</div>
                            <div><i class="fas fa-envelope"></i> | officialneeschalyt@gmail.com</div>
                            <div><i class="fas fa-phone"></i> | +977 9803104764</div>
                            <div><i class="fas fa-clock"></i> | Mon - sat 8:00 AM to 8:00 PM</div>
                        </div>
                    </address>
                    <address>
                        <strong>Contact email</strong><br>
                        <a href="mailto:#">info@neeswebservices.com</a>
                    </address>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php';
?>