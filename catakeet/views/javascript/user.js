const tbody = document.getElementById('body');
var i =0 ;
var count ; 
console.log("this is my test ");

fetch("../api/poultry_house/read.php").then((users)=>{
    //console.log(users);
    return users.json(); //converted to object 
  }).then((objectUser)=>{
    console.log(objectUser.data[0].user_name);
    
    objectUser.data.forEach(user => render1(user));
   
  });

  function render(user , count){
   
  

    i++;
   const tr = document.createElement('tr')
  const td = document.createElement('td')
  const td1 = document.createElement('td')
  const td2 = document.createElement('td')
  const td3 = document.createElement('td')
  const td4 = document.createElement('td')
  const btn = document.createElement('button')
 
  btn.className="btn btn-secondry";
  btn.type="submit";
  btn.id= i ;
 
  btn.onclick=function(){
    const url = 'admin/poultry_cycles.php?id='+ user.ph_id + '&username=' + user.user_name + '&count=' + count ;
   testUrl(url);
  };
  // btn.onclick=testUrl('admin/poultry_cycles.php');

  // const th = document.createElement('th')
  // th.scope="row"
  console.log("the counts ");
  console.log(count);

// const num = document.createTextNode(`${user.id}`)
const num = document.createTextNode(i)
const num1 = document.createTextNode(`${user.user_name}`)
const num2 = document.createTextNode(`${user.ph_id}`)
const num3 = document.createTextNode(count)
const num4 = document.createTextNode("show cycles")

btn.appendChild(num4)

td.appendChild(num)
td1.appendChild(num1)
td2.appendChild(num2)
td3.appendChild(num3)
td4.appendChild(btn)
tr.appendChild(td)
tr.appendChild(td1)
tr.appendChild(td2)
tr.appendChild(td3)
tr.appendChild(td4)
tbody.appendChild(tr)


  }
  


  function render1(user){


    const data = JSON.stringify({ "ph_id": user.ph_id });

    var count ;
    fetch('../api/cycle/ph_cycles.php', {
        method: 'POST', // or 'PUT'
        headers: {
          'Content-Type': 'application/json',
        },
        //body contain the id of nutrient 
        body: data,
      }) // the response will be the unit id and name of selected nutrient 
        .then((response) => response.json())
        .then((data) => {
        // console.log(data.count);
    
         count = data.count;
         console.log(count);
         render(user,count)
        }) .catch((error) => {
            console.error('Error:', error);
          });
         
        
          
  }

  
  function testUrl(data)
  {

      if(data){
          console.log(data);
  // window.location = data; 
  window.open(data);
 
  return false;}
          else{
              alert(data);
          }
}