javascript and python and regex must be learned very carefully and mastered
this is the core knowledge of the job    we must be job-orientated 


Is this string a phone number? Is it an e-mail address? Is it a URL? 
Amazon could check if you could do these things (or find / vimdiff / grep / regex)
Debuggex (www.debuggex.com)    we could write the regex at top and use the string test below
the two points of the line would be visualized as the process indicator of the matching



\b \w are \b    all words of the form "_are", where _ is an alphanumeric character

\b means "word boundary". If we didn't have the \b's, (\b is used to truncate the word to be just "_are")
then this regular expression would also match words like "daycare" or "apparel" or "arest".

\w means "any alphanumeric character or underscore". (文字数字的，包括文字与数字的)
Thus, this regular expression will match dare, care, zare, 5are, _are, and so on.

are :are literal characters in the regular expression.
	

1.Character Classes   []

A character class enables you to match any one of a set of characters. 

Surround your characters of interest in square brackets like [aeiou]

->  negated by starting the character set with a caret ^.

[^aeiou\W] 
The \W is a shorthand character class that prevents the above 
regular expression from also matching non-word characters.

1.1 Shorthand Character Classes
using [] as a word class

shortcut for the character classes like [0-9] and [A-Za-z0-9_]  and [ \t\r\n]

digit 	[0-9]     [\d]
word character (alphanumeric : word + number + _ underscore)  [A-Za-z0-9_]     [\w]
whitespace   ([\t\r\n])    [\s]    (s means space, i.e. whitespace)
	
[^0-9]  		\D
[^A-Za-z0-9_]   \W
[^ \t\r\n]		\S
Wildcard character except for line breaks      [^\r\n]		.

note:   "." is the shortcut for matching all things except for line breaks
"." is just like a Wildcard which could be used for anything "*" is the Wildcard in Quantifiers




1.2 Quantifiers   :  used for specify the number of target

Zero or more of     "*"		Match any string, even the empty string: .*
One or more of		"+"		Match any string, except for the empty string: .+
Zero or one of		"?"		have or not have?   like atomically : done or not done at all (synchronized)
N of				{N}		Match all three-digit numbers: \b\d{3}\b
btw m and n  		{M,N} 	Match all two- or three-digit numbers: \b\d{2,3}\b

note: if we do not add boundaries for \b \d{3} \b  we might also match "asdfasd123sfsfsa" instead of "123"
note: \b\d{2,3}\b this is like a discreet mathmatic 2 or 3 will either be matched



1.3 Greedy and Lazy Quantifiers

By default, the * and + quantifiers are greedy: this means that they will continue searching until 
the end of the string if they can. 

More often, however, you want them to stop as soon as something matching the next part of your 
regular expression is found. This is where lazy modifiers come into play.

To make * or + lazy, simply add a ?, as in *? and +?.


you might write the following regular expression to match all HTML tags (view in RegExPal to follow along):
<.+>
note:  <.+> means that "+"		Match any string, except for the empty string: .+ in the <> tag
but this would be greedy,  i.e. it will go to the last > when it is stopped
because "*" and "+" are born as greedy

if we want to make the quantifiers become lazt, i.e. just stop when first matching instead of greedy, i.e.
	go to the last word of the string we could add "?" to make it "one"

<.+?>   Now, the match will stop as soon as a > is encountered.




1.4  Anchors

If your regular expression begins with a cared ^, you will generate only one match, 
which must be at the beginning of the string.

If your regular expression ends with a dollar sign $, you will generate only one match, 
which must be at the end of the string. 

If your regular expression starts with a ^ and ends with a $, 
you will match if and only if the entire string matches the entire regular expression.


regular expression generates a match on all strings that start with a capital letter:
using the "^" to ensure that one word is beginned with sth
^[A-Z]

a valid US phone number:
^\d{3}-\d{3}-\d{4}$

some constraints could be literal like "<>" or "-" in the regex
but to just match a string without any doubt  even without boundaries




2  Groups
Groups enable you to perform operations on multi-character strings. 
To specify a group, surround it with parentheses ().

For example, the following regular expression crudely matches a domain name:

[\w\-]+(\.[\w\-]+)+


note:!!!!!

[^0-9]  		\D
[^A-Za-z0-9_]   \W
[^ \t\r\n]		\S
Wildcard character except for line breaks      [^\r\n]		.

note:   "." is the shortcut for matching all things except for line breaks

these things are just character class : i.e. they all only in charge of match one bit in a string
the number issue is taken care of by the quantifiers "+?*" sth like that

and "." will match anything ( in one bit ) except for line breaks
"." will match "a" or "1"

what about we really want to only match the dot "."????
we need to use the "escape slash!!!!"
[\w\-]+(\.[\w\-]+)+  
just like here we cannot use "." to literal we must use "\." to escape the default key word in python!





2.1 important example to understand regex!!!

You can recognize that our domain-name regular expression has been copied after the "@" sign,
 and before the "@" sign is simply one or more of an alphanumeric or a handful of other characters. 
 We also surrounded the regex with ^ and $ to ensure that we match the entire string.


^[\w!#$%&'*+/=?^_`{}~-]+@[\w\-]+(\.[\w\-]+)+$

in this we must be clear that !!!!! 
there are three parts and three roles 
1. anchors "^" and "$" to define the word length
2. word class to match each single bit like   []   ([\w!#$%&'*+/=?^_`{}~-])  
there could be shortcut for the expression combined with literal in a Character Classes
like [\w !@#$%%^]  because some of them do not have shortcut
3. quantifiers to take care of the matches of number of Character Classes []

[\w!#$%&'*+/=?^_`{}~-]+
"+" means at least one but could more   combined with the character class before it * x
"*" means could be zero ,1,2,34,....
"?" means atomically  :   0 or 1

MVC  : model only is a class of the objects for which we are digging into
controller will do all the logic things between model and controller


^\d{1,3}(\.\d{1,3}){3}$

here \. is still working for escape the default any char "."
This will match an IP address (IPv3). 
We use the quantifier-on-group trick like we did earlier when we matched valid domain names.

{1,3} means could be 1,2,3



2.2 groups in python to extract certain thing from a string

One use of regular expressions is when you want to extract information of a known format out 
of a string. This is when groups come into play.

us number:  \d{3}-(\d{3})-\d{4}


we add the parentheses then it becomes three groups
(\d{3})-(\d{3})-(\d{4})
We now have three groups matched:
1. 123 2. 456 3. 7890


2.3  group in group
We can also have groups within other groups.
(\d{3})-((\d{3})-(\d{4}))
we could match the area code (the first set), 
the office code (the second set), 
the station code (the third set), 
and the subscriber code (the second and third sets combined):



3 regex in different languages : php , python, JavaScript

You are learning three new programming languages in CSE 330: 
PHP (from Module 2), Python (from Module 4), and JavaScript (from Module 6


function domain_from_email($str){
	$email_regex = "/^[\w!#$%&'*+\/=?^_`{|}~-]+@([\w\-]+(?:\.[\w\-]+)+)$/"; if(preg_match($email_regex, $str, $matches)){
	return $matches[1]; } else return false;
}
echo domain_from_email("sam@bbc.co.uk"); // bbc.co.uk



3.1 why python socket programming is so fast? it has all these modules !!! to import!!!

in python there is None to represent null

import re

email_regex = re.compile(r"^[\w!#$%&'*+/=?^_`{|}~-]+@([\w\-]+(?:\.[\w\-]+)+)$")
def domain_from_email(test):
match = email_regex.match(test) 

if match is not None:
return match.group(1) 

else:
return False 

print(domain_from_email("sam@bbc.co.uk")) # bbc.co.uk


3.2
JavaScript
Regular expressions in JavaScript are their own native data type, 
so native that they are expressed using literals surrounded with forward slashes 
and not even strings.

alert(/^\d+$/.test("123")); // true
var emailRegex = /^[\w!#$%&'*+\/=?^_`{|}~-]+@([\w\-]+(?:\. [\w\-]+)+)$/
function domainFromEmail(str){ if(match=emailRegex.exec(str)){
return match[1];
} }
alert(domainFromEmail("sam@bbc.co.uk")); // bbc.co.uk





3.3  using regex in your workflow

we could use it in vim or some edit

for example if we want to find all the tail tags
like </html> and </title>
we could use : 

we must put shortcut in the [] to delimit it as a character class
and use the quantifiers "+" after it to match at least one of them
< / [\w] + >

here we could even find and replace all the tail tag to one same thing!!!!




3.4 use regex and replace in vim

Replace
For search and replace we use “ :s “command (s comes from “substitute").
 
The format of the command is the following:
 
:s/pattern/string/flags - replace pattern with string according to flags. 
Here pattern is what we are searching for. Usually, it is specified by a set of regular expressions.
 
g - flag - Replace all occurrences of pattern (if this flag is not used, vi will substitute only  
	for the next instance of the pattern)

we always want to use g in this case to global replace all

c - flag - Confirm replaces
i - flag - Ignore the case (takes into account all occurrences of the string in upper case or lower case)


gg and G will go to the end or beginning of the file

in vim we could use / to go into searching mode and then we could up and down search for history

the shortcut placed in the character class [] need the one up the return \ not /!!!

</html> for </[\w]+>
