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

// for ($i = 0; $i < count($array); $i++) {
//     $word = strtolower($array[$i]);
//     for ($j = 0; $j < strlen($word); $j++) {
//         $char = $word[$j];
//         if ($char == "a" || $char == "e" || $char == "i" || $char == "o" || $char == "u") {
//             $count++;
//         }
//     }
// }

// echo $count;

?>