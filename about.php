<link rel="stylesheet" href="./assets/styles/about.css">


<?php include './header.php'; ?>
<div class="about-section">
    <div class="about-main-container">
        <div class="heading">
            <h2 style="text-transform: capitalize;">About Section ! <h5><samp style="text-transform: capitalize;">Hello
                        , <?php
                        isset($_SESSION['cat'])
                            ? ($name = $_SESSION['cat'])
                            : ($name = 'User');
                        echo $name;
                        ?></samp> !</h5>
            </h2>
        </div>
        <div class="about-box">
            <h3 class="title-text">AIR QUALITY ANALYSIS AND STATISTICS FOR KATHMANDU</h3>
            <div class="singlebox">
                <div class="question">
                    <h4> <samp># How bad is air pollution in Kathmandu?</samp></h4>
                    <p class="answer">
                        Kathmandu is a city located in Nepal, home to many different ethnic groups with both Hinduism
                        and Buddhism being the main religions. It is the cultural hub of Nepal, being of importance to
                        the country’s arts and history, as well as being the main economic zone. Currently Kathmandu is
                        undergoing rapid growth, being one of the fastest growing cities in south Asia. As with all
                        rapid growth and development comes a spike in pollution levels, and to compound the situation, a
                        disastrous 7.8 magnitude earthquake that took place in 2015, levelling many areas of the city
                        that still lay in ruin years later, which besides disrupting daily life is another source of
                        pollution in of itself, due to large amounts of dust and finely ground particles being blown
                        into the air from these sites. Kathmandu came in with a PM2.5 reading of 48 μg/m³ as a yearly
                        average over 2019, placing it into the ‘unhealthy for sensitive groups’ category, which requires
                        a PM2.5 reading of anywhere between 35.5 to 55.4 μg/m³. This shows that Kathmandu came in on the
                        higher end of this scale, meaning that the city is subject to some fairly bad levels of
                        pollution year-round, with some months coming in considerably higher, such as January with a
                        reading of 102.7 μg/m³, an extremely high number that would have placed Kathmandu into the
                        ‘unhealthy’ bracket (55.5 to 150.4 μg/m³) at that point in time. Thus, pollution levels in
                        Kathmandu are of concern to its citizens and their health.
                    </p>
                </div>

                <!-- questions divs  -->
                <div class="question">
                    <h4> <samp># What are the main causes of pollution in Kathmandu ?</samp></h4>
                    <p class="answer">
                        There are several causes of elevated pollution levels in Kathmandu, with both human and
                        geographical factors coming together to form these heightened numbers. For a start, Kathmandu is
                        situated in a location that places it deep within a valley and many mountain ranges around. It
                        is also surrounded on both sides by China and India, economic giants who in their own rights
                        still have many pollution problems, with cities from both countries often coming in ranked very
                        highly amongst all polluted cities worldwide.

                        In regards to what is actually causing the pollution in Nepal, the large assortment of vehicles,
                        many of which are ancient and running on outdated motors and diesel fuels would be responsible
                        for pouring out high concentrations of fumes and noxious pollutants. Other sources include open
                        burning of organic material as well as refuse, as with a lack of proper infrastructure comes
                        problems pertaining to garbage collection and disposal, and as such many people resort to
                        setting fire to their waste. This would cause a lot of fumes that come from the combustion of
                        materials such as wood and plastic, all of which have many negative consequences on human
                        health. So, to summarize, the main causes of pollution in Kathmandu are open burn fires,
                        vehicular emissions, dust from construction sites and damaged areas left over from the
                        earthquakes, all compounded by its geographical location, lacking the elevation and wind to
                        allow these pollutants to disperse properly, instead accumulating and rising to dangerous
                        levels.
                    </p>
                </div>
                <div class="question">
                    <h4> <samp># What are the main types of pollutants found in Kathmandu ? </samp></h4>
                    <p class="answer">
                        With many open burn sources and different types of outdated vehicles operating around the city,
                        a large amount of pollution would come from combustion sources. Among them would be fine
                        particulate matter such as black carbon, which is formed from the incomplete combustion of
                        fossil fuels as well as organic material such as wood or plants. With these outdated vehicles
                        often relying on diesel fuels, they would be pouring out large amounts of black carbon in the
                        form of soot, which can permeate the atmosphere in areas of high traffic as well as coating
                        roadsides and underpasses with thick black accumulations, not only being visually unappealing
                        but having a host of carcinogenic properties. Other pollutants arising from vehicles would
                        include carbon monoxide (CO), nitrogen dioxide (NO2), ozone (O3) and sulfur dioxide (SO2).
                    </p>
                </div>
                <div class="question">
                    <h4><samp># When are the most polluted months in Kathmandu ?</samp></h4>
                    <p class="answer">
                        Observing the data gathered over 2019, the months that came in with the cleanest readings of
                        PM2.5 occurred in the middle portion of the year. PM2.5 refers to particulate matter that is 2.5
                        micrometers or less in diameter, and due to its small size and subsequent dangers to human
                        health, is used as a major component in calculating overall air quality. The cleanest month of
                        2019 was august, which came in with a reading of 11.8 μg/m³, putting it into the ‘good’ rating
                        bracket, which requires a number between 10 to 12 μg/m³ to be classed as such, making it a
                        bracket with a very fine margin of entry, and of note is that the air during this time of the
                        year would be significantly healthier to breathe than other times.

                    <p>The months with the worst readings were January through to May, as well as November and December,
                        making the beginning and end of the year the time that pollution levels are at their highest.
                        These pollution levels reached an absolute peak in January, with a reading of 102.7 μg/m³,
                        followed by December with a reading of 75.6 μg/m³. In total, six months out of the year came in
                        with unhealthy air quality ratings.</p>
                    </p>
                </div>
                <div class="question">
                    <h4> <samp># Is air quality improving in Kathmandu ? </samp></h4>
                    <p class="answer">
                        With existing data taken from the previous years, it is uncertain as to whether pollution levels
                        in Kathmandu are improving or just fluctuating between different numbers that have similar
                        levels of pollution. In 2017, a PM2.5 reading of 45.9 μg/m³ was recorded. This was followed by a
                        fairly large increase the next year in 2018 of 54.4 μg/m³, showing that pollution between 2017
                        and 2018 had gotten significantly worse. Moving into 2019, it is apparent that there was visible
                        improvement, with its PM2.5 reading of 48 μg/m³. However, when compared to 2017’s reading this
                        still shows a decline in air quality. As such the pollution levels in the year of 2020 and
                        beyond will show whether the air quality in Kathmandu is actually improving and not just moving
                        up and down by a few units each year. With a city that is undergoing such a marked increase in
                        its economy and all the growth associated with it, there will be a large amount of environmental
                        challenges ahead as many developing cities in Asia have been witness to, many of which are still
                        going through them. With a reduction in the amount of diesel fuel vehicles as well as open burn
                        sources being cracked down on, Kathmandu may be able to see some form of improvement in its air
                        quality in the years to come.
                    </p>
                </div>

            </div>
        </div>

    </div>
</div>


<?php include './footer.php'; ?>