-- Create a table named students with the following fields:
-- id of an appropriately-sized unsigned integer type (we will never need to process more than a million students)
-- first_name of type VARCHAR(50)
-- last_name of type VARCHAR(50)
-- email_address of type VARCHAR(50)
-- The primary key should be on the id field.

-- Create a table named departments with the following fields:
-- school_code of type ENUM (e.g. "L" for ArtSci and "E" for Engineering). The options are as follows:
-- 'L', 'B', 'A', 'F', 'E', 'T', 'I', 'W', 'S', 'U', 'M'
-- dept_id of an appropriately-sized unsigned integer type (in the foreseeable future there will never be more than 200 departments in a school)
-- abbreviation of type VARCHAR(9) (e.g. CSE, ChemE, etc)
-- dept_name of type VARCHAR(200) (e.g. Computer Science and Engineering)
-- The primary key should be on two fields: school_code and dept_id
-- Note: Why not just use the department ID for the primary key? The ID numbers are sometimes reused across schools. For instance, department 33 in The College of Arts and Sciences is Psychology while department 33 in The School of Engineering and Applied Sciences is Energy, Environmental and Chemical Engineering. Thus we must also include the school code to differentiate them such that the record for E33 is distinct from that of L33.

-- Create a table named courses with the following fields:
-- school_code of type ENUM
-- This should have the same letters in the same order as the school_code ENUM field in the departments table.
-- dept_id of the same size of integer as in the departments table
-- course_code of type CHAR(5) (this will hold course codes; e.g., '330S', '131', '2960')
-- name of type VARCHAR(150)

-- pk_grade_ID of an appropriately-sized unsigned integer type (should be larger than the one you chose for the students table)
-- student_id of the same integer (unsigned) type that you chose in the students table
-- grade of type decimal(5,2)
-- school_code of type ENUM
-- Can you guess what entries to use for the enum?
-- dept_id of the same integer type that you've used for this field in other tables
-- course_code of the same type you chose for the course code in the courses table
-- The grades table should have foreign keys to both the students table and the courses table.

INSERT INTO students (id, first_name, last_name, email_address) 
VALUES ('88', 'Ben', 'Harper', 'bharper@ffym.com'), 
	   ('202', 'Matt', 'Freeman', 'mfreeman@kickinbassist.net'),
	   ('115', 'Marc', 'Roberge', 'mroberge@ofarevolution.us'); 

-- the sql code above is for inserting data into students table
INSERT INTO departments (school_code, dept_id, abbreviation, dept_name) 
VALUES ('E', '81', 'CSE', 'COMPUTER SCIENCE AND ENGINEERING');



INSERT INTO courses (school_code, dept_id, course_code, name)
values ('E', '81', '330S', 'Rapid Prototype Development and Creative Programming'),
	   ('E', '81', '436S', 'Software Engineering Workshop'),
	   ('E', '81', '566S', 'High Performance Computer Systems');

insert into grades (student_id, grade, school_code, dept_id, course_code)
values ('88', '35.5', 'E', '81', '330S'),
	   ('88', '0', 'E', '81', '436S'),
	   ('88', '95', 'E', '81', '566S'),

	   ('202', '100', 'E', '81', '330S'),
	   ('202', '90.5', 'E', '81', '436S'),
	   ('202', '94.8', 'E', '81', '566S'),

	   ('115', '75', 'E', '81', '330S'),
	   ('115', '37', 'E', '81', '436S'),
	   ('115', '45.5', 'E', '81', '566S');


