function movieForm(){
	$(".active").removeAttr("class");
	$("#mF").attr("class","active");
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("movieForm").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET","movie.php", true);
	xhttp.send();
}

// code that runs when page is loaded:
if (window.location.search == "?movieForm") {
    movieForm();
}