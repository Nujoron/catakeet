// fetch("../api/nutrient/read.php").then((nutrients)=>{
//     //console.log(nutrients);
//     return nutrients.json(); //converted to object 
//   }).then((objectNutrient)=>{
//     console.log(objectNutrient.data[0].nutrient_name);
//     objectNutrient.data.forEach(nutrient => render(nutrient));
   
//   });


//   function render1(unit) {
//     const unitlabel = document.getElementById("unit");
  
  
//     unitlabel.innerHTML=""
//     const content1 = document.createTextNode(`${unit.unit_name}`)
//     unitlabel.appendChild(content1)
  
//   }




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

  