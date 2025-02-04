<?php
session_start();

// Fetch stored session data
$selectedSeats = isset($_SESSION['selected_seats']) ? $_SESSION['selected_seats'] : [];
$movieId = isset($_SESSION['movieId']) ? $_SESSION['movieId'] : '';
$location = isset($_SESSION['location']) ? $_SESSION['location'] : '';
$time = isset($_SESSION['time']) ? $_SESSION['time'] : '';
$qty = count($selectedSeats);

$seatsDisplay = !empty($selectedSeats) ? implode(", ", $selectedSeats) : "None";

?>
<div class="container">
    <h2 class="summary-header">Summary</h2>
    <div class="details">
        <div class="details-left">
            <h3 class="movie-title">Movie Title 1 <?= $movieId ?></h3>
            <b>Showing On:</b>
            <div class="movie-timing"><?= $time ?></div>
            <div class="movie-location"><?= $location ?></div>
            <div class="movie-screen">Screen 6</div>
            <b>Seats:</b>
            <div><?= $seatsDisplay ?></div>
        </div>
        <div class="details-right">
            <img src="resources/movie-poster1.png">
        </div>
    </div>

    <div class="payment-breakdown">
        <table>
            <tr>
                <th>Items</th>
                <th>Cost</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Standard Ticket</td>
                <td id="ticket-cost">$10.00</td>
                <td id="ticket-qty">x<?= $qty ?></td>
                <td id="total-cost">$<?= number_format(10 * $qty, 2); ?></td>
            </tr>
        </table>
    </div>
</div>

<form id="checkout-form" action="checkout.php" target="blank" method="POST"></form>
<div class="button-container">
        <button class="btn back" id="back-button">Back</button>
        <button class="btn proceed" id="proceed-button">Proceed to Payment</button>

</div>
</div>
