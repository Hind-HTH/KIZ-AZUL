Create Database Kiza;
Use database;

CREATE TABLE USERS(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    date_of_birth DATE,
    email VARCHAR(100) NOT NULL,
    pwd  VARCHAR(255) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    
);