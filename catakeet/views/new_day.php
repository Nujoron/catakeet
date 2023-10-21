<?php // the page should recieve the day data : 
// amount of each nutrient category , vaccines that given   ?>

<?php include_once'layout/header.php'; ?>


<div class="container">
        <form action="#" method="POST">
       <h4> select the nutrient that given a day and write the amount  </h4>

       <div class="row">
       <div class="col-sm-2">    
        <div class="select-box" >
          <div class="options-container"  >
            <select class="option btn btn-primary dropdown-toggle" id="one">
              <!-- <option value=""><a href="new_nutrient.php"> add another</a> </option> -->
              
            </select>
          </div>
</div>
</div>

<div class="col-sm-4">
<div>
<input type="text" name="amount" id = "amount" class="form-control">

</div>
 </div>

 
<div class="col-sm-4">

<label id="unit" class="text">  </label>
<!-- 
<div class="select-box" >
          <div class="options-container"  >
            <select class="option btn btn-primary dropdown-toggle" id="tow">
              < <option value="">Select a nutrient. </option>
              
            </select>
          </div>
</div> -->

<!-- // vaccine as checked box n -->

 </div>
</div>

       <div class="row">
        <div  class="col-sm-9"></div>
        <div class="col-sm-2" >
       <button class="btn btn-primary" onclick="save()" > add another </button>
      </div><!-- fof the col  -->
      </div><!-- fof the row  -->

      <!-- -------------------------------------------------------------------------------- -->


      
      <div class="row">
        <div  class="col-sm-9"></div>
        <div class="col-sm-2" >
        <button  id="new_nutrient" class="btn btn-secondry" >another nutrient</button>
      </div><!-- fof the col  -->
      </div><!-- fof the row  -->
      <h4>vaccines: </h4>
   <div class="row">
   <div class="col-sm-4"> 
   <div class="row form-check" id="form_check">
   

  <!-- <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" checked>
  <label class="form-check-label">Option 1</label> -->

</div>


   </div><!-- fof the col -->
   </div> <!-- fof the row  -->
        </form>
</div>  
<script src="javascript/day.js"></script>
<?php include_once'layout/footer.php'; ?>