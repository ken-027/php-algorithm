<?php

// *  1. 54 number in total, write algorithm 54 number to random sequence
function RandomShuffle(int $total = 54): array
{
  $index = 1;
  $numbers = [];

  while ($index <= $total) {
    $numbers[$index - 1] = $index++;
  }

  for ($index = $total - 1; $index > 0; $index--) {
    $randomIndex = rand(0, $index);

    if ($index != $randomIndex) {
      $temp = $numbers[$index];
      $numbers[$index] = $numbers[$randomIndex];
      $numbers[$randomIndex] = $temp;
    }
  }

  return $numbers;
}

// * 2. Sum the value of array, Average the value of array
function ArraySumAndAverage(array $arr): array
{
  $totalArr = count($arr);
  $ArraySum = 0;

  while ($totalArr != 0) {
    $ArraySum += $arr[--$totalArr];
  }

  return ["Sum" => $ArraySum, "Average" => $ArraySum / count($arr)];
}

// * 3. Reverse array
function ReverseArray(array $arr): array
{
  $totalArr = count($arr);
  $sequenceIndex = 0;
  $reversedArr = [];

  while ($totalArr != 0) {
    $reversedArr[$sequenceIndex++] = $arr[--$totalArr];
  }

  return $reversedArr;
}

// * 4. {A, 30(weight)}, {B, 40(weight)},{C,20(weight)},{D,10(weight)}, random a number(20), output A, random a number(80), output C
function RandomNumber(int $randomNum): string
{
  $matchIndex = "A";
  $totalWeight = 0;
  $weights = [
    "A" => 30,
    "B" => 40,
    "C" => 20,
    "D" => 10,
  ];

  foreach ($weights  as $key => $weight) {
    $totalWeight += $weight;
    if ($randomNum - $totalWeight <= 0) {
      $matchIndex = $key;
      break;
    }
  }

  return $weights[$matchIndex] * $randomNum;
}

// * 5. Binary search using recursion
function BinarySearch(array $arr, $target): int
{
  $totalArr = count($arr);

  if ($totalArr === 0) {
    return -1;
  }

  $mid = floor($totalArr / 2);

  if ($arr[$mid] === $target) {
    return $mid;
  } elseif ($arr[$mid] > $target) {
    return BinarySearch(array_slice($arr, 0, $mid), $target);
  } else {
    $result = BinarySearch(array_slice($arr, $mid + 1), $target);
    return ($result === -1) ? -1 : ($mid + 1 + $result);
  }
}

// * 6. Given two binary strings a and b , return their sum as a binary string.
function BinaryAdd(string $a, string $b): string
{
  $startIndex = strlen($a);
  $result = '';
  $carry = 0;

  while ($startIndex != 0) {
    $index = --$startIndex;
    $sum = (int)$a[$index] + (int)$b[$index] + $carry;

    if ($sum > 1 && $startIndex > 0) {
      $result .= $sum == 3 ? (string)1 : (string)0;
      $carry = 1;
    } else {
      if ($sum > 1) {
        $result .= $sum == 3 ? '11' : '01';
      } else {
        $result .= (string)$sum;
      }
      $carry = 0;
    }
  }

  $strLength = strlen($result);
  $reversedString = '';

  while ($strLength != 0) {
    $reversedString .= $result[--$strLength];
  }

  return $reversedString;
}

// * 7. Use function recursion to find the factorial of 100
function Factorial(int $number)
{
  if ($number <= 1) {
    return 1;
  } else {
    return $number * Factorial($number - 1);
  }
}

// * 8. Merge two sorted arrays
function SortMergeArrays(array $firstArr, array $secondArr): array
{
  $totalFirst = count($firstArr);
  $totalSecond = count($secondArr);

  $arraySort = function (array &$arr) {
    $totalArr = count($arr);

    for ($startIndex = 0; $startIndex < count($arr); $startIndex++) {
      for ($secondIndex = $startIndex + 1; $secondIndex < count($arr); $secondIndex++) {
        if ($arr[$startIndex] > $arr[$secondIndex]) {
          $temp = $arr[$startIndex];
          $arr[$startIndex] = $arr[$secondIndex];
          $arr[$secondIndex] = $temp;
        }
      }
    }
  };

  $arraySort($firstArr);
  $arraySort($secondArr);

  for ($start = 0; $start < $totalSecond; $start++) {
    $firstArr[$totalFirst++] = $secondArr[$start];
  }

  return $firstArr;
}

echo '1. 54 number in total, write algorithm 54 number to random sequence';
echo PHP_EOL;
print_r(RandomShuffle());
echo PHP_EOL;
echo PHP_EOL;

echo '2. Sum the value of array, Average the value of array';
echo PHP_EOL;
print_r(ArraySumAndAverage(arr: [3, 5, 10, 5]));
echo PHP_EOL;
echo PHP_EOL;

echo '3. Reverse array';
echo PHP_EOL;
print_r(ReverseArray(arr: [0, 23, 5, 5]));
echo PHP_EOL;
echo PHP_EOL;

echo '4. {A, 30(weight)}, {B, 40(weight)},{C,20(weight)},{D,10(weight)}, random a number(20), output A, random a number(80), output C';
echo PHP_EOL;
echo RandomNumber(randomNum: rand(0, 100));
echo PHP_EOL;
echo PHP_EOL;

echo '5. Binary search using recursion';
echo PHP_EOL;
echo BinarySearch(arr: [2, 5, 7, 8, 9, 10, 7], target: 8);
echo PHP_EOL;
echo PHP_EOL;

echo '6. Given two binary strings a and b , return their sum as a binary string.';
echo PHP_EOL;
echo BinaryAdd(a: '1010', b: '1011');
echo PHP_EOL;
echo PHP_EOL;

echo '7. Use function recursion to find the factorial of 100';
echo PHP_EOL;
echo Factorial(number: 100);
echo PHP_EOL;
echo PHP_EOL;

echo '8. Merge two sorted arrays';
echo PHP_EOL;
print_r(SortMergeArrays(firstArr: [2, 4, 5, 1, 0], secondArr: [4, 6, 7, 23, 5]));
