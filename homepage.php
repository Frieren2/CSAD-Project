<div style="display: flex; gap: 5px; flex-direction: column;">
<h1 class="headers">Welcome Admin:</h1>
<div>
    <span class="headers">Cinemas:</span>
    <select class="select" onchange="changeImage()" id="cinemaSelect">
        <option value="Cathay Cineplexes (West Mall)">
        Cathay Cineplexes (West Mall)
        </option>
        <option value="Cathay Cineplexes (Jem)">
            Cathay Cineplexes (Jem)
        </option>
        <option value="Cathay Cineplexes (Causeway Point)">
            Cathay Cineplexes (Causeway Point)
        </option>
        <option value="Golden Village (Plaza)">
        Golden Village (Plaza)
        </option>
        <option value="Golden Village (Jurong Point)">
            Golden Village (Jurong Point)
        </option>
    </select>
    </div>
    <div class="container">
        <img id="cinemaImage" src="resources/westmall.jpeg" alt="Cinema Image">
        <a href="#screen" class="cinema-button">Available Screens</a>
    </div>
    <div class="headers"><h2>Ongoing Shows:</h2></div>
    <div class="date-nav">
        <button id="prev-date" class="buttondate">&lt;</button>
        <span id="selected-date">Today</span>
        <button id="next-date" class="buttondate">&gt;</button>
    </div>

    <div class="movie-list" id="movie-list" style="margin-left:220px">
        <!-- Movies will be added dynamically -->
    </div>
    <h2 class="headers" id="screen">Available Screens:</h2>
    <div class="headers" id="available-screens"></div>
</div>
<script>
const availableScreens = {
    "Cathay Cineplexes (West Mall)": {
        [formatDate(new Date())]: ["Screen 1", "Screen 2", "Screen 3"],
        [formatDate(new Date(new Date().setDate(new Date().getDate() + 1)))]: ["Screen 1", "Screen 4"]
    },
    "Cathay Cineplexes (Jem)": {
        [formatDate(new Date())]: ["Screen 5", "Screen 6"],
        [formatDate(new Date(new Date().setDate(new Date().getDate() + 1)))]: ["Screen 5", "Screen 7"]
    },
    "Cathay Cineplexes (Causeway Point)": {
        [formatDate(new Date())]: ["Screen 8"],
        [formatDate(new Date(new Date().setDate(new Date().getDate() + 1)))]: ["Screen 9"]
    },
    "Golden Village (Plaza)": {
        [formatDate(new Date())]: ["Screen 10", "Screen 11"],
        [formatDate(new Date(new Date().setDate(new Date().getDate() + 1)))]: ["Screen 12"]
    },
    "Golden Village (Jurong Point)": {
        [formatDate(new Date())]: ["Screen 13"],
        [formatDate(new Date(new Date().setDate(new Date().getDate() + 1)))]: ["Screen 14"]
    }
};
function updateScreens() {
    const selectedCinema = document.getElementById("cinemaSelect").value;
    const screenContainer = document.getElementById("available-screens");
    screenContainer.innerHTML=""; // Reset previous screens

    const screens = availableScreens[selectedCinema]?.[dates[currentDateIndex]] || ["No screens available"];

    screens.forEach(screen => {
        const screenElement = document.createElement("p");
        screenElement.textContent = screen;
        screenContainer.appendChild(screenElement);
    });
}
    function changeImage() {
            var select = document.getElementById("cinemaSelect");
            var image = document.getElementById("cinemaImage");

            var images = {
                "Cathay Cineplexes (West Mall)": "resources/westmall.jpeg",
                "Cathay Cineplexes (Jem)": "resources/jem.jpeg",
                "Cathay Cineplexes (Causeway Point)": "resources/causeway.jpeg",
                "Golden Village (Plaza)": "resources/plaza.jpeg",
                "Golden Village (Jurong Point)": "resources/jurong.jpeg"
            };

            var selectedCinema = select.value;
            image.src = images[selectedCinema];
            updateScreens(); 
        }
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
        updateScreens(); // Update screens on date change
    }
});

document.getElementById("next-date").addEventListener("click", () => {
    if (currentDateIndex < dates.length - 1) {
        currentDateIndex++;
        selectedDate.textContent = dates[currentDateIndex];
        updateMovies();
        updateScreens(); // Update screens on date change
    }
});

// Initialize movies on page load
updateMovies();
updateScreens();

    </script>
