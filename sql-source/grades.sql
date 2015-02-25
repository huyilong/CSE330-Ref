 create table grades(
   pk_grade_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
   PRIMARY KEY(pk_grade_ID),
   student_id MEDIUMINT UNSIGNED NOT NULL,
   grade decimal(5,2),
   school_code enum('L', 'B', 'A', 'F', 'E', 'T', 'I', 'W', 'S', 'U', 'M') not null,
   dept_id TINYINT UNSIGNED NOT NULL,
   course_code char(5),
   FOREIGN key (student_id) REFERENCES students (id),
   FOREIGN key (course_code) REFERENCES courses (course_code)
)engine = INNODB DEFAULT character SET = utf8 COLLATE = utf8_general_ci;