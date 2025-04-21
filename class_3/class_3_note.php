<?php

// ✅ Conditional Statement

// 👉 if statement
/*
Way 1:
if(condition) {
    code to be executed if condition is true;
}
Way 2:
if(condition):
    code to be executed if condition is true;
endif;
*/


// 👉 if...else Statement
/*
Way 1:
if(condition) {
	code to be executed if condition is true;
} else {
	code to be executed if condition is false;
}
Way 2:
if(condition):
	code to be executed if condition is true;
else:
	code to be executed if condition is false;
endif;

*/


// 👉 if...elseif...else Statement
/*
Way 1:
if(condition) {
	code to be executed if this condition is true;
} elseif(condition) {
	code to be executed if first condition is false and this condition is true;
} else {
	code to be executed if all conditions are false;
}
Way 2:
if(condition):
	code to be executed if this condition is true;
elseif(condition):
	code to be executed if first condition is false and this condition is true;
else:
	code to be executed if all conditions are false;
endif;
*/




// 👉 Example
//$a = 10;
//if($a == 10) {
//    echo "The value is 10"; // The value is 10
//}

// 👉 Example
//$a = 10;
//if($a == 10):
//    echo "Bangladesh"; // Bangladesh
//endif;

// 👉 Example
//$a = 10;
//if($a == 10) {
//    echo 'Bangladesh'; // Bangladesh
//} else {
//    echo 'USA';
//}

// 👉 Example
//$a = 10;
//if($a == 10):
//    echo 'Bangladesh'; // Bangladesh
//else:
//    echo 'USA';
//endif;


// 👉 Example

//$age = 12;
//if($age < 18) {
//    echo "His age is {$age} and He is not adult yet";
//} elseif($age == 18) {
//    echo "His age is {$age} and he just reached in adult age";
//} else {
//    echo "His age is {$age} and he is over 18";
//}

//$age = 12;
//if($age < 18):
//    echo "His age is {$age} and He is not adult yet";
//elseif($age == 18):
//    echo "His age is {$age} and he just reached in adult age";
//else:
//    echo "His age is {$age} and he is over 18";
//endif;




// ✅ Switch Statement
// The switch statement is used to perform different actions based on different conditions.


// 👉 Syntax
/*
switch (n) {
    case label1:
        code to be executed if n=label1;
        break;
    case label2:
        code to be executed if n=label2;
        break;
    case label3:
        code to be executed if n=label3;
        break;
    ...
    default:
        code to be executed if n is different from all labels;
}
*/


// 👉 Example

//$country = "USA";
//switch($country) {
//    case "Bangladesh":
//        echo "You live in Bangladesh";
//        break;
//    case "USA":
//        echo "You live in USA";
//        break;
//    case "Australia":
//        echo "You live in Australia";
//        break;
//    default:
//        echo "I do not know where you live";
//}


// 👉 Example - Handling Ranges

//$score = 85;
//switch (true) {
//    case ($score >= 90 && $score <= 100):
//        echo "A";
//        break;
//    case ($score >= 80 && $score < 90):
//        echo "B";
//        break;
//    case ($score >= 70 && $score < 80):
//        echo "C";
//        break;
//    case ($score >= 60 && $score < 70):
//        echo "D";
//        break;
//    default:
//        echo "F";
//}


// 👉 Example - Handling Multiple Cases

//$country = "Greece";
//switch ($country) {
//    case "Bangladesh":
//    case "India":
//        echo "This is Asian Country";
//        break;
//    case "Greece":
//    case "Italy":
//        echo "This is European Country";
//        break;
//    default:
//        echo "Unknown!";
//}




// ✅ Loop
// Loops are used to execute the same block of code again and again, as long as a certain condition is true.

// 👉 Types
/*
1. For
2. While
3. Do While
4. Foreach
*/



// ✅ For Loop
/*
for (initialization; condition; increment/decrement) {
	code to be executed for each iteration;
}
*/

// 👉 Example - Counting upto 100
//for($i=1;$i<=100;$i+=5) {
//    echo $i.' ';
//}

// 👉 Example - Even/Odd numbers
// for($i=1;$i<=100;$i++) {
//     if($i%2 != 0) {
//         echo $i.' ';
//     }
// }




// ✅ While Loop
/*
while (condition is true) {
	code to be executed;
}
*/

// 👉 Example
//$a = 1;
//while($a < 10) {
//    echo "Bangladesh";
//    $a++;
//}

// 👉 Example
//$a = 1;
//while(1) {
//    echo "Bangladesh";
//    $a++;
//    if($a > 4) {
//        break;
//    }
//}




// ✅ Do-While Loop
/*
do {
	code to be executed;
} while (condition is true);
*/

// 👉 Example
//$a = 1;
//do {
//    echo "Bangladesh";
//    $a++;
//} while($a < 10);





// ✅ Foreach Loop
/*
foreach ($array as $key=>$value) {
	code to be executed;
}
foreach ($array as $value) {
	code to be executed;
}
*/

// 👉 Example - array
//$arr = ["usa","australia","canada"];
//foreach($arr as $val) {
//    echo $val;
//}

// 👉 Example - associative array
//$arr = [
//    "username" => "arefin",
//    "age" => 30,
//    "password" => "1234"
//];
//foreach($arr as $key=>$val) {
//    echo "KEY is: {$key} and Value is: {$val}";
//}




// ✅ Break
// The break statement is used to jump out of a loop.
// break;
// break 1; // break from current level (1 level)
// break 2; // break from current level and it's parent (2 levels)

// 👉 Example
//for($i=1;$i<=10;$i++) {
//    if($i==5) {
//        break;
//    }
//    echo $i;
//}

// 👉 Example
//for($i=1;$i<=10;$i++) {
//    if($i==5) {
//        break 1;
//    }
//    echo $i;
//}



// ✅ Continue
// The continue statement breaks one iteration (in the loop), if a specified condition occurs, and continues with the next iteration in the loop.
// continue;

// 👉 Example
//for($i=1;$i<=10;$i++) {
//    if($i==5) {
//        continue;
//    }
//    echo $i;
//}




// ✅ Nested Loop
/*
- A nested loop is a loop that is inside of another loop.
- This allows the inner loop to execute a certain number of times for each iteration of the outer loop.

Example:
    1. Pyramid
    2. Multiplication Table
*/


// 👉 Example
//for($i=1;$i<=10;$i++) {
//    echo "i=".$i.": ";
//    for($j=1;$j<=10;$j++) {
//        echo $j.' ';
//    }
//    echo "\n";
//}
// Output:
//i=1: 1 2 3 4 5 6 7 8 9 10
//i=2: 1 2 3 4 5 6 7 8 9 10
//i=3: 1 2 3 4 5 6 7 8 9 10
//i=4: 1 2 3 4 5 6 7 8 9 10
//i=5: 1 2 3 4 5 6 7 8 9 10
//i=6: 1 2 3 4 5 6 7 8 9 10
//i=7: 1 2 3 4 5 6 7 8 9 10
//i=8: 1 2 3 4 5 6 7 8 9 10
//i=9: 1 2 3 4 5 6 7 8 9 10
//i=10: 1 2 3 4 5 6 7 8 9 10


// 👉 Example
//for($i=1;$i<=4;$i++) {
//    for($j=1;$j<=$i;$j++) {
//        echo $j." ";
//    }
//    echo "\n";
//}
// Output:
//1
//1 2
//1 2 3
//1 2 3 4


// 👉 Example
//for($i=1;$i<=4;$i++) {
//    for($j=1;$j<=$i;$j++) {
//        echo $i." ";
//    }
//    echo "\n";
//}
// Output:
//1
//2 2
//3 3 3
//4 4 4 4


// 👉 Example
//for($i=1;$i<=4;$i++) {
//    for($j=$i;$j>=1;$j--) {
//        echo $j." ";
//    }
//    echo "\n";
//}
// Output
//1
//2 1
//3 2 1
//4 3 2 1


// 👉 Example
//$total_rows = 5;
//for($i=1;$i<=$total_rows;$i++) {
//    for($k=$total_rows-1;$k>=$i;$k--) {
//        echo "  ";
//    }
//    for($j=$i;$j>=1;$j--) {
//        echo $j." ";
//    }
//    for($m=2;$m<=$i;$m++) {
//        echo $m." ";
//    }
//    echo "\n";
//}
// Output
//        1
//      2 1 2
//    3 2 1 2 3
//  4 3 2 1 2 3 4
//5 4 3 2 1 2 3 4 5