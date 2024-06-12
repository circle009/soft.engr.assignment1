
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

// 2nd database table for foodlist
CREATE TABLE food_list (
    foodID INT PRIMARY KEY AUTO_INCREMENT,
    food VARCHAR(100) NOT NULL,
    servingSize VARCHAR(50),
    calories INT,
    Carbohydrates DECIMAL(5, 2),
    Protein DECIMAL(5, 2),
    Fat DECIMAL(5, 2)
);
