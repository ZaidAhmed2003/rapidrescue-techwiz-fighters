
-- database
create database rapidrescue



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


CREATE TABLE ambulances (
    ambulanceid INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_number VARCHAR(50) UNIQUE NOT NULL,
    equipment_level ENUM('basic', 'advanced') NOT NULL,
    current_status ENUM('available', 'on_call', 'maintenance') DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
    ambulanceid INT,
    FOREIGN KEY (ambulanceid) REFERENCES ambulances(ambulanceid)
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
  `idmessages` AUTO_INCREMENT INT NOT NULL,
  `fullname` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `phone` VARCHAR(45) NULL,
  `subject` VARCHAR(100) NULL,
  `message` VARCHAR(255) NULL,
  PRIMARY KEY (`idmessages`));
