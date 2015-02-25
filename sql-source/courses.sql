create table courses(
	school_code enum('L', 'B', 'A', 'F', 'E', 'T', 'I', 'W', 'S', 'U', 'M') not null,
	dept_id TINYINT UNSIGNED NOT NULL,
	course_code char(5),
	name VARCHAR(150),
	primary key(course_code),
	FOREIGN key (school_code) REFERENCES departments (school_code)
)engine = INNODB DEFAULT character SET = utf8 COLLATE = utf8_general_ci;