-- Create the students table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    age INT,
    course VARCHAR(50),
    year_level INT
);

-- Insert 10 records with Filipino names
INSERT INTO students (name, age, course, year_level) VALUES
('Juan Dela Cruz', 20, 'Computer Science', 3),
('Maria Santos', 19, 'Information Technology', 2),
('Josefa Alvarado', 21, 'Cybersecurity', 4),
('Miguel Reyes', 18, 'Computer Engineering', 1),
('Luzviminda Perez', 22, 'Information Systems', 4),
('Carlos Mendoza', 20, 'Data Science', 3),
('Ana Liza Domingo', 19, 'Software Engineering', 2),
('Roberto Bautista', 21, 'Network Administration', 4),
('Elena Salazar', 20, 'Multimedia Arts', 3),
('Fernando Aquino', 18, 'Web Development', 1);
