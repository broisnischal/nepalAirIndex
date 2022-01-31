<link rel="stylesheet" href="./assets/styles/mainsection.css">

<div class="main-map">
    <?php include 'maps.php'; ?>
</div>
<div class="d-container">
    <div class="yourlocation" style="margin: 40px auto;">
        <div class="box">
            <h3>Your Current Location Details</h3>
        </div>
        <div class="content-box">
            <div class="weathercontainer" id="weathercontainer" draggable="false">
                <h2 class="city-name"><span id="countryName"></span><span id="cityName"></span></h2>
                <div class="icon">
                </div>
                <p class="errordiv" id="errornavigation">Allow us Location || Check Internet !
                </p>
                <p><span id="temp"></span><span id="dot"></span><span id="tempUnit">&ring;C</span></p>
                <p id="description"></p>
                <div class="extras">
                    <p>Sunrise Time : <span id="sunrise"></span></p>
                    <p>Sunset Time : <span id="sunset"></span></p>
                    <p>Humidity : <span id="humidity"></span><span class="unit">%</span></p>
                    <p>Pressure : <span id="pressure"></span><span class="unit">hPa</span></p>
                    <p>Wind Speed : <span id="speed"></span><span class="unit">m/s</span></p>
                </div>
            </div>
            <div class="grid-div">
                <div class="single-data" id="airqualitycurrentlocation">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dcontainer">
    <div class="nepal-pollutionindex">
        <iframe src="https://waqi.info/#/c/28.426/84.449/6.9z" sandbox="allow-same-origin allow-scripts allow-forms"
            scrolling=no style="overflow: hidden;" frameborder="5" height="500px" width="90%"></iframe>
    </div>
</div>

<script src='./apps/app.js'></script>
<?php include 'districts.php'; ?>