
im using xampp as a server, downloard here: https://www.apachefriends.org/

and this is where the files are saved on my PC
C:\xampp\htdocs\se

database name is fitness_app

and this is the table created for user login connection

CREATE TABLE user (
    account_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(100),
    gender CHAR(1) CHECK (gender IN ('M', 'F', 'O')),
    height DECIMAL(5,2),
    weight DECIMAL(5,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
