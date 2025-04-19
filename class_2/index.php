<?php
//var_dump();
$test = "Hello, World!";
echo $test;

// Data Types - String 
// $str1 = "Bangladesh";
// $str2 = "Bangladesh is a country";
// $str3 = "A";
// $str4 = "A country in South Asia";
// $str5 = "12";
// $str6 = "12.34";


// Data Types - Integer - int
// $num = "10";
//echo var_dump($num);

//echo is_int($num);
//echo is_integer($num);
//echo is_long();

//boolean = true or false

//echo is_string($num);

//echo var_dump(is_int($num));


// Data Types - Float/Double
// $num = "10.34343";
// echo var_dump(is_float($num));
//echo is_double($num);


// Data Types - Boolean
// $a = false;
// echo var_dump($a);


// Data Types - Array

// Data Type - Object

// Resource


// Type Casting
// $a = (string)20.33;
// echo var_dump($a);

// $a = (array)20;
// echo var_dump($a);


// Assign
// $a = 10;
// $a = "Bangladesh";
// echo $a;

// $a = 10;
// $b = $a;
// echo $b;



// String Functions
// - Built-in
// - User Defined

// $sentence = "Bangladesh is a country.";
// $len = strlen($sentence);
// echo $len;

//echo strtoupper("Bangladesh is a country.");
//echo strtolower("Bangladesh is a country.");
//echo ucwords("Bangladesh is a country.");
//echo trim(" Bangladesh is a country. ");
//echo str_replace("Rahim","John","Rahim is a good boy.");

//$date1 = "2025-03-12"; // yyyy-mm-dd
//echo substr($date1,0,4)."<br>"; // year
//echo substr($date1,5,2)."<br>"; // month
//echo substr($date1,8,2)."<br>"; // day

//printf()
// $str1 = "Smith";
// $str2 = "Robin";
// $age = 34;
// printf("Customer name is: %s and %s and their age is: %d",$str1,$str2,$age);
// print("Customer name is: ".$str1." and ".$str2 . "and their age is: ".$age);


//echo str_repeat("Bangladesh<br>", 10);
//echo str_word_count("Bangladesh is a country");
//echo strrev("Bangladesh");
//echo strpos("Bangladesh is a country","country");
//echo strip_tags("<script>alert('hacked!')</script>");


// Number
// $a = 10;
// $b = -29;
// $c = 10.233;
// $d = -23.233;

//NaN = Not A Number 
// Impossible mathematical operation 
// 34/0  sqrt(-144)
// is_nan()

// $a = "12";
// echo var_dump(is_numeric($a));

//echo sqrt(14);
//echo sqrt(-14);
//echo var_dump(is_nan(sqrt(-144)));


//echo pi();
//echo min(12,34,56,77,3,55);
//echo max(12,34,56,77,3,55);
//echo abs(-1234);

//echo round(12.27978);
//echo round(12.22478,2);
//echo round(12.22478,3);
//echo rand();
//echo rand(1000,2000);
//echo ceil(23.143434);
//echo floor(66.343434);

//echo decbin(1000);
//echo bindec(1111101000);



// Constant
// define("admin_name", "Morshedul Arefin");
// echo admin_name;
// define("admin_name", "Arefin");

// const admin_name = "Morshedul Arefin";
// echo admin_name;


// Expression
// Arithmetic Expression
// $a = (2+3)*5;
// echo $a;

// Comparison Expression
// $age = 20;
// $test = ($age >= 20);

// More on note




// Operator = +, -, *, /, %
// Operand = a, b


// Arithmetic Operator: + - * / %
//$a = 2;
//$b = 3;
//echo ($a + $b);
//echo ($a - $b);
//echo ($a * $b);
//echo ($a / $b);
//echo ($a % $b);
//echo ($a ** $b);
//echo pow($a,$b);


// Assignment Operator: =  +=  -=  *=  /=   %=
// $a = 10;
// $b = $a;
// echo $b;

// $a = 10;
// $b = 5;
// $a = $a - $b;
// $a -= $b;
// echo $a;


// Comparison Operator: ==   ===   !=  <>   !==   <   >   <=   >=   <==>
// $a = 20;
// $b = 20;
// var_dump($a === $b);
// var_dump($a !== $b);
// var_dump($a <= $b);



// Increment/Decrement Operator:  ++   --
//$a++ => $a=$a+1
// $a = 10;
// echo $a++;
// echo $a;

// $a = 10;
// echo ++$a;
// echo $a;


// Logical Operator: and  &&  or  ||   !   xor
// $a = 10;
// $b = 20;
//var_dump($a and $b);
//var_dump($a==10 && $b==40);
//var_dump($a==10 || $b==40);
//var_dump($a==10 xor $b==40);


// Ternary
// $a = 100;
// echo ($a==10) ? "It is ok" : "It is not ok";

// $n = 20;
// $final = ($n==10) ? "Ten" : (($n==20) ? "Twenty" : "Other");
// echo $final;


//Null Coalescing
// $city = 'Khulna';
// $city = $city ?? 'Dhaka';
// echo $city;