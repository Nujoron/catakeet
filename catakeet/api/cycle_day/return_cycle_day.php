<?php
session_start();

$cycle_day =  $_SESSION['cycle_day'];

echo json_encode(
    array('cycle_day'=>$cycle_day));