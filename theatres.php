
    <h1>Theatre Locations</h1>
    
    <ul>
        <li><button onclick="submitLocation('Golden Village (Plaza)')">Golden Village (Plaza) <span class="arrow">></span></button></li>
        <li><button onclick="submitLocation('Cathay Cineplexes (Jem)')">Cathay Cineplexes (Jem) <span class="arrow">></span></button></li>
        <li><button onclick="submitLocation('Cathay Cineplexes (Causeway Point)')">Cathay Cineplexes (Causeway Point) <span class="arrow">></span></button></li>
        <li><button onclick="submitLocation('Cathay Cineplexes (West Mall)')">Cathay Cineplexes (West Mall) <span class="arrow">></span></button></li>
        <li><button onclick="submitLocation('Golden Village (Jurong Point)')">Golden Village (Jurong Point) <span class="arrow">></span></button></li>
    </ul>

    <form id="locationForm" action="location.php" method="POST">
        <input type="hidden" name="cinema" id="cinema">
        <input type="hidden" name="lat" id="lat">
        <input type="hidden" name="lng" id="lng">
    </form>

    <script>
        function submitLocation(cinema) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function getPosition(position) { //the function has to be declared in the input parameter as we need to submit the lat and lon of user  
                    const userLat = position.coords.latitude;
                    const userLng = position.coords.longitude;
                    // Populate form fields
                    document.getElementById('cinema').value = cinema;
                    document.getElementById('lat').value = userLat;
                    document.getElementById('lng').value = userLng;
                    // Submit the form
                    document.getElementById('locationForm').submit();
                },showError);
            } else {
                alert("Geolocation is not supported by your browser.");
            }
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>
