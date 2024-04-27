	// Use jQuery to make an AJAX request to ipify API
    $.getJSON('https://api.ipify.org?format=json', function(data) {
		// Retrieve and display the user's IP address
		var ipAddress = data.ip;
		var MyIp = '154.178.1.146';
		if (ipAddress==MyIp) {
		document.getElementById('myButton').style.display = 'block';
		}
		});
