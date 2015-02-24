///instead of using post once and once again
///we could use "get" to pass the value for printing out "error message"
//very very conveniently   : we do not need to create a "different" header for printing out error!





//or we could also use hidden input in the form when using POST to 
//invisibly pass on the values irrelevant to the user input ("just for differentaing forms or error message")

///use this to <input type='hidden' name='form_type' value='post' /> to get the form later
// by using $_POST['form_type']  we could know which is which