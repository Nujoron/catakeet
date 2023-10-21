const select = document.querySelector('.option')
const unitselect =  document.getElementById("tow");
const label1 = document.getElementById("unit");
const check = document.getElementById("form_check")

//function to add option element and its attributs 
function render(nutrient) {
  const opt = document.createElement('option')
  opt.value = nutrient.nutrient_id
  const content = document.createTextNode(`${nutrient.nutrient_name}`)
  opt.appendChild(content)
  select.appendChild(opt)

}


//function to get the unit and display it in label 
function render1(unit) {
  const unitlabel = document.getElementById("unit");


  unitlabel.innerHTML=""
  const content1 = document.createTextNode(`${unit.unit_name}`)
  unitlabel.appendChild(content1)

}

function render2(vaccine) {
  const opt = document.createElement('input')
 
  opt.type="checkbox"
  opt.name="pl"
  opt.className="form-check-input"
  opt.value = vaccine.vaccine_id
  const lbl = document.createElement('label')
const div =document.createElement('div')
div.classList="col-sm-8"
  lbl.className="form-check-label"
 
  const content = document.createTextNode(`${vaccine.vaccine_name}`)
  lbl.appendChild(content)
  
 check.appendChild(div)
  div.appendChild(opt)
  div.appendChild(lbl)

}

//function recieve th id of nutrient selected in list and send it to api to get unit and send it to render function 
function sendItem(item){
  const data = JSON.stringify({ "nutrient_id": item });
 
  fetch('../api/nutrient/get_unit_by_nutrient.php', {
    method: 'POST', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    },
    //body contain the id of nutrient 
    body: data,
  }) // the response will be the unit id and name of selected nutrient 
    .then((response) => response.json())
    .then((data) => {
     console.log(data.unit_name);
     render1(data);

    })
    .catch((error) => {
      console.error('Error:', error);
    });

  
}

fetch("../api/nutrient/read.php").then((nutrients)=>{
  //console.log(nutrients);
  return nutrients.json(); //converted to object 
}).then((objectNutrient)=>{
  console.log(objectNutrient.data[0].nutrient_name);
  objectNutrient.data.forEach(nutrient => render(nutrient));
 
});





$(document).ready(
  function() {
    $('#one').change(
      function(){
        
        var item = $('option:selected',this).val() ;
        // console.log(item);
        sendItem(item);
        // $('#unit').text($('option:selected',this).text());

       
         
        });



      }
      );
  
    


// fetch("../api/unit/read.php").then((units)=>{
//   //console.log(nutrients);
//   return units.json(); //converted to object 
// }).then((objectUnit)=>{
  
//   objectUnit.data.forEach(unit => render1(unit));
 
// })
//-----------------------------------------------------------------

// function addAnother(){
//   $(function(){
//     $("#header").load("nutrient_form.php");
//   });


// }

// function direct(){

//   // window.open("new_nutrient.php");
//   window.location = "new_nutrient.php";  
//   // location.href = 'www.yoursite.com';
//   return false;
// }

$(document).ready(function(){
  $("#new_nutrient").click(function(event){
    event.preventDefault();
    window.location = "new_nutrient.php";
  });
});

//fetch vaccins data 
fetch("../api/vaccine/read.php").then((vaccines)=>{
  //console.log(vaccines);
  return vaccines.json(); //converted to object 
}).then((objectVaccine)=>{
  console.log(objectVaccine.data[0].vaccine_name);
  objectVaccine.data.forEach(vaccine => render2(vaccine));
 
});





function save(){

var nutrientId = select.value;
console.log(nutrientId);
var Amount = document.getElementById('amount').value ; 
console.log(Amount);
var markedCheckBox = document.getElementsByName('pl');
for(var checkbox of markedCheckBox){
  if(checkbox.checked){
   var  vaccineId = checkbox.value;
    console.log(vaccineId);
    sendvaccine(vaccineId);
  }
}
senddata2(nutrientId,Amount);
 



}





 function senddata2 (nutrientId,Amount){

  const data = JSON.stringify({ "nutrient_id": nutrientId, "amount":Amount });
 
  fetch('../api/nutrient_consumed/create.php', {
    method: 'POST', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    },
    //body contain the id of nutrient 
    body: data,
  }) // the response will be the unit id and name of selected nutrient 
    .then((response) => response.json())
    .then((data) => {
     console.log(data.message);
   

    })
    .catch((error) => {
      console.error('Error:', error);
    });

 }



 function sendvaccine(vaccineId){

  const data = JSON.stringify({ "vaccine_id": vaccineId});
 
  fetch('../api/day_vaccines/create.php', {
    method: 'POST', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    },
    //body contain the id of nutrient 
    body: data,
  }) // the response will be the unit id and name of selected nutrient 
    .then((response) => response.json())
    .then((data) => {
     console.log(data.message);
    

    })
    .catch((error) => {
      console.error('Error:', error);
    });

 }