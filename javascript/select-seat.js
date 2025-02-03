const rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M'];
const seatsPerRow = 14;
const seatPrice = 10;
let selectedSeats = [];

// Hardcoded occupied seats (mocking database result)
const occupiedSeats = ['C3', 'D5', 'F8', 'G6', 'H4', 'J2', 'K7'];

const seatContainer = document.getElementById("seats");
const selectedSeatsElement = document.getElementById("selectedSeats");
const totalPriceElement = document.getElementById("totalPrice");

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
    alert("Proceeding to payment...");
}