function clicked() {

	var user = document.getElementById('username');
	var pass = document.getElementById('password');

	var coruser = "test@admin";
	var corpass = "admin";

	if(user.value == coruser) {

		if(pass.value == corpass) {

			window.alert("You are logged in as " + user.value);
			window.open("homepage.html")

		} else {

			window.alert("Incorrect username or password!");
                  
		}

	}

}
