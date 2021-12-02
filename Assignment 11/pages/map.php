<head>
    <link rel="stylesheet" href="../css/input.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<?php include("../components/header.php") ?>


<div id="map"></div>

<script>
    
    fetch('https://ipinfo.io/json?token=87929a3ddcf75d').then(
        (response) => response.json()
    ).then(
        (json) => {
            const loc = json.loc.split(',');
            const ip = json.ip;

            var map = L.map('map').setView(loc, 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker(loc).addTo(map)
                .bindPopup('Your external ip address is ' + ip)
                .openPopup();
        }
    ).catch((err) => alert("Please turn off your'ad blocker and reload the page"));


</script>
<?php include("../components/footer.php") ?>