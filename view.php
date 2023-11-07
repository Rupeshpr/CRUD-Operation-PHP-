<?php
include 'connection.php';
?>
<a href="index.php">Home</a>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px" cellpadding="10" cellspacing="0">
        <tr>
            <th>firstname</th>
            <th>lastname</th>
            <th>age</th>
            <th colspan="2">Actions</th>
        </tr>

        <?php
        $sql="SELECT * FROM student";
        $data=mysqli_query($conn,$sql);
        $result=mysqli_num_rows($data);
        if($result){
            while ($row=mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php  echo $row['lastname']; ?></td>
                    <td><?php  echo $row['age']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']?>">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure, you want to delete?')" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
                <?php
            }
        }
        else{
            ?>
            <tr>
                <td>No record found</td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>