<?php

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

echo "computeAvg(15, 55, 55, 55, 25, 55, true) : you got " . computeAvg(15, 55, 55, 55, 25, 55, true) . " : expected 54 <br/>";
echo "computeAvg(15, 55, 55, 55, 25, 55, false) : you got " . computeAvg(15, 55, 55, 55, 25, 55, false) . " : expected 53.33 <br/>";
echo "computeAvg(15, 55, 55, 55, 27.5, 50, true) : you got " . computeAvg(15, 55, 55, 55, 27.5, 50, true) . " : expected 54 <br/>";
echo "computeAvg(15, 55, 55, 55, 27.5, 50, false) : you got " . computeAvg(15, 55, 55, 55, 27.5, 50, false) . " : expected 53.33 <br/>";
?>
