console.log("llegamos al main");

mapboxgl.accessToken = "pk.eyJ1Ijoib3Jqb2NhZ3JlIiwiYSI6ImNsbGp0d3dwazFjMGIzbG5zMThjbjZvMHcifQ.bCZd0A3BHq0fb6Ag1nzBQA";

navigator.geolocation.getCurrentPosition(successLocation, errorLocation, { enableHighAccurrancy: true})

function successLocation(possition) {
    console.log(possition);
}

function errorLocation(err) {
    console.log(err);
}
console.log("llegamos al main");

var map = new mapboxgl.Map({
    container: "map",
    style: 'mapbox://styles/mapbox/streets-v11'
});
