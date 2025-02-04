-- Create the users table
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
);

-- Create the movies table
CREATE TABLE movies (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL,
    description LONGTEXT,
    poster BLOB
);

-- Create the shows table
CREATE TABLE shows (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    movie_id BIGINT NOT NULL,
    cinema TEXT NOT NULL,
    screen TEXT NOT NULL,
    date DATETIME NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES movies(id)
);

-- Create the tickets table
CREATE TABLE tickets (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    seat_number TEXT UNIQUE NOT NULL,
    u_id BIGINT NULL, -- Tracks the current owner
    show_id BIGINT NOT NULL,
    availability ENUM('available', 'booked', 'resale') DEFAULT 'available',
    FOREIGN KEY (show_id) REFERENCES shows(id),
    FOREIGN KEY (u_id) REFERENCES users(id)
);

-- Create the orders table
CREATE TABLE orders (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    ticket_id BIGINT NOT NULL,
    type ENUM('purchase', 'resale') NOT NULL, -- Purchase or resale
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (ticket_id) REFERENCES tickets(id)
);

-- Create the admin table
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Unique ID for each admin
    name VARCHAR(100) NOT NULL,        -- Admin name
    password_hash VARCHAR(255) NOT NULL, -- Password hash for secure storage
    security_key VARCHAR(255) NOT NULL -- Security key for additional authentication
    
);

