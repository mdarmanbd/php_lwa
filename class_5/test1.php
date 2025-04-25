<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Upload File:<br>
        <input type="file" name="my_file"><br>
        <button type="submit" name="form1">Submit</button>
    </form>

    <?php
    //unlink('images/user_1745520507.jpg');
    ?>

    <?php
    if(isset($_POST['form1'])) 
    {
        $path = $_FILES['my_file']['name'];
        $path_tmp = $_FILES['my_file']['tmp_name'];
        //echo $_FILES['my_file']['size']/1024;

        try {

            if($path == '') {
                throw new Exception('You must have to select a file');
            }

            if($_FILES['my_file']['size']/1024 > 100) {
                throw new Exception('Size must be within 100 kb');
            }

            $extension = pathinfo($path, PATHINFO_EXTENSION);
            //echo $extension;
            $filename = 'user_'.time().".".$extension;
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $path_tmp);
            //echo $mime;
            if($mime != 'image/jpeg' && $mime != 'image/png' && $mime != 'application/zip') {
                throw new Exception('Invalid File Type');
            }

            move_uploaded_file($path_tmp, 'files/'.$filename);
            echo 'Successful';

        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>

</body>
</html>