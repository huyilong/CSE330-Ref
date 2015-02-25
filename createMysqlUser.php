mysql> create user 'test'@'localhost' identified by 'testpwd'    
    -> ;
Query OK, 0 rows affected (0.00 sec)

mysql> create database testGrant;
Query OK, 1 row affected (0.00 sec)

mysql> grant all on testGrant.* to 'test'@'localhost' with grant option;
Query OK, 0 rows affected (0.00 sec)

mysql> flush PRIVILEGES;
Query OK, 0 rows affected (0.00 sec)



1.  Creating a New User
To create a new user named USERNAME with the password PASSWORD, run the following query inside MySQL:

CREATE user 'USERNAME'@'localhost' identified BY 'PASSWORD';

This will create USERNAME, but that user will not have privileges to access any databases.


2.  Granting Privileges
MySQL provides the grant command to grant privileges to a user. The syntax for assigning USERNAME some 
PRIVILEGES on a TABLE in a DATABASE is:

GRANT PRIVILEGES on DATABASE.TABLE to USERNAME@'localhost';

If you want to grant global privileges to a certain administrative user, run the query like this:
GRANT all on *.* to USERNAME@'localhost' with GRANT OPTION;


The with grant option enables this user to create other users and assign them permissions, 
like we are doing here.
If you want to grant privileges to a certain user so that they can only manipulate data 
in a certain database (a wise idea for when you create a user to use in your PHP web application),
 run the query like this:

GRANT SELECT,INSERT,UPDATE,DELETE on DATABASE.* to USERNAME@'localhost';


3.	Whenever you change privileges, you also need to run the query flush privileges;

flush PRIVILEGES;