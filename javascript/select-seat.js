const rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M'];
const seatsPerRow = 14;
const seatPrice = 10;
let selectedSeats = [];

// Hardcoded occupied seats (mocking database result)
const occupiedSeats = ['C3', 'D5', 'F8', 'G6', 'H4', 'J2', 'K7'];

const seatContainer = document.getElementById("seats");
const selectedSeatsElement = document.getElementById("selectedSeats");
const totalPriceElement = document.getElementById("totalPrice");

document.getElementById("back-button").addEventListener("click", function() {
    window.history.back();
});

rows.forEach(row => {
    for (let i = 1; i <= seatsPerRow; i++) {
        if (i === 5|| i === 11) {
            const aisle = document.createElement("div");
            aisle.classList.add("aisle");
            seatContainer.appendChild(aisle);
        }
        
        const seatId = row + i;
        const seat = document.createElement("div");
        seat.classList.add("seat");
        seat.dataset.seat = seatId;
        
        if (occupiedSeats.includes(seatId)) {
            seat.classList.add("occupied");
        } else {
            seat.onclick = () => toggleSeat(seat);
        }
        
        seatContainer.appendChild(seat);
    }
});

function toggleSeat(seat) {
    const seatId = seat.dataset.seat;
    if (selectedSeats.includes(seatId)) {
        selectedSeats = selectedSeats.filter(s => s !== seatId);
        seat.classList.remove("selected");
    } else {
        selectedSeats.push(seatId);
        seat.classList.add("selected");
    }
    updateSummary();
}

function updateSummary() {
    selectedSeatsElement.textContent = selectedSeats.length > 0 ? selectedSeats.join(", ") : "None";
    totalPriceElement.textContent = selectedSeats.length * seatPrice;
}

function proceedNext() {
    if (selectedSeats.length === 0) {
        alert("Please select at least one seat");
        return;
    }
    const location = document.getElementById("movieLocation").innerHTML;
    const time = document.getElementById("movieDate").innerHTML;
    const screen = document.getElementById("screenNumber").innerHTML;
    
    const data = {
        screen: screen,
        movieId: movieId, 
        location: location,
        time: time,
        seats: selectedSeats
    };

    // Send the selected seats to the server using AJAX (Fetch API)
    fetch("save-selection.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            // Redirect to payment page without passing seats in URL
            window.location.href = "index.php?page=payment";
        } else {
            alert("Error saving seats. Please try again.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An error occurred. Please try again.");
    });
}
function submitSeats() {
    var selectedSeatsInput = document.getElementById("selectedSeatsInput").value = selectedSeats.join(",");
    if(selectedSeatsInput.length===0){
        alert("Please select at least one seat");
        return;
    }
    document.getElementById("seatForm").submit();
}