////////here we could just write the code in the editor and then upload to server
////////using mysql -u hu,yilong -p entering the mysql server
////////we coudl do " source   path to your file.sql to run the commands "

////////if you want to delete or update just using the myPHPAdmin website !!!
////////or using "show create table table_name" to check out all the constraints!!!!


create table courses(
	school_code enum('L', 'B', 'A', 'F', 'E', 'T', 'I', 'W', 'S', 'U', 'M') not null,
	dept_id TINYINT UNSIGNED not null,
	course_code char(5) not null,
	name VARCHAR(150) not null,
	primary key(school_code, dept_id, course_code),
	FOREIGN key (school_code, dept_id) REFERENCES departments (school_code, dept_id)
)engine = INNODB DEFAULT character SET = utf8 COLLATE = utf8_general_ci;


create table departments(
	school_code enum('L', 'B', 'A', 'F', 'E', 'T', 'I', 'W', 'S', 'U', 'M') not null,
	dept_id TINYINT UNSIGNED NOT NULL,
	abbreviation varchar(9),
	dept_name varchar(200) not null,
	primary key(school_code, dept_id)
)engine = INNODB DEFAULT character SET = utf8 COLLATE = utf8_general_ci;

//////in this grades table the student_id is a FOREIGN key of another table primary key 
//////foreign key is the subset of primary key
 create table grades(
   pk_grade_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
   PRIMARY KEY(pk_grade_ID),
   student_id MEDIUMINT UNSIGNED NOT NULL,
   grade decimal(5,2),
   school_code enum('L', 'B', 'A', 'F', 'E', 'T', 'I', 'W', 'S', 'U', 'M') not null,
   dept_id TINYINT UNSIGNED NOT NULL,
   course_code char(5) not null,
   FOREIGN key (student_id) REFERENCES students (id),
   FOREIGN key (school_code, dept_id, course_code) REFERENCES courses (school_code, dept_id, course_code)
)engine = INNODB DEFAULT character SET = utf8 COLLATE = utf8_general_ci;



insert into students (id, first_name, last_name, email_address)
values     ('88', 'Ben', 'Harper', 'bharper@ffym.com'),
           ('202', 'Matt', 'Freeman', 'mfreeman@kickinbassist.net'),
           ('115', 'Marc', 'Roberge', 'mroberge@ofarevolution.us');



insert into courses (school_code, dept_id, course_code, name)
values 	   ('E', '81', '330S', 'Rapid Prototype Development and Creative Programming'),
           ('E', '81', '462M', 'Computer Systems Design'),
           ('E', '81', '566S', 'High Performance Computer Systems');



LOAD DATA INFILE '/home/hu.yilong/MySQL/students_data.txt' INTO TABLE students;
LOAD DATA INFILE '/home/hu.yilong/MySQL/departments_data.txt' INTO TABLE departments;
LOAD DATA INFILE '/home/hu.yilong/MySQL/courses.txt' INTO TABLE courses;
LOAD DATA INFILE '/home/hu.yilong/MySQL/grades_data.txt' INTO TABLE grades;

