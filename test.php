<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Schedule</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background: #121212;
    color: white;
    text-align: center;
}

.date-nav {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
   
}

button {
    background: red;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
    border-radius: 5px;
}

.movie-list {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.movie {
    display: flex;
    align-items: center;
    background: #222;
    padding: 15px;
    border-radius: 10px;
    width: 80%;
    max-width: 600px;
}

.movie img {
    width: 80px;
    height: 120px;
    margin-right: 15px;
    border-radius: 5px;
}

.showtimes {
    display: flex;
    gap: 10px;
    flex-wrap: wrap; /* Prevents stretching if there are too many items */
    justify-content: flex-start; /* Aligns showtimes neatly */
}

.showtime {
    background: white;
    color: black;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px; /* Ensures consistent text size */
    min-width: 70px; /* Set a minimum width */
    text-align: center; /* Center text inside the box */

}

    </style>
</head>
<body>

    <div class="date-nav">
        <button id="prev-date">&lt;</button>
        <span id="selected-date">Today</span>
        <button id="next-date">&gt;</button>
    </div>

    <div class="movie-list" id="movie-list">
        <!-- Movies will be added dynamically -->
    </div>

    <script>
function formatDate(date) {
    const options = { month: 'short', day: '2-digit', year: 'numeric' };
    return date.toLocaleDateString('en-US', options);
}

function generateDates() {
    const dates = [];
    const startDate = new Date(); // Starting point
    const endDate = new Date("2025-12-31");

    let currentDate = new Date(startDate); // Create a fresh instance

    while (currentDate <= endDate) {
        dates.push(formatDate(currentDate)); // Use formatDate here
        currentDate.setDate(currentDate.getDate() + 1);
    }

    return dates;
}

// Automatically remove past dates on page load
function removePastDates() {
    const todayFormatted = formatDate(new Date());
    dates = dates.filter(date => new Date(date) >= new Date(todayFormatted));
}

// Initialize dates
let dates = generateDates();
removePastDates(); // Remove old dates
let currentDateIndex = 0;

// DOM elements
const selectedDate = document.getElementById("selected-date");
const movieList = document.getElementById("movie-list");

// Set initial date display
selectedDate.textContent = dates[currentDateIndex];

// Movie schedule database (dynamic)
const movieSchedules = {
    [formatDate(new Date())]: [
        { title: "Baby Hero (M)", duration: "1 hr 45 mins", rating: "PG13", img: "resources/movie-poster.png", times: ["11:40 PM"] },
        { title: "Better Man", duration: "2 hr 15 mins", rating: "M18", img: "resources/movie-poster.png", times: ["12:10 AM"] }
    ],
    [formatDate(new Date(new Date().setDate(new Date().getDate() + 1)))]: [
        { title: "Baby Hero (M)", duration: "1 hr 45 mins", rating: "PG13", img: "resources/movie-poster.png", times: ["11:20 AM", "1:45 PM", "4:25 PM", "6:50 PM", "9:35 PM", "11:59 PM"] },
        { title: "The Prosecutor (M)", duration: "1 hr 57 mins", rating: "NC16", img: "resources/movie-poster.png", times: ["4:10 PM", "9:15 PM", "11:55 PM"] }
    ]
};

// Function to update movie list
function updateMovies() {
    movieList.innerHTML = "";
    const movies = movieSchedules[dates[currentDateIndex]] || [];

    movies.forEach(movie => {
        const movieDiv = document.createElement("div");
        movieDiv.classList.add("movie");

        movieDiv.innerHTML = `
            <img src="${movie.img}" alt="${movie.title}">
            <div>
                <h3>${movie.title}</h3>
                <p>${movie.rating} | ${movie.duration}</p>
                <div class="showtimes">
                    ${movie.times.map(time => `<span class="showtime">${time}</span>`).join("")}
                </div>
            </div>
        `;
        movieList.appendChild(movieDiv);
    });
}

// Date navigation controls
document.getElementById("prev-date").addEventListener("click", () => {
    if (currentDateIndex > 0) {
        currentDateIndex--;
        selectedDate.textContent = dates[currentDateIndex];
        updateMovies();
    }
});

document.getElementById("next-date").addEventListener("click", () => {
    if (currentDateIndex < dates.length - 1) {
        currentDateIndex++;
        selectedDate.textContent = dates[currentDateIndex];
        updateMovies();
    }
});

// Initialize movies on page load
updateMovies();



    </script>
</body>

</html>
