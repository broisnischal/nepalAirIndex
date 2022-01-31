<?php
include './header.php';
if (isset($_COOKIE['login']) || isset($_SESSION['login'])) {
} else {
    echo "<script>window.location.href='{$localhost}';</script>";
}
?>
<link rel="stylesheet" href="./assets/Styles/api.css">
<div class="api">
    <div class="main-api-container">
        <div class="heading">
            <h4><samp># How can you implement our api ?</samp></h4>
        </div>
        <p>API which simply stands for Application Programming Interface ! We are giving you the API of nepal that no
            other API is created for nepal like this and we are giving this API in no cost Absolutely free ! Basically
            creator of
            API is <a href="https://neeswebservices.business.site/" target="_blank">Nees web services</a> you can simply
            google it to
            find out !
            <br>
            <br>
            # so let's see how can you can implement our API ..
            <br>
            <br>
            we are giving api in object form of JSON and you all know that every API mainly is in JSON format and JSON
            can be suppported by every Programming Languages so
            We are also Providing our API in JSON simply JSON( JavaScript Object Notation ) .


            <br>
            <br>
            If you are the programmer you should know how can you call the API from the server ! So i am not Describing
            this in this docs .
            I am simply giving the idea what is in our API and what info can you get !
            <br>
            <br>
            ok let's know What i am providing in API

        <ul>
            <li>District Name</li>
            <li>Corresponding Province</li>
            <li>Population</li>
            <li>Area of District</li>
            <li>Latitude </li>
            <li>Longitude</li>
            <li>AreaCode</li>
            <li>Headquarter</li>
        </ul>
        <br>
        <br>
        <p>
            SO Now where can you get our API from ? you can get it from this link <a target="_blank"
                href="./nepalapi/neeschalapi"> Nepal API </a> Or you can simply
            contact us to get ,
            Rather than you can simply get it from the link we Provided Again <a target="_blank"
                href="./nepalapi/neeschalapi">API LINK of Nepal</a> and you can it in
            your programming language which you are working from !
        </p>
        <br>
        If you like the API and if you want to support me you can support me in Patreon and its link is <a
            target="_blank" href="https://www.patreon.com/techneesofficial17"> Support me </a>. Or eSewa id 9803104764 .

        </p>
    </div>
</div>



<?php include './footer.php';
?>