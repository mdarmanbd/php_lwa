<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>

    <h2>CRUD Application</h2>

    <div>
        <a href="create.php">Create Student</a> | <a href="index.php">All Student</a>
    </div>

    <h3>All Students</h3>
    <table style="width:100%" border="1" cellpadding="10" cellspacing="1">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM students");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    
    
</body>
</html>