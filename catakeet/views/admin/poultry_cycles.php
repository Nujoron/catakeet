<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   
    <title>admin-dashboard</title>

</head>
<body>
    

<header class="back">
    <div>
    <img class="logo" src="../img/logo.png" alt="" > </div>
<h1 >Admin dashboard</h1>
<h5>poultry house cycles </h5>
</header>

<main>

<div class="container">
    <h4  style=" display:inline "> poultry no:</h4>
    <h4 id = "no" style=" display:inline "></h4>
    <br>
    <h4 style=" display:inline" >for the user:</h4>
    <h4 id = "user_name" style=" display:inline"> </h4>
    <br>
    <h4 style=" display:inline" >total cycles: </h4>
    <h4 id = "count" style=" display:inline"> </h4>
<table class="table" id="tb">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">cycle id </th>
      <th scope="col">neutrient category</th>
      <th scope="col">neutrient type</th>
      <th scope="col">total amount</th>
      <th scope="col">poultry type</th>
      <th scope="col">deaths</th>
    </tr>
  </thead>
  <tbody id="body">
    <!-- <tr>
      <th scope="row">1</th> 
      <td>1</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr> -->
    </tbody>
</table>


</main>
<script src="../javascript/ph_cycles.js"> </script>
<footer class="footer">
copy rights nouran saleh -nujoron hanso-  2022
</footer>
</body>
</html> 
