JQuery Form Example
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script><script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script type="text/javascript">// <![CDATA[
$(document).ready(function(){
$("#myform").validate({
debug: false,
rules: {
name: "required",
email: {
required: true,
email: true
}
},
messages: {
name: "Please let us know who you are.",
email: "A valid email will help us get in touch with you.",
},
submitHandler: function(form) {
// do other stuff for a valid form
$.post('mailer.php', $("#myform").serialize(), function(data) {
$('#results').html(data);
});
}
});
});
// ]]></script></pre>
<form id="myform" action="" method="POST" name="myform"><!-- The Name form field -->
<label id="name_label" for="name">Nom</label>
<input id="name" type="text" name="name" value="" size="30" />
 
<!-- The Email form field -->
<label id="email_label" for="email">Email</label>
<input id="email" type="text" name="email" value="" size="30" />
 
<!-- The Submit button -->
<input type="submit" name="submit" value="Submit" /></form>
<pre>
<!-- We will output the results from process.php here --></pre>
<div id="results"></div>
<pre>