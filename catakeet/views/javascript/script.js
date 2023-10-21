function login(){
			
  let result = document.querySelector('.result');
  let name = document.querySelector('#name');
  let password = document.querySelector('#password');
  
  // Creating a XHR object
  let xhr = new XMLHttpRequest();
  let url = "../api/user/login.php";

  // open a connection
  xhr.open("POST", url, true);

  // Set the request header i.e. which type of content you are sending
  xhr.setRequestHeader("Content-Type", "application/json");

  // Create a state change callback
  xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {

          // Print received data from server
          result.innerHTML = this.responseText;

      }
  };

  // Converting JSON data to string
  var data = JSON.stringify({ "user_name": name.value, "password": password.value });

  // Sending data with the request
  xhr.send(data);


}



$("#login_form").submit(function(e) {
  e.preventDefault();
});




$(document).ready(function(){
  $("#new_nutrient").click(function(event){
    event.preventDefault();
  //   window.location = "new_nutrient.php";
    window.open("new_nutrient.php");
  });
});





function myFun(data){
  // window.open(page);
  
  $('#login_form').preventDefault();
   $('#login_form').attr('action', data.page);
  }
  function testUrl(data)
  {
      if(data.page){
          console.log(data.page)
  window.location = data.page;    
  return false;}
          else{
              alert(data.message)
          }
}



function login1(){
  let name = document.querySelector('#name');
  let password = document.querySelector('#password');

  const data =  JSON.stringify({ "user_name": name.value, "password": password.value });

fetch('../api/user/login.php', {
  method: 'POST', // or 'PUT'
  headers: {
    'Content-Type': 'application/json',
  },
  //body contain the id of nutrient 
  body: data,
}) // the response will be the unit id and name of selected nutrient 
  .then((response) => response.json())
  .then((data) => {
      console.log(data);
      testUrl(data);

  })
  .catch((error) => {
    console.error('Error:', error);
  });

}