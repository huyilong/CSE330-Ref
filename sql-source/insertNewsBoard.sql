insert into user (name, username, password, email)
values     ('cse330', 'wustl', 'wustl', 'bharper@ffym.com');           
           

insert into story (username, title, story_content, cat_name, post_time)
values   ('wustl', 'title4', 'this is a fantastic story' , 'life', NOW())
		 ('yilonghu', 'title1', 'this is a love story' , 'sports', NOW()),
		 ('jinglu123', 'title2', 'this is a scientific story', 'education',NOW()),
		 ('wustl', 'title3', 'this is a funny story' , 'entertainment', NOW());
		 

		 
insert into comment (story_id, comment_content, username, comment_time)
values   (1, 'good story', 'yilonghu', NOW()),
		 (2, 'nice story', 'jinglu123',  NOW()),
		 (3, 'bad story',  'yilonghu',  NOW()),
		 (2, 'nice story', 'jinglu123',  NOW()),
		 (3, 'great', 'jinglu123',  NOW()),
		 (1, 'very good', 'wustl',  NOW()),
		 (4, 'it sucks', 'wustl',  NOW());