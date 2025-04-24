<?php

// ✅ Array
// An array stores multiple values in one single variable.

// 2 Formats:
// $arr = array(1,2,3); or $arr = [1,2,3]



// ✅ Types of Array
// Indexed Array - Arrays with a numeric index
// Associative Array - Arrays with named keys
// Multidimensional Array - Arrays containing one or more arrays




// ✅ Indexed Array

// 👉 Example - numeric
//$arr = [12, 44, 55, 19, 34, 89];
//echo $arr[0]; // 12
//echo $arr[1]; // 44

// 👉 Example - string
//$cities = ["Khulna", "Dhaka", "Rajshahi"];
//echo $cities[0]; // Khulna
//echo $cities[1]; // Dhaka

// 👉 Example - numeric elements - for loop
//$arr = [12, 44, 55, 19, 34, 89];
//for($i=0;$i<count($arr);$i++) {
//    echo $arr[$i];
//}

// 👉 Example - numeric elements - foreach loop
//$arr = [12, 44, 55, 19, 34, 89];
//foreach($arr as $val) {
//    echo $val;
//}

// 👉 Example - string elements - for loop
//$cities = ["Khulna", "Dhaka", "Rajshahi"];
//for($i=0;$i<count($cities);$i++) {
//    echo $cities[$i];
//}

// 👉 Example - string elements - foreach loop
//$cities = ["Khulna", "Dhaka", "Rajshahi"];
//foreach($cities as $val) {
//    echo $val;
//}



// ✅ Associative Array

// 👉 Example - normal
//$persons = [
//    "name" => "Smith",
//    "age" => 30
//];
//echo $persons["name"]; // Smith
//echo $persons["age"]; // 30

// 👉 Example - foreach loop
//$persons = [
//    "name" => "Smith",
//    "age" => 30
//];
//foreach ($persons as $key => $value) {
//    echo "$key: $value\n";
//}



// ✅ Multidimensional Array

// 👉 Example - no loop
//$persons = [
//    ["Smith",30],
//    ["Robin",20],
//    ["Peter",25]
//];
//echo $persons[0][0];
//echo $persons[0][1];
//echo $persons[1][0];
//echo $persons[1][1];
//echo $persons[2][0];
//echo $persons[2][1];

// 👉 Example - for loop
//$persons = [
//    ["Smith",30],
//    ["Robin",20],
//    ["Peter",25]
//];
//for($i=0;$i<count($persons);$i++) {
//    for($j=0;$j<count($persons[$i]);$j++) {
//        echo $persons[$i][$j];
//    }
//}

// 👉 Example - foreach loop
//$persons = [
//    ["Smith",30],
//    ["Robin",20],
//    ["Peter",25]
//];
//foreach($persons as $person) {
//    foreach ($person as $val) {
//        echo $val;
//    }
//}

// 👉 Example - parent is indexed, child is associative
//$persons = [
//    [
//        "name" => "Smith",
//        "age" => 30
//    ],
//    [
//        "name" => "Robin",
//        "age" => 20
//    ],
//    [
//        "name" => "Peter",
//        "age" => 25
//    ]
//];
//foreach($persons as $person) {
//    foreach($person as $key => $value) {
//        echo "$key: $value";
//    }
//}

// 👉 Example - parent and child both are associative
//$persons = [
//    "person1" => [
//        "name" => "Smith",
//        "age" => 30
//    ],
//    "person2" => [
//        "name" => "Robin",
//        "age" => 20
//    ],
//    "person3" => [
//        "name" => "Peter",
//        "age" => 25
//    ]
//];
//foreach($persons as $personKey=>$personVal) {
//    echo $personKey;
//    foreach($personVal as $key => $value) {
//        echo "$key: $value";
//    }
//}




// ✅ Array Function
// Reference: https://www.php.net/manual/en/ref.array.php



// 👉 Example - Common Functions

//$arr = [12, 33, 55, 24, 67];
//echo count($arr); // 5

//$arr = [12, 33, 55, 24, 67];
//var_dump($arr);

//$arr = [12, 33, 55, 24, 67];
//print_r($arr);

//$arr = [12, 33, 55, 24, 67];
//var_dump(in_array(55,$arr)); // bool(true)

//$arr = [33, 12, 55, 89, 24, 67];
//echo max($arr); // 89

//$arr = [33, 12, 55, 89, 24, 67];
//echo min($arr); // 12



// 👉 Example - Get Unique Values - Key not properly indexing
//$arr = [33, 12, 55, 33, 89, 12, 24, 33, 22, 55, 67];
//print_r(array_unique($arr));
// Output:
//Array
//(
//    [0] => 33
//    [1] => 12
//    [2] => 55
//    [4] => 89
//    [6] => 24
//    [8] => 22
//    [10] => 67
//)


// 👉 Example - Get Unique Values - Key properly indexing
//$arr = [33, 12, 55, 33, 89, 12, 24, 33, 22, 55, 67];
//print_r(array_values(array_unique($arr)));
// Output:
//Array
//(
//    [0] => 33
//    [1] => 12
//    [2] => 55
//    [3] => 89
//    [4] => 24
//    [5] => 22
//    [6] => 67
//)


// 👉 Example - String to Array - explode()
//$date = "2023-04-25";
//print_r(explode("-",$date));
// Output:
//Array
//(
//    [0] => 2023
//    [1] => 04
//    [2] => 25
//)


// 👉 Example - Array to String - implode()
//$cities = ["Khulna", "Dhaka", "Sylhet"];
//echo implode("-",$cities); // Khulna-Dhaka-Sylhet


// 👉 Example - sort() - Indexed array - Normal Sort (small to large)
//$arr = [33, 12, 55, 89, 24, 67];
//sort($arr);
//print_r($arr);
// Output:
//Array
//(
//    [0] => 12
//    [1] => 24
//    [2] => 33
//    [3] => 55
//    [4] => 67
//    [5] => 89
//)


// 👉 Example - rsort() - Indexed array - Reverse Sort (large to small)
//$arr = [33, 12, 55, 89, 24, 67];
//rsort($arr);
//print_r($arr);
// Output:
//Array
//(
//    [0] => 89
//    [1] => 67
//    [2] => 55
//    [3] => 33
//    [4] => 24
//    [5] => 12
//)


// 👉 Example - asort() - Associative Array - Normal Sort (small to large) - According to the value
//$marks = [
//    "Cooper" => 64,
//    "Adam" => 80,
//    "Bent" => 45
//];
//asort($marks);
//print_r($marks);
// Output:
//Array
//(
//    [Bent] => 45
//    [Cooper] => 64
//    [Adam] => 80
//)


// 👉 Example - ksort() - Associative Array - Normal Sort (small to large) - According to the key
//$marks = [
//    "Cooper" => 64,
//    "Adam" => 80,
//    "Bent" => 45
//];
//ksort($marks);
//print_r($marks);
// Output:
//Array
//(
//    [Adam] => 80
//    [Bent] => 45
//    [Cooper] => 64
//)


// 👉 Example - arsort() - Associative Array - Reverse Sort (large to small) - According to the value
//$marks = [
//    "Cooper" => 64,
//    "Adam" => 80,
//    "Bent" => 45
//];
//arsort($marks);
//print_r($marks);
// Output:
//Array
//(
//    [Adam] => 80
//    [Cooper] => 64
//    [Bent] => 45
//)


// 👉 Example - krsort() - Associative Array - Reverse Sort (large to small) - According to the key
//$marks = [
//    "Cooper" => 64,
//    "Adam" => 80,
//    "Bent" => 45
//];
//krsort($marks);
//print_r($marks);
// Output:
//Array
//(
//    [Cooper] => 64
//    [Bent] => 45
//    [Adam] => 80
//)