<?php
$fname = $lname = $email = $number = $password = $confirmPassword = "";
$fnameErr = $lnameErr = $emailErr = $numberErr = $passwordErr = $confirmPasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate First Name
    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z]+$/", $fname)) {
            $fnameErr = "Only alphabets allowed";
        }
    }

    // Validate Last Name
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
    } else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z]+$/", $lname)) {
            $lnameErr = "Only alphabets allowed";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Number
    if (empty($_POST["number"])) {
        $numberErr = "Number is required";
    } else {
        $number = test_input($_POST["number"]);
        if (!preg_match("/^[0-9]+$/", $number)) {
            $numberErr = "Only numbers allowed";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 8) {
            $passwordErr = "Password should be at least 8 characters long";
        }
    }

    // Validate Confirm Password
    if (empty($_POST["confirmPassword"])) {
        $confirmPasswordErr = "Confirm Password is required";
    } else {
        $confirmPassword = test_input($_POST["confirmPassword"]);
        if ($confirmPassword != $password) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- Create the HTML form -->
<form action="insert.php" method="POST">
    First Name: <input type="text" name="fname" value="<?php echo $fname;?>">
    <span class="error">* <?php echo $fnameErr;?></span><br><br>
    
    Last Name: <input type="text" name="lname" value="<?php echo $lname;?>">
    <span class="error">* <?php echo $lnameErr;?></span><br><br>
    
    Email: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span><br><br>
    
    Number: <input type="text" name="number" value="<?php echo $number;?>">
    <span class="error">* <?php echo $numberErr;?></span><br><br>
    
    Password: <input type="password" name="password">
    <span class="error">* <?php echo $passwordErr;?></span><br><br>
    
    Confirm Password: <input type="password" name="confirmPassword">
    <span class="error">* <?php echo $confirmPasswordErr;?></span><br><br>
    
    <input type="submit" name="submit" value="Submit">
</form>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    empty($fnameErr) && empty($lnameErr) && empty($emailErr) &&
    empty($numberErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
    // Validation successful, you can process the form data here
    // For example, insert into a database or perform other actions
    echo "Form submitted successfully!";
}
?>