<?php

// * 1. Given an integer array nums , please find out the continue subarray with the largest 
// * sum (the subarray contains at least one element), return the largest sum subarray
// * and its largest sum.
function LargestSubarraySum(array $arr): array
{
  $totalArr = count($arr);
  $largestArrSequence = [];
  $largestIndex = ["start" => 0, "end" => $totalArr - 1];
  $maxNumHolder = 0;

  for ($rowIndex = 0; $rowIndex < $totalArr; $rowIndex++) {
    $rowSumHolder = 0;
    for ($colIndex = $rowIndex; $colIndex < $totalArr; $colIndex++) {
      $rowSumHolder += $arr[$colIndex];
      if ($maxNumHolder < $rowSumHolder) {
        $maxNumHolder = $rowSumHolder;
        $largestIndex["start"] = $rowIndex;
        $largestIndex["end"] = $colIndex;
      }
    }
  }

  for ($index = $largestIndex["start"]; $index <= $largestIndex["end"]; $index++) {
    $largestArrSequence[] = $arr[$index];
  }

  return ["contiguousArray" => $largestArrSequence, "sum" => $maxNumHolder];
}

// * 2. Given an integer array nums, return the longest strictly
function LongestIncreasingSubSequence(array $arr): array
{
  $totalArr = count($arr);
  $longestSequence = $subsequences = $multipleSubSequences = [];
  $indexRow = 0;

  for ($rowIndex = 0; $rowIndex < $totalArr; $rowIndex++) {
    $rowSeqStart = 0;
    $rowSequence = [];
    for ($colIndex = $rowIndex; $colIndex < $totalArr; $colIndex++) {
      if ($rowSeqStart < $arr[$colIndex]) {
        $rowSeqStart = $arr[$colIndex];
        $rowSequence[] = $colIndex;
      }
    }
    if (count($longestSequence) <= count($rowSequence)) {
      $longestSequence = $rowSequence;
      $subsequences[] = $rowSequence;
    }
  }

  foreach ($subsequences as $row) {
    if (count($longestSequence) <= count($row)) {
      foreach ($row as $key => $index) {
        $multipleSubSequences[$indexRow][] = $arr[$index];
      }
      $indexRow++;
    }
  }

  return ["subsequences" => $multipleSubSequences, "LIS" => count($longestSequence)];
}

echo '1. Given an integer array nums , please find out the continue subarray with the largest sum (the subarray contains at least one element), return the largest sum subarray and its largest sum';
echo PHP_EOL;
$arr = [-2, -3, 4, -1, -2, 1, 5, -3];
// $arr = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
echo json_encode($arr);
echo PHP_EOL;
echo json_encode(LargestSubarraySum(arr: $arr));

echo PHP_EOL . PHP_EOL;

echo '2. Given an integer array nums, return the longest strictly';
echo PHP_EOL;
$arr = [10, 22, 9, 33, 21, 50, 41, 60, 80];
// $arr = [3, 10, 2, 1, 20];
echo json_encode($arr);
echo PHP_EOL;
echo json_encode(LongestIncreasingSubSequence(arr: $arr));
