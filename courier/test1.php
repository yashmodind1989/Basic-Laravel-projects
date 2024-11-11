<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Location Finder</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map { height: 500px; }
        .form-container {
            margin-top: 20px;
        }
        .form-container input {
            margin: 10px 0;
            padding: 10px;
            width: 300px;
        }
    </style>
</head>
<body>

<h2>Click on a map to fill in business location details</h2>

<!-- Leaflet Map Container -->
<div id="map"></div>

<!-- Business Office Location Form -->
<div class="form-container">
    <input type="text" id="officeName" placeholder="Business Name" />
    <input type="text" id="pinCode" placeholder="Pin Code" />
    <input type="text" id="city" placeholder="City" />
    <input type="text" id="state" placeholder="State" />
    <input type="text" id="country" placeholder="Country" />
</div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
// Initialize the map
const map = L.map('map').setView([20, 0], 2); // Starting at (20, 0) for global view

// Add OpenStreetMap tile layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Function to handle map clicks
map.on('click', function(e) {
    const lat = e.latlng.lat;
    const lon = e.latlng.lng;

    // Use Nominatim to reverse geocode the clicked location
    fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json&addressdetails=1`)
        .then(response => response.json())
        .then(data => {
            const address = data.address;
            const officeName = "Your Business Name"; // Placeholder for business name
            const pinCode = address.postcode || "Not available";
            const city = address.city || address.town || address.village || "Unknown city";
            const state = address.state || "Unknown state";
            const country = address.country || "Unknown country";
            
            // Populate the form with the data
            document.getElementById('officeName').value = officeName;
            document.getElementById('pinCode').value = pinCode;
            document.getElementById('city').value = city;
            document.getElementById('state').value = state;
            document.getElementById('country').value = country;
        })
        .catch(error => {
            console.error("Error fetching geolocation data", error);
        });
});
</script>

</body>
</html>
