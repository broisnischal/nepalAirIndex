const errodiv = document.getElementById('errordiv');
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
