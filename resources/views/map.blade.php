<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Global River Conservation Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link rel="stylesheet" href="https://js.arcgis.com/4.28/esri/themes/light/main.css">
    <script src="https://js.arcgis.com/4.28/"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        html, body, #viewDiv { height: 100%; margin: 0; padding: 0; }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark px-3">
  <a class="navbar-brand" href="#">🌍 Global Rivers</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="{{ url('/') }}">Home</a>
      <a class="nav-link" href="about.html">About</a>
      <a class="nav-link" href="{{ url('/map') }}">Explore Map</a>
      <a class="nav-link" href="resources.html">Resources</a>
      <a class="nav-link" href="submit.html">Submit</a>
    </div>
  </div>
</nav>

<div id="viewDiv"></div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
  <p>© 2025 Global River Conservation Dashboard</p>
  <p><a href="contact.html" class="text-white">Contact Us</a> | <a href="privacy.html" class="text-white">Privacy Policy</a> | Accessibility</p>
</footer>

<!-- Bootstrap JS Bundle -->

<script>
    require(["esri/Map", "esri/views/MapView", "esri/Graphic"],
    function(Map, MapView, Graphic) {
        const map = new Map({ basemap: "streets" });

        const view = new MapView({
            container: "viewDiv",
            map: map,
            center: [90.4125, 23.8103], // Dhaka
            zoom: 10
        });

        // Load existing markers from backend
        fetch('/api/locations')
            .then(res => res.json())
            .then(data => {
                data.forEach(loc => {
                    const pointGraphic = new Graphic({
                        geometry: {
                            type: "point",
                            longitude: loc.longitude,
                            latitude: loc.latitude
                        },
                        symbol: {
                            type: "simple-marker",
                            color: "red"
                        },
                        attributes: loc,
                        popupTemplate: {
                            title: "{name}",
                            content: "Lat: {latitude}, Long: {longitude}"
                        }
                    });
                    view.graphics.add(pointGraphic);
                });
            });

        // Click to add new marker
        view.on("click", function(evt) {
            const name = prompt("Enter name of this location:");
            if (!name) return;

            const lat = evt.mapPoint.latitude.toFixed(6);
            const lon = evt.mapPoint.longitude.toFixed(6);

            fetch('/api/locations', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    name: name,
                    latitude: lat,
                    longitude: lon
                })
            })
            .then(res => res.json())
            .then(data => {
                alert('Location saved!');
                location.reload();
            });
        });
    });
</script>
</body>
</html>

