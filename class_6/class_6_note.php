<?php
// ✅ Current Date and Time
//$dt = date("Y-m-d H:i:s");
//echo $dt; // 2023-08-09 13:49:58


// ✅ Custom Date Formatting
//$ts = strtotime("2023-08-09 15:30:00");
//$formatted = date("F j, Y, g:i a", $ts);
//echo $formatted; // August 9, 2023, 3:30 pm


// ✅ Get different parts of a date
//$ts = time();
//$year = date("Y", $ts);
//$month = date("m", $ts);
//$day = date("d", $ts);
//echo "Year: $year, Month: $month, Day: $day"; // Year: 2023, Month: 08, Day: 09


// ✅ Calculate future or past dates
//$today = date("Y-m-d");
//$daysToAdd = 7;
//$futureDate = date("Y-m-d", strtotime($today . " + $daysToAdd days"));
//echo "Today: {$today} and after 7 days: {$futureDate}"; // Today: 2023-08-09 and after 7 days: 2023-08-16


// ✅ Timezone Handling
//$timezone = new DateTimeZone("America/New_York");
//$dt = new DateTime("now", $timezone);
//$formattedTime = $dt->format("Y-m-d H:i:s");
//echo "Time in New York: " . $formattedTime; // Time in New York: 2023-08-09 09:56:57


// ✅ Time Difference
//$startTime = strtotime("2023-08-09 10:00:00");
//$endTime = strtotime("2023-08-09 15:30:00");
//$timeDiff = $endTime - $startTime;
//echo "Time Difference: " . gmdate("H:i:s", $timeDiff); // Time Difference: 05:30:00


// ✅ Get Day of Week
// echo "Today is ".date("l"); // Today is Wednesday


// ✅ Getting the Difference Between Two Dates:
//$startDate = strtotime("2023-08-01");
//$endDate = strtotime("2023-08-15");
//$daysDifference = ($endDate - $startDate) / (60 * 60 * 24);
//echo "$daysDifference days"; // 14 days


// ✅ Getting the Difference in Years, Months, and Days
//$startDate = new DateTime("1984-09-25");
//$endDate = new DateTime("2023-08-09");
//$interval = $startDate->diff($endDate);
//echo "Difference: {$interval->y} years, {$interval->m} months, {$interval->d} days"; // Difference: 38 years, 10 months, 15 days

//$startDate = new DateTime("1984-09-25");
//$endDate = new DateTime("now");
//$interval = $startDate->diff($endDate);
//echo "Difference: {$interval->y} years, {$interval->m} months, {$interval->d} days"; // Difference: 38 years, 10 months, 15 days


// ✅ Finding the Next Occurrence of a Specific Day of the Week
//$targetDay = "Wednesday";
//$nextWednesday = strtotime("next $targetDay");
//echo "Next $targetDay: " . date("Y-m-d", $nextWednesday); // Next Wednesday: 2023-08-16


// ✅ Getting the Last Day of a Month
//$lastDayOfMonth = date("Y-m-t", strtotime("2023-08-09"));
//echo $lastDayOfMonth; // 2023-08-31


// ✅ Checking if a Date Falls within a Range
//$startDate = strtotime("2023-08-01");
//$endDate = strtotime("2023-08-15");
//$checkDate = strtotime("2023-08-10");
//if ($checkDate >= $startDate && $checkDate <= $endDate) {
//    echo "The date falls within the range.";
//} else {
//    echo "The date is outside the range.";
//}


// ✅ Formatting Relative Time (e.g., "2 hours ago")
//$timestamp = strtotime("2 hours ago");
//$relativeTime = date("F j, Y, g:i a", $timestamp);
//echo "Relative Time: $relativeTime"; // Relative Time: August 9, 2023, 12:06 pm


// ✅ Getting how many hours or times ago
//$currentTime = time();
//$postTime = strtotime("2023-08-02 15:30:00");
//$timeDifferenceInSeconds = $currentTime - $postTime;
//if ($timeDifferenceInSeconds < 60) {
//    $timeAgo = "just now";
//} elseif ($timeDifferenceInSeconds < 3600) {
//    $timeAgo = floor($timeDifferenceInSeconds / 60) . " minutes ago";
//} elseif ($timeDifferenceInSeconds < 86400) {
//    $timeAgo = floor($timeDifferenceInSeconds / 3600) . " hours ago";
//} elseif ($timeDifferenceInSeconds < 2592000) {
//    $timeAgo = floor($timeDifferenceInSeconds / 86400) . " days ago";
//} elseif ($timeDifferenceInSeconds < 31536000) {
//    $months = floor($timeDifferenceInSeconds / 2592000);
//    $timeAgo = "$months " . ($months > 1 ? 'months' : 'month') . " ago";
//} else {
//    $years = floor($timeDifferenceInSeconds / 31536000);
//    $timeAgo = "$years " . ($years > 1 ? 'years' : 'year') . " ago";
//}
//echo "Posted $timeAgo";





// ✅✅✅ MySQL
// MySQL is a free, open-source relational database management system (RDBMS) used for organizing and retrieving data in databases.
// Most popular
// Small & large applications
// Very fast, reliable & easy to use
// Free to download and use
// Compiles on a number of platforms like Linux, MacOS, Windows, and other Unix-like systems
// The data in a MySQL database are stored in tables
// Table consists of columns and rows



// ✅✅✅ Queries
// A query in a database is a request for data or information from one or more tables in the database.
// Queries can be used for various tasks such as retrieving, inserting, updating, or deleting data.

// ✅ Example:
// SELECT column_name FROM table_name



// ✅✅✅ phpMyAdmin
// phpMyAdmin is a free, open-source web-based administration tool for managing MySQL databases.
// It provides a user-friendly interface for managing and organizing databases, tables, columns, relations, indexes, users, permissions, and many other database objects.
// phpMyAdmin is widely used by developers, database administrators, and users who need a simple and intuitive way to manage their MySQL databases.



// ✅✅✅ Connect MySQL with PHP
//PHP 5 or later:
//  - MySQLi Extension (i means improved)
//  - PDO (PHP Data Object)
//MySQL is depricated from PHP 5.


// ✅✅✅ MySQLi or PDO?
//PDO works with 12 different database systems, but MySQLi work with only MySQL database
//Both are object-oriented, but MySQLi also offers a procedural API.
//Both support Prepared Statements (Prepared Statements protect from SQL injection)


// ✅✅✅ MySQLi Connection with PHP (Object Oriented Way)
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb001";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
*/


// ✅✅✅ MySQLi Connection with PHP (Procedural Way)
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb001 ";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
*/


// ✅✅✅ PDO Connection with PHP
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb001";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
*/


// ✅✅✅ Close the Connection

// ✅MySQLi (Object Oriented)
// $conn->close();

// ✅MySQLi (Procedural)
// mysqli_close($conn);

// ✅PDO
// $conn = null;




// ✅✅✅ Create Database
// $sql = "CREATE DATABASE testdb001";
// $conn->exec($sql);


// ✅✅✅ Create Table
/*
$sql = "CREATE TABLE students (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        phone VARCHAR(50))";
$conn->exec($sql);
*/


// ✅✅✅ Primary Key
// A primary key is a unique identifier for each record (row) in a database table.
// A primary key column cannot contain null values and must have unique values for each record in the table.
// A table can have only ONE primary key


// ✅✅✅ Foreign Key
// A FOREIGN KEY is a field (or collection of fields) in one table, that refers to the PRIMARY KEY in another table.


// ✅✅✅ Complete Code - Create Database
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb001";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE students (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        phone VARCHAR(50))";
    $conn->exec($sql);

    echo "Database is created successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
*/


// ✅✅✅ FINAL CONNECTION CODE ONLY
/*
$dbhost = 'localhost';
$dbname = 'testdb001';
$dbuser = 'root';
$dbpass = '';
try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
    echo "Connection error :" . $exception->getMessage();
}
*/






// ✅✅✅ Prepared Statement

// ✅ How it works:
// 1. Prepare an SQL query with empty values as placeholders with either a question mark or a variable name with a colon preceding it for each value
// 2. Bind values or variables to the placeholders
// 3. Execute query simultaneously

// ✅ Advantages:
// 1. Improved security against SQL injection attacks.
// 2. Increased performance through caching of query plans.
// 3. Enhanced readability and maintainability of code.
// 4. Support for parameterized inputs.




// ✅✅✅ Named Parameter
/*
$stmt = $conn->prepare("INSERT INTO students (firstname, lastname, email, phone) VALUES (:firstname,:lastname,:email,:phone)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);
$firstname = 'Sabbir';
$lastname = 'Ahmed';
$email = 'sabbir@gmail.com';
$phone = '123456';
$stmt->execute();
*/

// ✅✅✅ Unnamed Parameter
/*
$statement = $conn->prepare("INSERT INTO students (firstname, lastname, email, phone) VALUES (?,?,?,?)");
$statement->execute(['First 1',' Last 1','fl1@gmail.com','111']);
*/



// ✅✅✅ Inserting Data
/*
$statement = $conn->prepare("INSERT INTO students (firstname, lastname, email, phone) VALUES (?,?,?,?)");
$statement->execute(['First 1',' Last 1','fl1@gmail.com','111']);
*/



// ✅✅✅ Select Query
/*
$stmt = $conn->prepare("SELECT * FROM students");
$stmt = $conn->prepare("SELECT firstname,phone FROM students");
*/