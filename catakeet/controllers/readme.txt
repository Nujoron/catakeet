work flow :
  
  you can try the username nujoron and pass 123456 

  for the admin user name admin and pass admin 



  
  controller will interact with the model  
 view will interact with the controller by api


 for, the first page 
{
  "user_name"
  "passwpord"  
}
check for it if true and if admin 
if admin 

page(the page contain regestration form and table of users and its ph under it )->create user
 {
  
  "user_name"
  "password"
  "ph_id "

 }

controller  -> check if the ph already exist *need for read single ph api *
 fun ->api create of the user  () 
 fun -> featch the last user id from users table  
 send the user_id to create ph 
 fun-> create ph 
 page -> reset the field and add user to table 



delete and update of users will be from table buttons 
------------------------------------------------------------------------------

create new cycle 

registration 
{
  "user_name"
  "passwrd"
}
controller -> check if the username and pass correct and isnt an admin 

correct 
check if there is no running cycle 
get ph_id by the user_id 
fun->create cycle 
page -> new cycle 
if need to add new species -> create species ->*mybe in separated page *
new cycle data 
{
  "cycle species " : 
 "[
   {"species name":""
   "count":""},
    {"species name":""
   "count":""})



 ]"
 
}

featch the last cycle id for this ph_id or this user 
-> data of species of cycle to cycle species table 

featch the last cycle id for this 



create cycle day by the cycle id and day_id 1 

page-> new day  
featch the vaccins from db      for display in list 
fetch the neutrient 
*create new vaccine * ->  if not exist in list by dotted field 
*create new nutrient if not exist * 
if new vaccine created -> create vaccine -> store vaccine in day vaccine table 

if new neutrient -> if new category -> create category -> if new neutrient -> create neutrient 


...............................................................................................