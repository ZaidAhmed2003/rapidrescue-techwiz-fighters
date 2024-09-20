
-- database
-- create database rapidrescue

-- users table
CREATE TABLE users (
    userid INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    phonenumber VARCHAR(15),
    password VARCHAR(255) NOT NULL,
    date_of_birth DATE,
    address VARCHAR(255),
    role ENUM('user', 'admin', 'driver') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ambulances (
    ambulanceid INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_number VARCHAR(50) UNIQUE NOT NULL,
    equipment_level ENUM('Basic Life Support (BLS)', 'Advanced Life Support (ALS)', 'Neonatal Ambulance', 'Air Ambulance', 'Patient Transport') NOT NULL,
    capacity INT NOT NULL,
    location VARCHAR(255) NOT NULL,
    current_status ENUM('available', 'dispatched', 'on_call', 'maintenance', 'in_service') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE emergency_requests (
    requestid INT AUTO_INCREMENT PRIMARY KEY,
    userid INT,
    ambulanceid INT,
    request_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'completed', 'cancelled') DEFAULT 'pending',
    hospital_name VARCHAR(255),
    pickup_address VARCHAR(255),
    customer_mobile VARCHAR(15),
    type ENUM('emergency', 'non-emergency'),
    FOREIGN KEY (userid) REFERENCES users(userid),
    FOREIGN KEY (ambulanceid) REFERENCES ambulances(ambulanceid)
);


CREATE TABLE emts (
    emtid INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    certification VARCHAR(100) NOT NULL,
    phonenumber VARCHAR(15),
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE drivers (
    driverid INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    phonenumber VARCHAR(15),
    license_number VARCHAR(100),
    location VARCHAR(255),
    experience_years INT DEFAULT 0,
    status ENUM('On Duty', 'Off Duty') DEFAULT 'On Duty',
    ambulanceid INT,
    FOREIGN KEY (ambulanceid) REFERENCES ambulances(ambulanceid) ON DELETE SET NULL
);

CREATE TABLE feedback (
    feedbackid INT AUTO_INCREMENT PRIMARY KEY,
    userid INT,
    requestid INT,
    comments TEXT,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userid) REFERENCES users(userid),
    FOREIGN KEY (requestid) REFERENCES emergency_requests(requestid)
);

CREATE TABLE notifications (
    notificationid INT AUTO_INCREMENT PRIMARY KEY,
    userid INT,
    message TEXT NOT NULL,
    status ENUM('unread', 'read') DEFAULT 'unread',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userid) REFERENCES users(userid)
);

CREATE TABLE ambulance_driver_assignments (
    assignmentid INT AUTO_INCREMENT PRIMARY KEY,
    ambulanceid INT,
    driverid INT,
    status ENUM('assigned', 'unassigned') DEFAULT 'assigned',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ambulanceid) REFERENCES ambulances(ambulanceid),
    FOREIGN KEY (driverid) REFERENCES drivers(driverid)
);

CREATE TABLE `rapidrescue`.`messages` (
  `idmessages`INT AUTO_INCREMENT NOT NULL,
  `fullname` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `phone` VARCHAR(45) NULL,
  `subject` VARCHAR(100) NULL,
  `message` VARCHAR(255) NULL,
  PRIMARY KEY (`idmessages`));


-- Sample Data Querys

INSERT INTO ambulances (vehicle_number, equipment_level, capacity, location, current_status)
VALUES 
('ABC123', 'Basic Life Support (BLS)', 2, 'Downtown Station', 'available'),
('DEF456', 'Advanced Life Support (ALS)', 4, 'Uptown Station', 'dispatched'),
('GHI789', 'Neonatal Ambulance', 2, 'City Hospital', 'maintenance'),
('JKL012', 'Air Ambulance', 6, 'Airport Base', 'in_service'),
('MNO345', 'Patient Transport', 4, 'Main Street Station', 'on_call');


INSERT INTO drivers (firstname, lastname, phonenumber, license_number, location, experience_years, status, ambulanceid)
VALUES 
('John', 'Doe', '555-1234', 'DL12345678', 'Downtown', 5, 'On Duty', 1),
('Jane', 'Smith', '555-5678', 'DL87654321', 'Uptown', 8, 'Off Duty', 2),
('Alex', 'Johnson', '555-9101', 'DL24681012', 'City Hospital', 3, 'On Duty', 3),
('Emily', 'Davis', '555-1122', 'DL13579111', 'Airport Base', 7, 'On Duty', 4),
('Michael', 'Brown', '555-3141', 'DL19283746', 'Main Street', 2, 'Off Duty', 5);


INSERT INTO emts (firstname, lastname, certification, phonenumber, email) 
VALUES 
('John', 'Doe', 'Certified EMT', '123-456-7890', 'john.doe@example.com'),
('Jane', 'Smith', 'Advanced EMT', '098-765-4321', 'jane.smith@example.com'),
('Mike', 'Johnson', 'Certified EMT', '555-123-4567', 'mike.johnson@example.com'),
('Emily', 'Davis', 'Advanced EMT', '555-987-6543', 'emily.davis@example.com'),
('Chris', 'Brown', 'Paramedic', '555-111-2222', 'chris.brown@example.com');
