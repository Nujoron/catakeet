const categorySelect =  document.getElementById("category");
const unitSelect =  document.getElementById("unit");

//function to add option element and its attributs 
function render(category) {
    const opt = document.createElement('option')
    opt.value = category.nutrient_cat_id
    const content = document.createTextNode(`${category.nutrient_cat_name}`)
    opt.appendChild(content)
    categorySelect.appendChild(opt)
  
  }


  //function to add option of unit  element and its attributs 
function render1(unit) {
    const opt = document.createElement('option')
    opt.value = unit.unit_id
    const content = document.createTextNode(`${unit.unit_name}`)
    opt.appendChild(content)
    unitSelect.appendChild(opt)
  
  }


  // fetch the nutrients to added to list 
fetch("../api/nutrient_category/read.php").then((category)=>{
    //console.log(nutrients);
    return category.json(); //converted to object 
  }).then((objectCategory)=>{
    console.log(objectCategory.data[0].nutrient_cat_name);
    objectCategory.data.forEach(category => render(category));
   
  });
  


//fetch the units to added to list 
fetch("../api/unit/read.php").then((units)=>{
  //console.log(nutrients);
  return units.json(); //converted to object 
}).then((objectUnit)=>{
  
  objectUnit.data.forEach(unit => render1(unit));
 
});


  $("#new_nutrient_form").submit(function(e) {
    e.preventDefault();
});

  function save(){
    
    var unitId = unitSelect.value;
    console.log(unitId); 
    var nutrientName = document.getElementById('nutrient_name').value;
    console.log(nutrientName);
    var nutrientCatId = categorySelect.value;
    console.log(nutrientCatId);

    sendData(nutrientCatId,nutrientName,unitId);
  }


  //function send data to api 

  function sendData(nutrientCatId,nutrientName,unitId){
var data =  JSON.stringify({ "nutrient_cat_id": nutrientCatId ,"nutrient_name": nutrientName,
"unit_id": unitId });

fetch('../api/nutrient/create.php', {
    method: 'POST', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    },
    //body contain the id of nutrient 
    body: data,
  });

  }