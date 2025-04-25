<?php
// 1. Print all even numbers from an array
// $array = [11, 22, 35, 42, 59, 68];
// for($i = 0; $i < count($array); $i++){
//     if($array[$i] % 2 == 0){
//         echo $array[$i] . "<br>";
//     }
// }

// 2. Print total number of characters in each city name

// $array = ["Khulna", "Dhaka", "Chattogram"];

// for($i = 0; $i < count($array); $i++){
//     echo $array[$i] . " : " . strlen($array[$i]) . "<br>";
// }

// 3. Print students who passed (marks >= 33)
// $students = [
//     "Jamal" => 45,
//     "Rina" => 22,
//     "Suman" => 60,
//     "Asha" => 29
//   ];

// foreach($students as $key => $value){
//     if(33 <= $value){
//         echo $key . " : Passed <br> " ;
//     }
// }

// 4. Print country names in UPPERCASE
// $array = ["Bangladesh", "India", "Nepal"];

// for($i = 0; $i < count($array); $i++){
//     echo strtoupper($array[$i]) . "<br>";
// }

// 5. Print sum of all ages

// $array =  [21, 33, 45, 18, 27];
// $sum = 0;

// for($i = 0; $i < count($array); $i++){
//     $sum += $array[$i];  
// }
// echo "Total : " . $sum;


// 6. Print only names of students who scored above 80

// $marks = [
//     "Nina"=>76, 
//     "Sumon"=>88, 
//     "Rafi"=>92, 
//     "Lina"=>65
// ];

// foreach($marks as $key => $value){
//     if(80 <= $value){
//         echo $key . "<br>";
//     }
// }

// 7. Count how many numbers are divisible by 5

// $array = [10, 15, 18, 20, 33, 40];
// $count = 0;

// for($i = 0; $i <pre count($array); $i++){
//     if($array[$i] % 5 == 0){
//         $count++;
//     }
// }

// echo "Count : " . $count;

// 8. Reverse an array using a loop

// $array = [10, 20, 30, 40, 50];

// for($i = count($array) - 1; $i >= 0; $i--){
//     echo $array[$i] . "<br>";
// }


// 9. Print persons older than 30

// $persons = [
//     [
//         "name"=>"Jamal", 
//         "age"=>29
//     ],
//     [
//         "name"=>"Tina", 
//         "age"=>33
//     ],
//     [
//         "name"=>"Robin", 
//         "age"=>41
//     ]
//   ];
  
// foreach($persons as $person){
//     if($person["age"] > 30){
//         echo $person["name"] . "<br>";
//     }
// }

// 10. Count total vowels in all city names

// $array = ["Dhaka", "Rajshahi", "Barisal"];
// $count = 0;

// for($i = 0; $i < count($array); $i++){
//     $word = strtolower($array[$i]);
//     for($j = 0; $j < strlen($word); $j++){
//         $letter = $word[$j];
//         if($letter == 'a' || $letter == 'e' || $letter == 'i' || $letter == 'o' || $letter == 'u'){
//             $count++;
//         }
//     }
// }

// echo $count;


// 11. Print only odd numbers and their square
// $array = [3, 6, 7, 10, 13];

// for($i = 0; $i < count($array); $i++){
//     if($array[$i] % 2 !== 0){
//         $num = $array[$i];
//         echo $num . " : " . ($num ** 2) . "<br>";
//     }
// }

// 12. Show each student’s name with length of name

// $array = ["Hasan", "Tania", "Rifat"];

// for($i = 0; $i < count($array); $i++){
//     $nameLength = strlen($array[$i]);
//     echo $array[$i] . " : " . $nameLength . "<br>";
// }


// 13. Print each letter of every name

// $array = ["Ali", "Sara"];
// for($i = 0; $i < count($array); $i++){
//     $character = str_split($array[$i]);
//     for($j = 0; $j < count($character); $j++){
//         echo "<pre>";
//         print_r($character[$j]);
//         echo "</pre>";
//     }
// }

// 14. Print first letters of each word in array

// $array = ["Green", "Red", "Yellow"];

// for($i = 0; $i < count($array); $i++){
//     $name = str_split($array[$i]);
//     echo "<pre>";
//     print_r( $name[0]);
//     echo "</pre>";
// }

// 15. Check if a name exists in an array 

// $array = ["Sabbir", "Mahi", "Rifat"];

// for($i = 0; $i < count($array); $i++){
//     if($array[$i] == "Mahi"){
//         echo "Found";
//     }
// }






?>