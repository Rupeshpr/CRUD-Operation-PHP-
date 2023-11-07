<!DOCTYPE html>
<html>
<head>
    <title>Form Validation Example</title>
</head>
<body>
    <form id="myForm" onsubmit="return validateForm()">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        <br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
        <br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br>

        <label for="number">Number:</label>
        <input type="text" id="number" name="number" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <br>

        <input type="submit" value="Submit">
    </form>

    <script>
        function validateForm() {
            const firstName = document.getElementById("firstName").value;
            const lastName = document.getElementById("lastName").value;
            const email = document.getElementById("email").value;
            const number = document.getElementById("number").value;
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirmPassword").value;

            const namePattern = /^[A-Za-z]+$/;
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            const numberPattern = /^[0-9]+$/;

            if (!namePattern.test(firstName) || !namePattern.test(lastName)) {
                alert("First Name and Last Name should contain only alphabets.");
                return false;
            }

            if (!emailPattern.test(email)) {
                alert("Email address is not valid.");
                return false;
            }

            if (!numberPattern.test(number)) {
                alert("Number should contain only digits.");
                return false;
            }

            if (password.length !== 8) {
                alert("Password should be 8 characters long.");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>