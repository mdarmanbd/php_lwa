<?php
//$aa = array();
//$aa = [];
// $aa[0] = 10;
// $aa[1] = 20;
// $aa[2] = 30;

//$aa = [10,20,30];
// echo $aa[0];


// $person_name = "Arefin";

// $str = '
// Hi '.$person_name.',<br>
// I hope you are well. I want to communicate you. <br>
// Are you free, today?<br>
// Thanks!
// ';


// $i++;
// $i += 1;
// $i = $i + 1;

// $i += 5;
// $i = $i + 5;

// $str = 'My country name is: ';
// $str .= 'Bangladesh';
// echo $str;



// $str = '';

// $str .= 'Hi '.$person_name.',<br>';
// $str .= 'I hope you are well. I want to communicate you. <br>';
// $str .= 'Are you free, today?<br>';
// $str .= 'Thanks!';
// echo $str;

// $aa = [];

// Indexed Array
// Associative Array
// Multidimensional Array

// $math = [28, 10, 0, 12, 25];
//echo $math[4];

// $city = ['khulna', 'dhaka', 'chittagong'];
// echo $city[2];

// $person = ['Smith',50,'USA'];
// echo 'Person name is: '.$person[0].'<br>';
// echo 'His age: '.$person[1].'<br>';
// echo 'He lives in: '.$person[2];

// $math = [28, 10, 0, 12, 25, 56, 44, 33, 89, 42];
// echo 'Student 1 get 28 marks in math';
// echo 'Student 2 get 10 marks in math';
// echo 'Student 3 get 0 marks in math';
//echo count($math);

// for($i=0;$i<count($math);$i++) {
//     echo 'Student '.($i+1).' get '.$math[$i].' marks in math<br>';
// }

// $i=0;
// foreach($math as $val) {
//     echo 'Student '.++$i.' get '.$val.' marks in math<br>';
// }



// Associative Array
// Key => value
// $person = [
//     'name' => 'Smith',
//     'age' => 50,
//     'USA',
//     'city' => 'NYC',
//     '81277'
// ];
// echo $person['name'].'<br>';
// echo $person['age'].'<br>';
// echo $person[0].'<br>';
// echo '<pre>';
// print_r($person);
// echo '</pre>';


// $person = [
//     'name' => 'Smith',
//     'age' => 50,
//     'country' => 'USA',
// ];
// foreach($person as $key=>$val) {
//     echo ucwords($key).' is : '.$val.' <br>';
// }




// Multidimensional Array
// $persons = [
//     ['Smith', 30],
//     ['David', 40],
//     ['John', 25],
// ];
// echo $persons[2][0];

// $persons = [
//     ['Smith', 30],
//     ['David', 40],
//     ['John', 25],
// ];

// echo '<pre>';
// print_r($persons);
// echo '</pre>';

// for($i=0;$i<count($persons);$i++) {
//     for($j=0;$j<count($persons[$i]);$j++) {
//         echo $persons[$i][$j] . ' ';
//     }
//     echo '<br>';
// }

// foreach($persons as $person) {
//     foreach($person as $val) {
//         echo $val.' ';
//     }
//     echo '<br>';
// }


// $persons = [
//     'person1' => [
//         'name' => 'Smith',
//         'age' => 30
//     ],
//     'person2' => [
//         'name' => 'David', 
//         'age' => 40
//     ],
//     'person3' => [
//         'name' => 'John', 
//         'age' => 25
//     ],
// ];
// foreach($persons as $personKey => $personValue) {
//     echo $personKey.'<br>';
//     foreach($personValue as $key => $value) {
//         echo $key.' is '.$value.'<br>';
//     }
//     echo '<br>';
// }


// $arr = [12, 45, 6, 89, 33];
// echo max($arr);
// Sorting
// bubble sort
// merge sort

// swap
// $a = 10;
// $b = 30;
// $temp = $a;
// $a = $b;
// $b = $temp;
// echo $b;


// $arr = [12, 89, 45, 6, 89, 33, 23, 45, 56, 70, 45, 90, 70];
// echo '<pre>';
// print_r(array_unique($arr));
// echo '</pre>';
// echo '<pre>';
// print_r(array_values(array_unique($arr)));
// echo '</pre>';


// $birth_date = "2020-04-12";
// $result = explode('-',$birth_date);
// echo '<pre>';
// print_r($result);
// echo '</pre>';
// echo $result[1];

// $arr = ['khulna', 'dhaka', 'barishal'];
// $final = implode(',',$arr);
// echo $final;

// $arr = [12, 89, 45, 6, 33];
// sort($arr);
// echo '<pre>';
// print_r($arr);
// echo '</pre>';

// $arr = [12, 89, 45, 6, 33];
// rsort($arr);
// echo '<pre>';
// print_r($arr);
// echo '</pre>';


// $arr = [
//     'Smith' => 30,
//     'David' => 50,
//     'Patrick' => 23
// ];
// asort($arr);
// echo '<pre>';
// print_r($arr);
// echo '</pre>';


// $arr = [
//     'Smith' => 30,
//     'David' => 50,
//     'Patrick' => 23
// ];
// ksort($arr);
// echo '<pre>';
// print_r($arr);
// echo '</pre>';

// $arr = [
//     'Smith' => 30,
//     'David' => 50,
//     'Patrick' => 23
// ];
// arsort($arr);
// echo '<pre>';
// print_r($arr);
// echo '</pre>';

// $arr = [
//     'Smith' => 30,
//     'David' => 50,
//     'Patrick' => 23
// ];
// krsort($arr);
// echo '<pre>';
// print_r($arr);
// echo '</pre>';


