<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <form action="submit.php" method="post">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirm_password">Confirm Password: </label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label><br><br>

        <label style="display: block; margin-bottom: 5px;" for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br><br>




        <input type="submit" value="Submit">
    </form>

<?php
    $data   = [];
    $errors = [];

    if (isset($_POST["submit"])) {

    $name     = inputValidate($_POST["username"]);
    $email    = inputValidate($_POST["email"]);
    $password = inputValidate($_POST["password"]);
    $confirm_password = inputValidate($_POST["confirm_password"]);
    $gender   = inputValidate($_POST["gender"]);    
    $address  = inputValidate($_POST["address"]);

    if (empty($name)) {
        $errors['nameErorr'] = "Name is required";
    } elseif (strlen($name) < 3) {
        $errors['nameErorr'] = "Name field value at least 3 characters need";
    } else {
        $data["name"] = $name;
    }

    if (empty($email)) {
        $errors['emailError'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailError'] = "Invalid email format";
    } else {
        $data["email"] = $email;
    }   

    if (empty($password)) {
        $errors['passError'] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors['passError'] = "Password must be at least 6 characters long";
    } else {
        $data["password"] = $password;
    }   

    if (empty($confirm_password)) {
        $errors['confirmPassError'] = "Confirm Password is required";
    } elseif ($password !== $confirm_password) {
        $errors['confirmPassError'] = "Passwords do not match";
    } else {
        $data["confirm_password"] = $confirm_password;
    }

    if (empty($gender)) {
        $errors['genderError'] = "Gender is required";
    } else {
        $data["gender"] = $gender;
    }

    if (empty($address)) {
        $errors['addressError'] = "Address is required";
    } else {
        $data["address"] = $address;
    }

    if (empty($errors)) {

        // print_r($data);
        echo $data['name'];
        echo "<br>";
        echo $data['email'];
        echo "<br>";
        echo $data['password'];
        echo "<br>";
        echo $data['confirm_password'];
        echo "<br>";
        echo $data['gender'];
        echo "<br>";
        echo $data['address'];

    }

    
    }

    function inputValidate($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }





    
?>
</body>

</html>