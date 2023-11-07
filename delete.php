<?php
include 'connection.php';
$id=$_GET['id'];
$query="DELETE FROM student WHERE id='$id'";
$data=mysqli_query($conn,$query);
if($data){
    ?>
    <script>
        alert("Data deleted successfully"); 
        window.open("http://localhost/crud-sem-3/view.php","_self");
    </script>
    <?php
}
else{
    ?>

    <script>
        alert("Please try again");
    </script>

    <?php
}
?>