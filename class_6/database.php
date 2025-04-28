<?php
// MySQL = database name

// database > tables (row+col) > fields


// database: facebook

// table: user
// ------------------------
// id   roll        name   email      password   status   token   photo        cover       job  +more
// 1    std-1000    John   john@...   123456     active          john.jpg      john.jpg    
// 2    std-1001    Robin  robin@...  123456     active           robin.jpg    robin.jpg


// table: job
// ------------------------
// id   title   description   location   salary   company_id
// 1    Software Engineer   ...           ...       ...      1
// 2    Data Scientist      ...           ...       ...      2


// Query language
//CRUD = Create, Read, Update, Delete

// php+apache/nginx+mysql+phpmyadmin

// phpMyAdmin
// username: root 
// password: 

// integer 
// -23 0 23    signed integer
// 0 46        unsigned integer




// mysql = php 5
// mysqli
// pdo = php data object


$dbhost = 'localhost';
$dbname = 'php_b1';
$dbuser = 'root';
$dbpass = '12345678';
try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $e ) {
    echo "Connection error :" . $e->getMessage();
}

// create a table by the name "students". Please write the query for me. 
// $sql = "CREATE TABLE students (
//     id INT(11) AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(50) NOT NULL,
//     email VARCHAR(50) NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     status ENUM('active', 'inactive') DEFAULT 'active',
//     token VARCHAR(255),
//     photo VARCHAR(255),
//     cover VARCHAR(255),
//     job VARCHAR(50)
// )";
// $pdo->exec($sql);



$statement = $pdo->prepare("INSERT INTO students (name,email) VALUES (?,?)");
$statement->execute(['Smith','smith@gmail.com']);