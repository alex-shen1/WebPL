<!--
CS4640 POTD3 - March 6, 2021
Alex Shen (as5gd)
Jennifer Long (rz5sc)
 -->

<?php

/*** Problem #1: Simple Grids ***/
function isDiagonal($width, $tile)
{
    $row = intdiv(($tile - 1), $width);       // intdev() returns the integer quotient of the division of dividend by divisor
    $col = fmod(($tile - 1), $width);         // fmod() returns the remainder of the division

    return $row == $col;
}


function isEdge($width, $height, $tile)
{
    if ($tile <= $width) {
        return true;
    }
    if ($tile >= $height * ($width - 1)) {
        return true;
    }
    if ($tile % $width == 1) {
        return true;
    }
    if ($tile % $width == 0) {
        return true;
    }
}

echo "Problem #1: Simple Grids <br/>";
echo "---------- Output ----------<br/><br/>";

echo "-- Test isDiagonal(width, tile) function -- <br/>";
echo "isDiagonal(7, 1): you got " . isDiagonal(7, 1) . " : expected 1 <br/>";            // expected 1
echo "isDiagonal(7, 25): you got " . isDiagonal(7, 25) . " : expected 1 <br/>";          // expected 1
echo "isDiagonal(7, 41): you got " . isDiagonal(7, 41) . " : expected 1 <br/>";          // expected 1
echo "isDiagonal(7, 42): you got " . isDiagonal(7, 42) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 24): you got " . isDiagonal(7, 24) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 26): you got " . isDiagonal(7, 26) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 48): you got " . isDiagonal(7, 26) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 50): you got " . isDiagonal(7, 50) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(7, 0): you got " . isDiagonal(7, 0) . " : expected \"\" <br/>";          // expected ""

echo "<br/><br/>-- Test isDiagonal(width, tile) function -- <br/>";
echo "isDiagonal(3, 1): you got " . isDiagonal(3, 1) . " : expected 1 <br/>";          // expected 1
echo "isDiagonal(3, 2): you got " . isDiagonal(3, 2) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 3): you got " . isDiagonal(3, 3) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 4): you got " . isDiagonal(3, 4) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 5): you got " . isDiagonal(3, 5) . " : expected 1 <br/>";          // expected 1
echo "isDiagonal(3, 6): you got " . isDiagonal(3, 6) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 8): you got " . isDiagonal(3, 8) . " : expected \"\" <br/>";       // expected ""
echo "isDiagonal(3, 9): you got " . isDiagonal(3, 9) . " : expected 1 <br/>";          // expected 1

echo "<br/><br/>-- Test isEdge(width, height, tile) function -- <br/>";
echo "isEdge(7, 8, 1): you got " . isEdge(7, 8, 1) . " : expected 1 <br/>";            // expected 1
echo "isEdge(7, 8, 5): you got " . isEdge(7, 8, 5) . " : expected 1 <br/>";            // expected 1
echo "isEdge(7, 8, 43): you got " . isEdge(7, 8, 43) . " : expected 1 <br/>";          // expected 1
echo "isEdge(7, 8, 50): you got " . isEdge(7, 8, 50) . " : expected 1 <br/>";          // expected 1
echo "isEdge(7, 8, 28): you got " . isEdge(7, 8, 28) . " : expected 1 <br/>";          // expected 1
echo "isEdge(7, 8, 56): you got " . isEdge(7, 8, 56) . " : expected 1 <br/>";          // expected 1
echo "isEdge(7, 8, 13): you got " . isEdge(7, 8, 13) . " : expected \"\" <br/>";       // expected ""
echo "isEdge(7, 8, 25): you got " . isEdge(7, 8, 25) . " : expected \"\" <br/>";       // expected ""
echo "isEdge(7, 8, 44): you got " . isEdge(7, 8, 44) . " : expected \"\" <br/>";       // expected ""
echo "isEdge(7, 8, 57): you got " . isEdge(7, 8, 57) . " : expected \"\" <br/>";       // expected ""
echo "isEdge(7, 8, 0): you got " . isEdge(7, 8, 0) . " : expected \"\" <br/>";         // expected ""

echo "<br/><br/>-- Test isEdge(width, height, tile) function -- <br/>";
echo "isEdge(3, 3, 1): you got " . isEdge(3, 3, 1) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 2): you got " . isEdge(3, 3, 2) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 3): you got " . isEdge(3, 3, 3) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 4): you got " . isEdge(3, 3, 4) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 5): you got " . isEdge(3, 3, 5) . " : expected \"\" <br/>";         // expected ""
echo "isEdge(3, 3, 6): you got " . isEdge(3, 3, 6) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 8): you got " . isEdge(3, 3, 8) . " : expected 1 <br/>";            // expected 1
echo "isEdge(3, 3, 9): you got " . isEdge(3, 3, 9) . " : expected 1 <br/>";            // expected 1


function merge_books($book1, $book2)
{
    $keys1= array_keys($book1);
    $keys2 = array_keys($book2);
    $new_book = Array();
    $output = "";
    foreach ($keys1 as $key) {

        if (in_array($key, $keys2)) {
            $new_book[$key] = "{$book1[$key]}, {$book2[$key]}";
        }
        else{
            $new_book[$key] = "{$book1[$key]}";
        }
    }
    foreach ($keys2 as $key){
        if (!in_array($key, array_keys($new_book))){
            $new_book[$key] = $book2[$key];
        }
    }

    $output = "";
    foreach (array_keys($new_book) as $key){
        $output .= "{$key} : [ {$new_book[$key]} ] <br/>";
    }
    return $output;
}


/*** Problem #2: Compute Average ***/
function computeAvg($a1, $a2, $a3, $a4, $a5, $a6, $drop)
{
  // Standardize all scores
  $a1 = ($a1*100)/30; // $a1 is out of 30
  $a5 = ($a5*100)/50; // $a2 is out of 50
  // Rest are out of 100, so no need to convert

  $sum = array_sum([$a1, $a2, $a3, $a4, $a5, $a6]); // assume numeric data
  $min = min([$a1, $a2, $a3, $a4, $a5, $a6]); // lowest score for dropping

  // If drop option is true, drop lowest score
  if ($drop) {
    return ($sum-$min)/5;
  } else {
    return $sum/6;
  }
}

echo "<br/><br/><br/>";
echo "Problem #2: Compute Average <br/>";
echo "---------- Output ----------<br/><br/>";
echo "computeAvg(15, 55, 55, 55, 25, 55, true) : you got " . computeAvg(15, 55, 55, 55, 25, 55, true) . " : expected 54 <br/>";
echo "computeAvg(15, 55, 55, 55, 25, 55, false) : you got " . computeAvg(15, 55, 55, 55, 25, 55, false) . " : expected 53.33 <br/>";
echo "computeAvg(15, 55, 55, 55, 27.5, 50, true) : you got " . computeAvg(15, 55, 55, 55, 27.5, 50, true) . " : expected 54 <br/>";
echo "computeAvg(15, 55, 55, 55, 27.5, 50, false) : you got " . computeAvg(15, 55, 55, 55, 27.5, 50, false) . " : expected 53.33 <br/>";


/*** Problem #3: Combine two friend books ***/
$friend_book1 = array('Humpty' => '111-111-1111', 'Dumpty' => '222-222-2222',
    'Duh' => '333-333-3333', 'Oops' => '444-444-4444', 'Huh' => '555-555-5555');
$friend_book2 = array('Dumpty' => 'dumpty@uva.edu', 'Duh' => 'duh@uva.edu',
    'Humpty' => 'humpty@uva.edu', 'Huh' => 'huh@uva.edu',
    'Wacky' => 'wacky@uva.edu');

$result = merge_books($friend_book1, $friend_book2);
echo "<br/><br/><br/>";
echo "Problem #3: Combine two friend books <br/>";
echo "---------- Output ----------<br/><br/>";
print($result);


?>
