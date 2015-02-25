insert into user (name, username, password, email)
values     ('Yilong', 'yilonghu', 'wustl', 'bharper@ffym.com'),
           ('Jing', 'jinglu', 'wustl', 'mfreeman@kickinbassist.net');
           
           
insert into category(cat_name, description)
values   ('love story','a collection of love stories'),
		 ('scientific story', NULL),
		 ('funny story', 'many funny stories');
		 


insert into story (username, title, story_content, cat_name, post_time)
values   ('yilonghu', 'love title', 'this is a love story' , 'love story', NOW()),
		 ('jinglu', 'scientific title', 'this is a scientific story', 'scientific story',NOW()),
		 ('yilonghu', 'funny title', 'this is a funny story' , 'funny story', NOW());
		 

		 
insert into comment (story_id, comment_content, username, comment_time)
values   (1, 'good story', 'yilonghu', NOW()),
		 (2, 'nice story', 'jinglu',  NOW()),
		 (3, 'bad story',  'yilonghu',  NOW());