

var url_string = window.location.href; 
var url = new URL(url_string);
var id = url.searchParams.get("id");
var user_name = url.searchParams.get("username");
var count = url.searchParams.get("count");

document.getElementById("no").innerHTML = id;
document.getElementById("user_name").innerHTML = user_name;
document.getElementById("count").innerHTML = count;