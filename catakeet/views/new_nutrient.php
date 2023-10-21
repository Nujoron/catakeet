<?php include_once'layout/header.php'  ?>



<div class="container">
        <form id="new_nutrient_form" method="POST">
       <h4> Select the Category  </h4>

       <div class="row">
       <div class="col-sm-2">    
        <div class="select-box" >
          <div class="options-container"  >
            <select class="option btn btn-primary dropdown-toggle" id="category">
              <!-- <option value=""><a href="new_nutrient.php"> add another</a> </option> -->
              
            </select>
          </div>
</div>
</div>

<div class="col-sm-4">
<div>
<input type="text" name="nutrient_name" id = "nutrient_name" class="form-control" placeholder="nutrient name ">
</div>
 </div>

 
<div class="col-sm-4">
<div>

<!-- option unit list  -->
<div class="select-box" >
          <div class="options-container"  >
            <select class="option btn btn-primary dropdown-toggle" id="unit">
              <!-- <option value=""><a href="new_nutrient.php"> add another</a> </option> -->
              
            </select>
          </div>
</div>
</div>
 </div>

 
<div class="col-sm-4">

<label id="unit" class="text">  </label>

 </div>
</div>
       <div class="row">
        <div  class="col-sm-9"></div>
        <div class="col-sm-2" >
       <button class="btn btn-primary" onclick="save()" > save</button>
      </div><!-- fof the col  -->
      </div><!-- fof the row  -->
       
    
        </form>
</div>  


<script src="javascript/nutrient.js"></script>

<?php include_once'layout/footer.php'  ?>