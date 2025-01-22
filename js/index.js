function renderMovieCard(movie){
    const movieCard = document.createElement('div');
    movieCard.className = 'movie-card';
    // inject data to the movie card
    movieCard.innerHTML = `
        <a href="movie?id=${movie.id}">
            <img src="${movie.image}" alt="${movie.title}">
            <h3>${movie.title}</h3>
        </a>
    `;

    return movieCard;
}

function fetchMovies() {
    // api call
    fetch('/api/router.php?route=getMovies')
        .then(response => response.json())
        .then(data => {
            const movieContainer = document.getElementById('featured');

            // loop through the movies and create movie cards
            data.movies.forEach(movie => {
                movieContainer.appendChild(renderMovieCard(movie));
            });
        })
        .catch(error => {
            console.error('Error fetching movies:', error);
            const movieContainer = document.getElementById('featured');
            movieContainer.innerHTML = '<p>Failed to load movies. Please try again later.</p>';
        });
}

// Fetch movies on page load
window.onload = fetchMovies;