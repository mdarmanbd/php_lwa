<?php
// Serialize
// $student_information = [
//     'first_name' => 'Smith',
//     'last_name' => 'Cooper',
//     'class' => 9,
//     'age' => 35
// ];
// $final = serialize($student_information);
// echo $final;


// // Unserialize
// $final_arr = unserialize($final);
// echo '<pre>';
// print_r($final_arr);
// echo '</pre>';
// echo $final_arr['first_name'];


// JSON Encode

// $student_information = [
//     'first_name' => 'Smith',
//     'last_name' => 'Cooper',
//     'class' => 9,
//     'age' => 35
// ];

// $jsonData = json_encode($student_information);

// echo "<pre>";
// echo ($jsonData);
// echo "</pre>";

// $jsonDecode = json_decode($jsonData, true);

// echo "<pre>";
// print_r(($jsonDecode));
// echo "</pre>";


// $student_information = [
//     'first_name' => 'Smith',
//     'last_name' => 'Cooper',
//     'class' => 9,
//     'age' => 35
// ];


//  unset($student_information['last_name']); // remove the last name;
//  echo "<pre>";
//  print_r($student_information);
//  echo "</pre>";


// array_walk

// $numbers = [1,2,3,4,5];
// array_walk($numbers, function($n){
//     $newNumber = $n*$n;
//     echo $n . " : " . $newNumber . "<br>";
// });

// $number = [1,2,3,4,5];

// $newNumber = array_map(function($n){
//     return $n*2;
// },$number);

// echo "<pre>";
// print_r($newNumber);
// echo "</pre>";

// $number = [1,2,3,4];

// $newNumber = array_filter($number, function($n){
//     print_r($n);
//     if($n % 2 == 0){
//         return $n;
//     }
// });

// echo "<pre>";
// print_r( array_values($newNumber) );
// echo "</pre>";

// $students = ['Abir', 'Sohan', 'Sohag', 'Rubel', 'Sagir', 'Jaber', 'Xubi'];

// $newStudents = array_filter($students, function($name){
    
//     // if($name[0] == "S"){
//     //     echo ($name) . "<br>";
//     // }
    
//     if(strlen($name) == 4){
//         return $name;
//     }

// });

// echo "<pre>";
// print_r(array_values( $newStudents ));
// echo "</pre>";

$numbers = [100,20,300,14,850];

// $newNumber = array_reduce($numbers, function($new,$old){
//     return $new + $old;
// });
// echo $newNumber;


// $newNumber = array_reduce($numbers, function($new,$old){
//     if($new > $old){
//         $max = $new;
//     }else{
//         $max = $old;
//     }
//     return $max;

    
// });
// echo $newNumber;

// $numbers = [100,20,300,14,850];

// $newNumber = array_reduce($numbers, function($new,$old){
//     if($new > $old){
//        return $old;
//     }else{
//         return $new;
//     }
    
// });

// echo $newNumber;

// function payramid($number){
//     for($i = 1; $i<=$number; $i++){
//         for($j = 1; $j<=$i; $j++){
//             echo $j . " ";
//         }
//         echo "<br>";
//     }

// }

// payramid(7);




?>
