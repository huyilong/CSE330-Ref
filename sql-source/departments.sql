create table departments(
	school_code enum('L', 'B', 'A', 'F', 'E', 'T', 'I', 'W', 'S', 'U', 'M') not null,
	dept_id TINYINT UNSIGNED NOT NULL,
	abbreviation varchar(9),
	dept_name varchar(200) not null,
	primary key(school_code, dept_id)
)engine = INNODB DEFAULT character SET = utf8 COLLATE = utf8_general_ci;


