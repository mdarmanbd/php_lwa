<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=" " method="post" enctype="multipart/form-data">
        <lable>File : </lable>
        <input type="file" name="upload_file">
        <br><br>
        <button type="submit" name="uploaded">submit</button>
        <br>
        <br>
    </form>

    <?php
        // unlink('images/1745762379.jpg'); // remove the file
    ?>

    <?php
        if(isset($_POST['uploaded'])){
            $path = $_FILES['upload_file']['name'];
            $path_tmp = $_FILES['upload_file']['tmp_name'];
            $fileSize = $_FILES['upload_file']['size']/1024;

            try{
                if($path == ""){
                    throw new Exception('You must have to a select a file');
                }

                if($fileSize < 1){
                    throw new Exception('File size should bd 100 kb');
                }

                $extension = pathinfo($path, PATHINFO_EXTENSION);
                $fileName = "user_" .time() . "." . $extension;
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $path_tmp);
                
                if($mime != "image/jpeg" && $mime != "image/png"){
                    throw new Exception ('Invaild file type');
                }

                echo "upload successfuly";
                move_uploaded_file($path_tmp, 'images/' . $fileName);

            }catch(Exception $e) {
                echo $e->getMessage();
            }
         
            


        }


    ?>


</body>
</html>