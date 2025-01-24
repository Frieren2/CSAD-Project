<?php
$cinema = $_POST['cinema'] ;
$userLat = $_POST['lat'];
$userLng = $_POST['lng'];
$mapEmbedUrl = null;

if (isset($userLat) && isset($userLng)) {
    switch ($cinema) {
        case "Golden Village (Plaza)":
            $cinemaLat = 1.301956655468868;
            $cinemaLng = 103.84383519918484;
            break;
        case "Cathay Cineplexes (Jem)":
            $cinemaLat = 1.3332;
            $cinemaLng = 103.7439;
            break;
        case "Cathay Cineplexes (Causeway Point)":
            $cinemaLat = 1.4361;
            $cinemaLng = 103.7861;
            break;
        case "Cathay Cineplexes (West Mall)":
            $cinemaLat = 1.3535;
            $cinemaLng = 103.7519;
            break;
        case "Golden Village (Jurong Point)":
            $cinemaLat = 1.3395;
            $cinemaLng = 103.7069;
            break;
        default:
            $error = "Invalid cinema selected.";
            break;
    }
}

if (isset($cinemaLat) && isset($cinemaLng)) {
    $mapEmbedUrl = "https://www.google.com/maps/embed/v1/directions?key=AIzaSyAWjkJxkFP4Zq1bRHlM4XBxgyTb34PNr8g&origin={$userLat},{$userLng}&destination={$cinemaLat},{$cinemaLng}";
} else {
    $error = "Invalid input or location data is missing.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($cinema); ?> Directions</title>
    <link href="css/location.css" rel="stylesheet" type="text/css">
</head>
<body>
    <header>
        <h1>Directions to <?php echo htmlspecialchars($cinema); ?></h1>
    </header>
    <div class="map-container">
        <?php if ($mapEmbedUrl): ?>
            <iframe
              src="<?php echo htmlspecialchars($mapEmbedUrl); ?>"
              allowfullscreen>
            </iframe>
        <?php elseif (isset($error)): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php else: ?>
            <p>Unable to generate map. Please ensure location services are enabled.</p>
        <?php endif; ?>
    </div>
    <div style="text-align: center;">
        <a href="theatres.php">Go Back</a>
    </div>
</body>
</html>
