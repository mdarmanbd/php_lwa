<?php
//var_dump();


// $countryName = "Hello BD";
// echo $countryName;

// $num = 1.2;
// echo var_dump($num);
// echo var_dump(is_float($num)) . "<br>";
// echo var_dump(is_int($num));
// echo var_dump(is_double($num));

//type Casting

// $number = (string) 2.6;
// $name = (array) "arman";
// $name = (object) "arman";
// echo var_dump($number) . "<br>";
// echo var_dump( is_string($number)); // return boolen value
// echo var_dump($name);
// echo var_dump(is_array($name));


$sentence = "my country name is BD ";
$country = "Bangladesh";
$name = "Arman";
$Area = 1475700;
// $sentenceLength = $sentence;
// echo strlen($sentenceLength);
// echo strtoupper($sentence);
// echo strtolower($sentence);
// echo ucwords($sentence);
// echo trim("  Hello   BD  ");
// echo trim( "my country name is BD", "nameis");
// echo str_replace("my", "our", $sentence);
// echo str_replace(["my", "is"], "", "my country name is BD");
// echo substr($sentence,2);
// echo substr($sentence, 0, 2); // 0 is the lenght number
// echo substr($sentence,3, 7); // 3 is the lenght number
// echo substr($sentence, 11, 4); // 11 is the length number
// printf("My name is %s , I live in %s, an area has %d", $name, $country, $Area)
// echo str_repeat("Hello Bangladesh <br>", 2);
// echo str_word_count($sentence);
// echo strrev($sentence);
// echo strpos ($sentence, "name");
// echo strip_tags("<script>Hello BD ('Haced') </script>");

// echo var_dump((is_nan($Area)));

// $a = 1;
// $b = -4;
// $c = '-8';

// echo var_dump(is_nan(sqrt(-12)));
// echo var_dump(is_numeric($c));

// echo pi();
// echo min(45,22,8,63);
// echo max(45,22,8,63);
// echo abs(-1234);
// echo round(2.55);
// echo round(2.56869, 4);
// echo rand();
// echo rand(10,50);
// echo ceil(25.14);
// echo floor(13.966);

// const 

// define("pi", "3.1416"); 
// echo pi;
// define("pi", "6.154");

$a = 4;
$b = 2;
// $age = 25;
// $compare = ($age > 10);
// echo var_dump($compare);

// echo ($a + $b);
// echo ($a - $b);
// echo ($a * $b);
// echo ($a / $b);
// echo ($a % $b);
// echo ($a ** $b);
// echo pow($a , $b);
// $a -= 3;
// echo $a;

// echo var_dump($a == $b);
// echo var_dump($a < $b);

// echo $a++;
// echo $a;

// echo ++$a;

// echo var_dump(($a==4 && $b==2));
// echo var_dump(($a==40 || $b==2));
// var_dump($a==40 xor $b==20);

// Ternary
// echo ($a == 10 ? "This is ten" : "Not a ten");

// $c = ($b == 2 ? "This is two" : (($b == 5) ? "This is five" : (($b == 6) ? "This is six number" : "Unknown number : $b")));

// echo $c;

$city = "undefiend";
$result = $city ?? "Dhaka";
echo $result;
