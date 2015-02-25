select * from story where story_id = '66';

select first_name, last_name, user.user_id, story_content, title, comment_content
from user, story, comment, category
where user.user_id = 88 and 
		user.user_id = story.user_id and 
			user.user_id = comment.user_id and
				story.cat_id = category.cat_id;
				

ALTER TABLE table_name
ADD column_name datatype

insert into story (story_id, user_id, cat_id, story_content, post_time)
values   (3, 88, 1, 'this is a love story' , CURDATE()),
		 (66, 202, 3, 'this is a scientific story' , CURDATE()),
		 (30, 115, 10, 'this is a funny story' , CURDATE());
		 

		 
insert into comment (comment_id, user_id, story_id, comment_content, comment_time)
values   (100, 88, 3, 'good story', CURDATE()),
		 (103, 202, 66, 'nice story', CURDATE()),
		 (108, 115, 30, 'bad story', CURDATE());


select name, user.username, email, story_content, category.cat_name, comment_content
from user, category, story, comment
where user.username = comment.username and
		user.username = story.username and
		story.cat_name = category.cat_name;