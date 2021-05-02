<?php

// header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

// get the size of incoming data
$content_length = (int) $_SERVER["CONTENT_LENGTH"];

// retrieve data from the request
$postdata = file_get_contents("php://input");

// Process data

// Extract json format to PHP array
$request = json_decode($postdata);

$data = [];
$data[0]['length'] = $content_length;
foreach ($request as $k => $v)
{
  $temp = "$k => $v";
  $data[0]['post_'.$k] = $v;
}
// $temp will have the last key-value pair of the array

$currect_data = date("Y-m-d");
// Send response (in json format) back to the frontend
echo json_decode(['content'=>$data, 'response_on'=>$current_date]);

?>
