const select = document.querySelector('.option')

//function to add option element and its attributs 
function render(species) {
    const opt = document.createElement('option')
    opt.value = species.species_id
    const content = document.createTextNode(`${species.species_name}`)
    opt.appendChild(content)
    select.appendChild(opt)
  
  }
  

  // fetch species to add to list 
fetch("../api/poultries_species/read.php").then((species)=>{
    //console.log(nutrients);
    return species.json(); //converted to object 
  }).then((objectSpecies)=>{
    console.log(objectSpecies.data[0].species_name);
    objectSpecies.data.forEach(species => render(species));
   
  });


  // send data after save 

  
    
 function sendspecies (speciesId,count){

  const data = JSON.stringify({ "species_id": speciesId, "species_count":count });
 
  fetch('../api/cycle_species/create.php', {
    method: 'POST', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    },
   
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


function save(){

    var speciesId = select.value;
   
    var count = document.getElementById('count').value ; 
    

    sendspecies(speciesId,count);
    
    }



    // redirection to day btn 
    
$(document).ready(function(){
  $("#new_day").click(function(event){
    event.preventDefault();
    window.location = "new_day.php";
  });
});