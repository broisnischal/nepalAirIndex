<?php include './header.php';

if (isset($_COOKIE['login']) || isset($_SESSION['login'])) {
} else {
    echo "<script>window.location.href='{$localhost}';</script>";
}
?>
<script defer>
document.addEventListener('DOMContentLoaded', () => {
    const errodiv = document.getElementById('errordiv');
    const pollutionDiv = document.getElementById('pollution');
    const countryDiv = document.getElementById('country');
    const districtDiv = document.getElementById('district');
    const municipalityDiv = document.getElementById('municipality');
    const regionDiv = document.getElementById('region');
    const roadDiv = document.getElementById('road');
    const villageDiv = document.getElementById('village');
    const cityDiv = document.getElementById('city');
    const locationDiv = document.getElementById('location');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    }

    async function onSuccess(position) {
        let lat = position.coords.latitude;
        let lon = position.coords.longitude;
        const apikey = 'ef2015a73047450980c2eb848cdad63d';
        const url = `https://api.opencagedata.com/geocode/v1/json?q=${lat}+${lon}&key=${apikey}`;
        await fetch(url)
            .then(data => data.json())
            .then(res => {
                let main = res.results[0].components;
                let {
                    country,
                    city,
                    county,
                    municipality,
                    region,
                    road,
                    village,
                    road_type
                } = main;
                countryDiv.value = country;
                districtDiv.value = county;
                municipalityDiv.value = municipality;
                regionDiv.value = region;
                roadDiv.value = road;
                cityDiv.value = city;
                villageDiv.value = village;
                let location = village + "-" + municipality + " ," + county;
                locationDiv.value = location;


                console.log(main);
            })


            .catch(error => {
                console.log(error);
            });
    }

    function onError(error) {
        if (error.code == 1) {
            alert('You must give me location Access !');
        } else if (error.code == 2) {
            alert('Location not available !');
        } else {
            errodiv.style.display = 'block';
        }
    }
})
</script>
<link rel="stylesheet" href="./assets/Styles/complain.css">

<div class="complain">
    <div class="main-complain-container">
        <div class="box">
            <div class="titletext">
                <h3> # Complain the Nearby Pollution </h3>
            </div>
            <div class="whatif">
                <p>
                    If there is any ongoing Air Pollution Activity Near your place you can Complain us our , Workers and
                    air pollution index users who are working for our website to make things possible they will reply to
                    you and Try to solve the issue as fast as possible .
                    <br>
                    <br>
                    # How can you complain ?
                    <br>
                    You can complain by filling the form below but make sure if that is fake , bad use we will not
                    contact you
                    first we will make sure Everything is alright and see the urrent ongoing situation in that area we
                    will calculate
                    the index and we our Air Specialist will reply back soon !

                    <br>
                    <br>
                    If you are helping us by complaining you are making your Society better by having our society better
                    we will have fresh
                    air in our society , which is necesssary for our healtly Life , Enough Talk !
                    <br>
                    <br>
                    # Please Provide Correct details !!!
                </p>
            </div>
            <div class="complain-container">
                <div class="complain-box">
                    <form method="post" action="postcomplain.php" autocomplete="off" autocapitalize="on"
                        enctype="multipart/form-data">
                        <div class="alert alert-danger errordiv" id="errordiv" style="display: none;">Something went
                            wrong Please try again
                            later !
                        </div>
                        <div class="form-row">
                            <label for="pollution">Type of Pollution</label>
                            <select required name="pollution" id="pollution">
                                <option selected disabled>Select Pollution</option>
                                <option value="air">Air Pollution</option>
                                <option value="water">Water Pollution</option>
                                <option value="fireinlandfillsites">Fire in landfill sites</option>
                                <option value="industrialwastedumping">Industrial Waste Dumping</option>
                                <option value="opendumping">Open Dumping of Garbage</option>
                                <option value="roaddust">Road Dust</option>
                                <option value="vehicles">More traffic and Vehicles</option>
                                <option value="leafburning">Leaf Burning</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="description">Short Description (min : 100 char)</label>
                            <textarea name="description" id="description" cols="30" minlength="100" rows="10"
                                placeholder=" Please enter a description about the Pollution !"></textarea>
                        </div>
                        <div class="form-row">
                            <label for="landmark">Landmark or Location of pollution : </label>
                            <input required type="text" name="pollutionlocation" id="pollutionlocation"
                                placeholder="Please provide correct details. We need to check the Pollution index of that place .">
                        </div>
                        <div class="form-row">
                            <label for="country">Country : </label>
                            <input required type="text" value="" id="country" name="country"
                                placeholder="Country must be Nepal">
                        </div>
                        <div class="form-row">
                            <label for="disrtict">District : </label>
                            <input required type="text" value="" id="district" name="district"
                                placeholder="Enter your district name ">
                        </div>
                        <div class="form-row">
                            <label for="city">City :</label>
                            <input type="text" value="" id="city" name="city" placeholder="Enter your City name ">
                        </div>
                        <div class="form-row">
                            <label for="municipality">Municipality : </label>
                            <input type="text" value="" id="municipality" name="municipality"
                                placeholder="Municipality Name ">
                        </div>
                        <div class="form-row">
                            <label for="region">Region : </label>
                            <input required type="text" id="region" value="" name="region" placeholder="Region Name ">
                        </div>
                        <div class="form-row">
                            <label for="province">Province : </label>
                            <select required name="province" id="province">
                                <option selected disabled>Select your province</option>
                                <option value="1">
                                    Province no. 1
                                </option>
                                <option value="2">
                                    Province no. 2
                                </option>
                                <option value="3">
                                    Province no. 3
                                </option>
                                <option value="4">
                                    Province no. 4
                                </option>
                                <option value="5">
                                    Province no. 5
                                </option>
                                <option value="6">
                                    Province no. 6
                                </option>
                                <option value="7">
                                    Province no. 7
                                </option>

                            </select>
                        </div>
                        <div class="form-row">
                            <label for="road">Road </label>
                            <input required type="text" id="road" name="road" value="" placeholder="Place road ">
                        </div>
                        <div class="form-row">
                            <label for="village">Village </label>
                            <input required type="text" value="" id="village" name="village"
                                placeholder="Village Name ">
                        </div>
                        <div class="form-row" id="image">
                            <div>
                                <label for="pollutionimage">Image of Pollution Area <i class="fas fa-image"></i>
                                </label>
                                <input id="pollutionimage" name="image" hidden type="file">
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="name">Your Name : </label>
                            <input required type="text" disabled value="<?php echo $_SESSION[
                                'cat'
                            ]; ?>" id="name" name="name" placeholder="Your name ">
                        </div>
                        <div class="form-row">
                            <label for="location">Your current location : </label>
                            <input required type="text" id="location" name="geolocation"
                                placeholder="Your current Location">
                        </div>
                        <div class="form-row">
                            <label for="email">Your Email : </label>
                            <input required type="email" disabled value="<?php echo $_SESSION[
                                'email'
                            ]; ?>" id="email" name="email">
                        </div>
                        <div class="form-row">
                            <label for="number">Your Phone Number : </label>
                            <input required type="text" id="number" name="phonenumber">
                        </div>
                        <div class="form-row">
                            <label for="number">Your any Social Media Link : </label>
                            <input required type="url" id="url" name="sociallink">
                        </div>

                        <div class="form-row">
                            <label></label>
                            <input type="submit" class='btn btn-primary' value="Submit Data" id="submit" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php';

?>