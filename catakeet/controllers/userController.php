<?php
include_once'../../models/user.php';
include_once'../../models/poultry_house.php';


$ph = new PoultryHouse($db);
$ph->phId = $user->phId ;

$ph->userId = $user->nameById();

$ph->create();


?>