CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    poster VARCHAR(255),
    banner VARCHAR(255),
    name VARCHAR(255) NOT NULL,
    release_date DATE,
    rated VARCHAR(10),
    synopsis TEXT
);

CREATE TABLE genres (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE movie_genres (
    movie_id INT,
    genre_id INT,
    PRIMARY KEY (movie_id, genre_id),
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE,
    FOREIGN KEY (genre_id) REFERENCES genres(id) ON DELETE CASCADE
);

CREATE TABLE shows (
    id INT PRIMARY KEY AUTO_INCREMENT,
    movie_id INT,
    date DATE,
    screen VARCHAR(50),
    time TIME,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password TEXT NOT NULL
);

CREATE TABLE tickets (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    seat_number VARCHAR(50) UNIQUE NOT NULL, -- Ensures unique seat assignments
    u_id INT NULL, -- Tracks the current owner (NULL if not booked)
    show_id INT NOT NULL, -- References the show this ticket belongs to
    availability ENUM('available', 'booked', 'resale') DEFAULT 'available',
    FOREIGN KEY (show_id) REFERENCES shows(id) ON DELETE CASCADE, -- Deletes tickets if show is deleted
    FOREIGN KEY (u_id) REFERENCES users(id) -- Unassigns user if deleted
);

CREATE TABLE orders (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL, -- User who placed the order
    ticket_id BIGINT NOT NULL, -- Ticket being purchased or resold
    type ENUM('purchase', 'resale') NOT NULL, -- Defines whether it's a purchase or resale
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Automatically tracks order time
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE, -- Deletes orders if user is removed
    FOREIGN KEY (ticket_id) REFERENCES tickets(id) ON DELETE CASCADE -- Deletes orders if ticket is removed
);

CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password TEXT NOT NULL
);
