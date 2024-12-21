-- Create the database
CREATE DATABASE drivewise;

-- Use the database
USE drivewise;

-- Create the student table
CREATE TABLE student (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_username VARCHAR(50) NOT NULL,
    student_password VARCHAR(100) NOT NULL,
    student_dob DATE NOT NULL,
    student_email VARCHAR(100) NOT NULL UNIQUE
);

-- Create the educator table
CREATE TABLE educator (
    educator_id INT AUTO_INCREMENT PRIMARY KEY,
    educator_username VARCHAR(50) NOT NULL,
    educator_password VARCHAR(100) NOT NULL,
    educator_dob DATE NOT NULL,
    educator_email VARCHAR(100) NOT NULL UNIQUE
);

-- Create the admin table
CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_username VARCHAR(50) NOT NULL,
    admin_password VARCHAR(100) NOT NULL,
    admin_dob DATE NOT NULL,
    admin_email VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO student (student_username, student_password, student_dob, student_email) 
VALUES 
('john_doe', 'password123', '2002-05-15', 'john.doe@example.com'),
('jane_smith', 'securepass456', '2001-08-22', 'jane.smith@example.com'),
('mike_lee', 'mikepass789', '2003-11-10', 'mike.lee@example.com');

INSERT INTO educator (educator_username, educator_password, educator_dob, educator_email) 
VALUES 
('educator_anna', 'teachme123', '1990-03-12', 'anna.educator@example.com'),
('educator_tom', 'pass2024teach', '1988-07-25', 'tom.educator@example.com'),
('educator_emily', 'emilypass321', '1992-01-18', 'emily.educator@example.com');

INSERT INTO admin (admin_username, admin_password, admin_dob, admin_email) 
VALUES 
('admin_boss', 'adminpass001', '1985-02-10', 'boss.admin@example.com'),
('admin_lead', 'leadpass002', '1983-06-15', 'lead.admin@example.com'),
('admin_mark', 'marksecure003', '1987-09-05', 'mark.admin@example.com');

--  Create the quiz table
CREATE TABLE Quiz (
    quiz_id AUTO_INCREMENT INT PRIMARY KEY,
    quiz_type VARCHAR(50) NOT NULL,
    quiz_question TEXT NOT NULL,
    quiz_option TEXT NOT NULL, -- Could store options as JSON
    quiz_answer VARCHAR(255) NOT NULL
);

--Create Take_quiz table
CREATE TABLE Take_quiz (
    attempt_id AUTO_INCREMENT INT PRIMARY KEY,
    selected_answers TEXT NOT NULL, -- JSON or plain text for selected answers
    quiz_id INT,
    student_id INT,
    admin_id INT,
    FOREIGN KEY (quiz_id) REFERENCES Quiz(quiz_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id),
    FOREIGN KEY (admin_id) REFERENCES Admin(admin_id)
);

--Create Edit_quiz table
CREATE TABLE Edit_quiz (
    editquiz_id  AUTO_INCREMENT INT PRIMARY KEY,
    edit_date DATE NOT NULL,
    edit_time TIME NOT NULL,
    quiz_id INT,
    educator_id INT,
    admin_id INT,
    FOREIGN KEY (quiz_id) REFERENCES Quiz(quiz_id),
    FOREIGN KEY (educator_id) REFERENCES Educator(educator_id),
    FOREIGN KEY (admin_id) REFERENCES Admin(admin_id)
);

--Create Manage_user table
CREATE TABLE Manage_user (
    manage_id AUTO_INCREMENT INT PRIMARY KEY,
    manage_status VARCHAR(50) NOT NULL,
    admin_id INT,
    student_id INT,
    educator_id INT,
    FOREIGN KEY (admin_id) REFERENCES Admin(admin_id),
    FOREIGN KEY (student_id) REFERENCES Student(student_id),
    FOREIGN KEY (educator_id) REFERENCES Educator(educator_id)
);

INSERT INTO Quiz (quiz_id, quiz_type, quiz_question, quiz_option, quiz_answer)
VALUES 
(1, 'Multiple Choice', 'What does a red traffic light mean?', 
 '{"A": "Stop", "B": "Go", "C": "Slow Down"}', 'A'),

(2, 'Multiple Choice', 'What should you do when approaching a pedestrian crossing?', 
 '{"A": "Speed up", "B": "Slow down and stop if needed", "C": "Honk"}', 'B'),

(3, 'Multiple Choice', 'What is the maximum speed limit in a residential area?', 
 '{"A": "30 km/h", "B": "50 km/h", "C": "80 km/h"}', 'A'),

(4, 'Multiple Choice', 'What does a yellow traffic light indicate?', 
 '{"A": "Stop immediately", "B": "Prepare to stop", "C": "Go faster"}', 'B'),

(5, 'Multiple Choice', 'What does a broken white line on the road signify?', 
 '{"A": "No overtaking", "B": "Lane divider, overtaking allowed", "C": "Stop line"}', 'B'),

(6, 'Multiple Choice', 'Who has the right of way at an uncontrolled intersection?', 
 '{"A": "The vehicle on the left", "B": "The vehicle on the right", "C": "The fastest vehicle"}', 'B'),

(7, 'Multiple Choice', 'What does a blue traffic sign usually indicate?', 
 '{"A": "Mandatory instructions", "B": "Warnings", "C": "Prohibitions"}', 'A'),

(8, 'Multiple Choice', 'What should you do if you see a STOP sign?', 
 '{"A": "Slow down and proceed", "B": "Come to a complete stop", "C": "Honk and proceed"}', 'B'),

(9, 'Multiple Choice', 'What is the primary purpose of seat belts?', 
 '{"A": "To look stylish", "B": "To prevent injury in a collision", "C": "To stop the car"}', 'B'),

(10, 'Multiple Choice', 'When driving in heavy rain, what should you do?', 
 '{"A": "Turn on headlights and reduce speed", "B": "Speed up to avoid rain", "C": "Honk continuously"}', 'A');


INSERT INTO Edit_quiz (editquiz_id, edit_date, edit_time, quiz_id, educator_id, admin_id)
VALUES
(1, '2024-12-01', '10:00:00', 1, 1, 2),
(2, '2024-12-02', '11:30:00', 2, 2, 3),
(3, '2024-12-03', '14:15:00', 3, 3, 1),
(4, '2024-12-04', '09:45:00', 4, 1, 3),
(5, '2024-12-05', '16:00:00', 5, 2, 1),
(6, '2024-12-06', '13:25:00', 6, 3, 2),
(7, '2024-12-07', '08:30:00', 7, 1, 2),
(8, '2024-12-08', '12:10:00', 8, 2, 3),
(9, '2024-12-09', '15:45:00', 9, 3, 1),
(10, '2024-12-10', '17:20:00', 10, 1, 3);

INSERT INTO Manage_user (manage_id, manage_status, admin_id, student_id, educator_id)
VALUES
(1, 'Active', 1, 1, 1),
(2, 'Inactive', 2, 2, 2),
(3, 'Active', 3, 3, 3),
(4, 'Active', 1, 4, 2),
(5, 'Inactive', 2, 5, 1),
(6, 'Active', 3, 1, 3),
(7, 'Active', 1, 2, 2),
(8, 'Inactive', 2, 3, 1),
(9, 'Active', 3, 4, 3),
(10, 'Inactive', 1, 5, 2);

INSERT INTO Take_quiz (attempt_id, selected_answers, quiz_id, student_id, admin_id)
VALUES
(1, 'A', 1, 1, 1),
(2, 'B', 2, 2, 2),
(3, 'C', 3, 3, 3),
(4, 'A', 4, 4, 1),
(5, 'B', 5, 5, 2),
(6, 'C', 6, 1, 3),
(7, 'A', 7, 2, 1),
(8, 'B', 8, 3, 2),
(9, 'C', 9, 4, 3),
(10, 'A', 10, 5, 1);



