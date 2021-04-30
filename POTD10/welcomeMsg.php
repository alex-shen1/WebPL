<?php

//  Gets the form data and prints it to screen

$strSoFar = isset($_GET['StringSoFar']) ? $_GET['StringSoFar'] : "ERROR";

$new_str = strtoupper($strSoFar);
echo "$new_str";





?>