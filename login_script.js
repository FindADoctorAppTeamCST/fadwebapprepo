function validateEmptyFields() {
	if(document.loginform.username.value=="") {
		document.getElementById('disperr').innerHTML="Required";
	}
}