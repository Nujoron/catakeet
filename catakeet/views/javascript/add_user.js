function addUser(){
    let name = document.querySelector('#name');
    let password = document.querySelector('#password');
    let ph = document.querySelector('#ph');
  
    const data =  JSON.stringify({ "user_name": name.value, "password": password.value , "poultry": ph.value });
  
  fetch('../../api/user/create.php', {
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
  
    alert('user created succesfully');
  }