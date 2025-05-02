<?php 

        $dbhost = 'localhost';
        $dbname = 'php_b1';
        $dbuser = 'root';
        $dbpass = '';
        
        try{
            $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch( PDOException $e ){
            echo "Connection error :" . $e->getMessage();
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        a .links{
            display: inline-block;
            background: #1717f2;
            color: white;
            padding: 8px;
            font-size: 18px;
            text-decoration: none;
            margin-bottom: 10px;
            margin-right: 8px;
        }
    </style>

</head>
<body>
    <div style="width:300px; margin:0 auto; ">
        <h2 style='color:black; padding: 40px 0px; '>Customers List : </h2>


        <?php 
            $per_page = 4;
            $q = $pdo->prepare("SELECT * FROM customers");
            $q->execute();
            $total = $q->rowCount();
            
            $total_page = ceil($total/$per_page);
            
            for($i = 1; $i <= $total_page; $i++){
                echo "<a 
                style='display: inline-block;
                background: #1717f2;
                color: white;
                padding: 8px;
                font-size: 18px;
                text-decoration: none;
                margin-bottom: 10px;
                margin-right: 8px;' 
                href='http://localhost/php_lwa/pagination/index.php?p=$i''>".$i."</a>";
            }


            if(!isset($_REQUEST['p'])){
                $start_point = 1;
            }else{

                $start_point = $per_page * ($_REQUEST['p'] - 1) + 1;
                // echo $start_point;
                
            }

            
            echo "<div>";

            $j = 0;
            $k = 0;
            $res = $q->fetchAll();
            foreach($res as $row){
                
                
                $j++;
                if($j>=$start_point){
                   // $k++;
                    // if($k>$per_page){};
                    echo "<pre>";
                    print_r($row['id']);
                    echo "</pre>";
                }


                
            }

            echo "</div>";

        
        ?>




        <?php 
            $stm = $pdo->prepare("SELECT * FROM customers");
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row){
                echo '<div style="padding:20px; margin-bottom:10px; background:gray; color:white">';
                echo "Name: " . $row['name']. "</br>";
                echo "Email: ". $row['email'];
                echo "</div>";
            }
        
        ?>
    </div>
</body>
</html>