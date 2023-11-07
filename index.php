<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <input type="text" name="firstname" placeholder="firstname"><br><br>


            <input type="text" name="lastname" placeholder="lastname"><br><br>
            
            
            <input type="number" name="age" placeholder="age"><br><br>

            <input type="submit" name="submit" value="Save">

            <button><a href="view.php">View</a></button>
        </form>
    </div>

<?php
if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $age = $_POST['age'];

    $sql="INSERT INTO student(firstname,lastname,age)VALUES('$fname','$lname','$age')";

    $data=mysqli_query($conn,$sql);

    if($data){
        ?>
        <script>
            alert("your data was saved successfully");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("please try again");
        </script>
        <?php
        
    }
}
?>
</body>
</html>